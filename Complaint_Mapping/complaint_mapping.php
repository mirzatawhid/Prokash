<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
}
$user_id = $_SESSION["user"];
require "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">



  <!-- Mapbox api -->
  <script src='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.js'></script>
  <link href='https://api.mapbox.com/mapbox-gl-js/v2.9.1/mapbox-gl.css' rel='stylesheet' />



  <link rel="stylesheet" href="../side_bar.css">
  <link rel="stylesheet" href="complaint_mapping.css">
  <title>Complaint Mapping</title>
</head>

<body>


  <!-- side nav bar -->
  <nav>
    <div class="logo-name">
      <div class="logo-image">
        <img src="../images/footer_logo.png" alt="logo">
      </div>
    </div>

    <div class="menu-items">
      <ul class="nav-links">
        <li><a href="../dashboard.php">
            <i class="uil uil-estate"></i>
            <span class="link-name">Dahsboard</span>
          </a></li>
        <li><a href="../User_Profile/user_profile.php">
            <i class="uil uil-user"></i>
            <span class="link-name">User Profile</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-file-check"></i>
            <span class="link-name">Pending Verification List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-file-check-alt"></i>
            <span class="link-name">Pending Approved List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-paperclip"></i>
            <span class="link-name">Submission List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-check-circle"></i>
            <span class="link-name">Verification List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-file-search-alt"></i>
            <span class="link-name">Reviewed List</span>
          </a></li>
        <li><a href="#">
            <i class="uil uil-share"></i>
            <span class="link-name">Share</span>
          </a></li>
      </ul>

      <ul class="logout-mode">
        <li><a href="../logout.php">
            <i class="uil uil-signout"></i>
            <span class="link-name">Logout</span>
          </a></li>
        </li>
      </ul>
    </div>
  </nav>

  <section class="mapping">
    <div class="top">
      <img src="../images/user.png" alt="">
    </div>

    <div class="map_content">
      <div id='map' style='width: 100%; height: 100%;'></div>
    </div>

  </section>

  <?php
  // MySQL database credentials
  require '../connection.php';

  // Retrieve the address data from the MySQL database
  $query = "SELECT prb_id, prb_title,category, sub_category, prb_address, prb_desc FROM complaint_list";
  $result = mysqli_query($conn, $query);

  // Initialize an array to store the address data with coordinates
  $addressData = [];

  // Iterate through each row of the result set
  while ($row = mysqli_fetch_assoc($result)) {
    echo $row['prb_title'];
    echo $row['prb_address'];
    $address = $row['prb_address'];
    echo urlencode($address);
    $geocodeURL = 'https://api.mapbox.com/geocoding/v5/mapbox.places/' . urlencode($address) . '.json?country=bd&access_token=pk.eyJ1IjoibWlyemF0YXdoaWQiLCJhIjoiY2xpeGs2OTRwMDdhdzNrcmtobHk4dmxyMCJ9.p9tJOzucCEKPa3y1JgFtzw';
    $geocodeResponse = file_get_contents($geocodeURL);
    $geocodeData = json_decode($geocodeResponse, true);

    // Check if the geocoding response was successful
    if ($geocodeData['features']) {
      $coordinates = $geocodeData['features'][0]['center'];
      $longitude = $coordinates[0];
      $latitude = $coordinates[1];

      $addressData[] = [
        'prb_id' => $row['prb_id'],
        'prb_title' => $row['prb_title'],
        'prb_desc' => $row['prb_desc'],
        'prb_address' => $row['prb_address'],
        'longitude' => $longitude,
        'latitude' => $latitude
      ];
    }
  }

  // Close the database connection
  mysqli_close($conn);
  ?>


</body>

<script>
  mapboxgl.accessToken = 'pk.eyJ1IjoibWlyemF0YXdoaWQiLCJhIjoiY2xpeGs2OTRwMDdhdzNrcmtobHk4dmxyMCJ9.p9tJOzucCEKPa3y1JgFtzw';
  var addressData = <?php echo json_encode($addressData); ?>;
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/dark-v11',
    center: [90.412521, 23.810331],
    zoom: 6.5
  });

  
  map.on('load', function () {
        // Add the address data to the map as source
        map.addSource('addresses', {
            type: 'geojson',
            data: {
                type: 'FeatureCollection',
                features: addressData.map(function (address) {
                    return {
                        type: 'Feature',
                        geometry: {
                            type: 'Point',
                            coordinates: [address.longitude, address.latitude]
                        },
                        properties: {
                            prb_id: address.prb_id,
                            prb_title: address.prb_title,
                            prb_desc: address.prb_desc,
                            prb_address: address.prb_address
                        }
                    };
                })
            },
            cluster: true,
            clusterMaxZoom: 14,
            clusterRadius: 50
        });

        // Add cluster layer
        map.addLayer({
            id: 'clusters',
            type: 'circle',
            source: 'addresses',
            filter: ['has', 'point_count'],
            paint: {
                'circle-color': [
                    'step',
                    ['get', 'point_count'],
                    '#51bbd6',
                    100,
                    '#f1f075',
                    750,
                    '#f28cb1'
                ],
                'circle-radius': [
                    'step',
                    ['get', 'point_count'],
                    20,
                    100,
                    30,
                    750,
                    40
                ]
            }
        });

        // Add cluster count layer
        map.addLayer({
            id: 'cluster-count',
            type: 'symbol',
            source: 'addresses',
            filter: ['has', 'point_count'],
            layout: {
                'text-field': '{point_count_abbreviated}',
                'text-size': 12
            }
        });

        // Add unclustered point layer
        map.addLayer({
            id: 'unclustered-point',
            type: 'circle',
            source: 'addresses',
            filter: ['!', ['has', 'point_count']],
            paint: {
                'circle-color': '#11b4da',
                'circle-radius': 6,
                'circle-stroke-width': 1,
                'circle-stroke-color': '#fff'
            }
        });

        // Cluster click event
        map.on('click', 'clusters', function (e) {
            var features = map.queryRenderedFeatures(e.point, { layers: ['clusters'] });
            var clusterId = features[0].properties.cluster_id;
            map.getSource('addresses').getClusterExpansionZoom(clusterId, function (err, zoom) {
                if (err) return;

                map.easeTo({
                    center: features[0].geometry.coordinates,
                    zoom: zoom
                });
            });
        });

        // Unclustered point click event
        map.on('click', 'unclustered-point', function (e) {
            var coordinates = e.features[0].geometry.coordinates.slice();
            var properties = e.features[0].properties;

            // Create a popup
            new mapboxgl.Popup()
                .setLngLat(coordinates)
                .setHTML('<h3>' + properties.prb_title + '</h3><p>' + properties.prb_desc + '</p>')
                .addTo(map);
        });

        // Change the cursor style when hovering over a cluster or unclustered point
        map.on('mouseenter', 'clusters', function () {
            map.getCanvas().style.cursor = 'pointer';
        });

        map.on('mouseleave', 'clusters', function () {
            map.getCanvas().style.cursor = '';
        });

        map.on('mouseenter', 'unclustered-point', function () {
            map.getCanvas().style.cursor = 'pointer';
        });

        map.on('mouseleave', 'unclustered-point', function () {
            map.getCanvas().style.cursor = '';
        });
    });

</script>


</html>
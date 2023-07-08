<?php
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
}
$user_id = $_SESSION["user"];
require "connection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Complaint Submission</title>
  <link rel="stylesheet" href="complaint_submission.css">

  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <link rel="stylesheet" href="side_bar.css">


  <!-- Country_city_state dropdown code -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Load states on page load
      $.ajax({
        url: 'get_states.php',
        type: 'POST',
        success: function(data) {
          $('#state').html(data);
        }
      });

      // Load districts on state change
      $('#state').on('change', function() {
        var stateId = $(this).val();
        if (stateId) {
          $.ajax({
            url: 'get_districts.php',
            type: 'POST',
            data: {
              state_id: stateId
            },
            success: function(data) {
              $('#district').html(data);
              $('#city').html('<option value="">Select City</option>');
            }
          });
        } else {
          $('#district').html('<option value="">Select District</option>');
          $('#city').html('<option value="">Select City</option>');
        }
      });

      // Load cities on district change
      $('#district').on('change', function() {
        var districtId = $(this).val();
        if (districtId) {
          $.ajax({
            url: 'get_cities.php',
            type: 'POST',
            data: {
              district_id: districtId
            },
            success: function(data) {
              $('#city').html(data);
            }
          });
        } else {
          $('#city').html('<option value="">Select City</option>');
        }
      });
    });
  </script>


  <!-- Category Sub-Category dropdown code -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      // Load states on page load
      $.ajax({
        url: 'get_category.php',
        type: 'POST',
        success: function(data) {
          $('#category').html(data);
        }
      });

      // Load districts on state change
      $('#category').on('change', function() {
        var categoryId = $(this).val();
        if (categoryId) {
          $.ajax({
            url: 'get_subcategory.php',
            type: 'POST',
            data: {
              category_id: categoryId
            },
            success: function(data) {
              $('#sub_category').html(data);
            }
          });
        } else {
          $('#sub_category').html('<option value="">Select Sub-Category</option>');
        }
      });
    });
  </script>



</head>

<body>
  <!-- side nav bar -->
  <nav>
    <div class="logo-name">
      <div class="logo-image">
        <img src="images/footer_logo.png" alt="logo">
      </div>
    </div>

    <div class="menu-items">
      <ul class="nav-links">
        <li><a href="dashboard.php">
            <i class="uil uil-estate"></i>
            <span class="link-name">Dahsboard</span>
          </a></li>
        <li><a href="User_Profile/user_profile.php">
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
        <li><a href="logout.php">
            <i class="uil uil-signout"></i>
            <span class="link-name">Logout</span>
          </a></li>
        </li>
      </ul>
    </div>
  </nav>

  <section class="submission">
    <div class="top">

      <img src="images/user.png" alt="">
    </div>


    <div class="form_content">
      <h1 class="form_title">Complaint Submission</h1>



      <?php
      require 'connection.php';
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["submit"])) {
        $title = $_POST["title"];
        $category = $_POST["category"];
        $sub_category = $_POST["sub_category"];
        $address = $_POST["address"];
        $state = $_POST["state"];
        $district = $_POST["district"];
        $area = $_POST["city"];
        if (isset($_POST["anonymous"])) {
          $userid = NULL;
        } else {
          $userid = $user_id;
        }
        $comment = $_POST['comment'];
        $file = $_FILES["media"];

        if ($file['size'] <= 25 * 1024 * 1024) {
          $name = $file['name'];
          $type = $file['type'];

          // Generate a unique file name
          $filename = uniqid() . '_' . $name;

          // Destination folder to store the uploaded files
          $destination = 'Complaint_Media/' . $filename;

          // Move the uploaded file to the destination folder
          if (move_uploaded_file($file['tmp_name'], $destination)) {
            // Insert the file path into the database
            require 'connection.php';
            $sql = "INSERT INTO complaint_list(user_id,prb_title,category,sub_category,prb_address,prb_state,prb_district,prb_area,prb_datetime,prb_desc,prb_medianame,prb_mediatype,prb_mediapath) VALUES (?, ?, ?, ?, ?, ?, ?, ?,NOW(), ?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
              mysqli_stmt_bind_param($stmt, "isiisiiissss", $userid, $title, $category, $sub_category, $address, $state, $district, $area, $comment, $name, $type, $destination);
              if (mysqli_stmt_execute($stmt)) {
                echo "<div class='alertbox alert alert-success'>Complaint Submission Successful!</div>";
              } else {
                echo "Somehing went Wrong!";
              }
              mysqli_stmt_close($stmt);
            } else {
              echo mysqli_report(MYSQLI_REPORT_ALL);
            }
          } else {
            echo "Error moving the file to the destination.";
          }
        } else {
          echo "File size exceeds the limit (25MB).";
        }
        mysqli_close($conn);
      }
      ?>

      <div class="form_container">
        <form action="complaint_submission.php" method="post" enctype="multipart/form-data">
          <div class="user_detail">
            <div class="input_box full_box">
              <span class="detail">Title:</span>
              <input type="text" name="title" id="title" placeholder="Enter the title" required />
            </div>
            <div class="input_box">
              <span class="detail">Category:</span>
              <select class="category" name="category" id="category">
                <option value="">Select Category</option>
              </select>
            </div>
            <div class="input_box">
              <span class="detail">Sub-Category:</span>
              <select class="sub_category" name="sub_category" id="sub_category">
                <option value="">Select Sub-Category</option>
              </select>
            </div>
            <div class="input_box full_box">
              <span class="detail">Address:</span>
              <input type="text" name="address" placeholder="Enter the Detailed Address" required />
            </div>
            <div class="input_box">
              <span class="detail">State:</span>
              <select class="state" name="state" id="state">
                <option value="">Select State</option>
              </select>
            </div>
            <div class="input_box">
              <span class="detail">District:</span>
              <select class="district" name="district" id="district">
                <option value="">Select District</option>
              </select>
            </div>
            <div class="input_box">
              <span class="detail">Area:</span>
              <select class="city" name="city" id="city">
                <option value="">Select Area</option>
              </select>
            </div>
            <!-- switch -->
            <div class="input_box switch">
              <span class="detail">Post as Anonymous:</span>
              <div class="switch_container">
                <input type="checkbox" name="anonymous" id="switcher" />
                <label for="switcher" class="switch_button"></label>
              </div>
            </div>
            <div class="input_box full_box">
              <span class="detail">Complaint Details:</span>
              <textarea type="text" name="comment" placeholder="Write your Complaint..." required></textarea>
            </div>
          </div>
          <div class="attachment">Attach Files as Proof(Max 25MB):
            <input type="file" name="media" accept="image/*,video/*">
          </div>
          <div class="button">
            <input type="submit" value="Sign Up" name="submit" />
          </div>
        </form>

      </div>
    </div>

  </section>

</body>

<script type = "text/javascript">
$(document).ready(function(){
	
	function load_unseen_notification(view = ''){
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data){
			$('.dropdown-menu').html(data.notification);
			if(data.unseen_notification > 0){
			$('.count').html(data.unseen_notification);	}}});} 
	load_unseen_notification(); 
	$('#add_form').on('submit', function(event){
		event.preventDefault();
		if($('#title').val() != ''){
		var form_data = $(this).serialize();
		$.ajax({
			url:"complaint_submission.php",
			method:"POST",
			data:form_data,
			success:function(data){
			$('#add_form')[0].reset();
			load_unseen_notification();	}});}
		else{ alert("Enter Data First");}}); 
	$(document).on('click', '.dropdown-toggle', function(){
	$('.count').html('');
	load_unseen_notification('yes');}); 
	setInterval(function(){ 
		load_unseen_notification();; 
	}, 5000);
});
</script>


</html>
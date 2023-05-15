<?php

require 'connection.php';
$districtId = $_POST['district_id'];

$sql = "SELECT * FROM cities WHERE district_id = '$districtId'";
$qr = mysqli_query($conn, $sql);

$options = '<option value="">Select City</option>';
while ($row = mysqli_fetch_assoc($qr)) {
  $options .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}

echo $options;

?>
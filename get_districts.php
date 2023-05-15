<?php

require 'connection.php';
$stateId = $_POST['state_id'];

$sql = "SELECT * FROM districts WHERE state_id = '$stateId'";
$qr = mysqli_query($conn, $sql);

$options = '<option value="">Select District</option>';
while ($row = mysqli_fetch_assoc($qr)) {
  $options .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}

echo $options;

?>
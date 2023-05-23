<?php

require 'connection.php';
$categoryId = $_POST['category_id'];

$sql = "SELECT * FROM sub_category WHERE category_id = '$categoryId'";
$qr = mysqli_query($conn, $sql);

$options = '<option value="">Select Sub-Category</option>';
while ($row = mysqli_fetch_assoc($qr)) {
  $options .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}

echo $options;

?>
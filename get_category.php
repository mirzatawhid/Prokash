<?php

require 'connection.php';
$sql = "SELECT * FROM category";
$qr = mysqli_query($conn, $sql);

$options = '<option value="">Select Category</option>';
while ($row = mysqli_fetch_assoc($qr)) {
  $options .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}

echo $options;

?>
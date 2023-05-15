<?php

require 'connection.php';
$sql = "SELECT * FROM states";
$qr = mysqli_query($conn, $sql);

$options = '<option value="">Select State</option>';
while ($row = mysqli_fetch_assoc($qr)) {
  $options .= '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
}

echo $options;

?>
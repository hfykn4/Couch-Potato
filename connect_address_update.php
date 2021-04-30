<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$addressid = filter_input(INPUT_POST, 'address_id');
$address = filter_input(INPUT_POST, 'address');
$address2 = filter_input(INPUT_POST, 'address2');
$district = filter_input(INPUT_POST, 'district');
$cityid = filter_input(INPUT_POST, 'city_id');
$postalcode = filter_input(INPUT_POST, 'postal_code');
$phone = filter_input(INPUT_POST, 'phone');
$last_update = date("Y-m-d H:i:s");

$host = "jupiter.nottingham.edu.my";
$dbusername = "hfykn4jupiter";
$dbpassword = "NKYan@(21112001)##";
$dbname = "hfykn4ju_cw2";


// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE address SET address = '$address', address2 = '$address2', district = '$district',  city_id = '$cityid', postal_code = '$postalcode', phone = '$phone', last_update = '$last_update' WHERE address_id = '$addressid'";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_address_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$staffid = filter_input(INPUT_POST, 'staff_id');
$fname = filter_input(INPUT_POST, 'first_name');
$lname = filter_input(INPUT_POST, 'last_name');
$addressid= filter_input(INPUT_POST, 'address_id');
$picture = filter_input(INPUT_POST, 'picture');
$email = filter_input(INPUT_POST, 'email');
$storeid = filter_input(INPUT_POST, 'store_id');
$active = filter_input(INPUT_POST, 'active');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
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

$sql = "UPDATE staff SET first_name='$fname', last_name='$lname', address_id='$addressid', picture='$picture', email='$email', store_id='$storeid', active='$active', username='$username', password='$password', last_update ='$last_update' WHERE staff_id='$staffid'";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_staff_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
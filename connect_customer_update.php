<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$customerid = filter_input(INPUT_POST, 'customer_id');
$storeid = filter_input(INPUT_POST, 'store_id');
$firstname = filter_input(INPUT_POST, 'first_name');
$lastname = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');
$addressid = filter_input(INPUT_POST, 'address_id');
$active = filter_input(INPUT_POST, 'active');
$createdate = filter_input(INPUT_POST, 'create_date');
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

$sql = "UPDATE customer SET store_id = '$storeid', first_name = '$firstname', last_name = '$lastname',  email = '$email', address_id = '$addressid', active = '$active',create_date = '$createdate' WHERE customer_id = '$customerid' ";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_customer_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
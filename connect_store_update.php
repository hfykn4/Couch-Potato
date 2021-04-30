<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$storeid = filter_input(INPUT_POST, 'store_id');
$managerstaffid = filter_input(INPUT_POST, 'manager_staff_id');
$addressid = filter_input(INPUT_POST, 'address_id');
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

$sql = "UPDATE store SET  manager_staff_id = '$managerstaffid', address_id = '$addressid' WHERE  store_id = '$storeid'";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_store_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
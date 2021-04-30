<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$rentalid = filter_input(INPUT_POST, 'rental_id');
$rentaldate = filter_input(INPUT_POST, 'rental_date');
$inventoryid = filter_input(INPUT_POST, 'inventory_id');
$customerid = filter_input(INPUT_POST, 'customer_id');
$returndate = filter_input(INPUT_POST, 'return_date');
$staffid = filter_input(INPUT_POST, 'staff_id');
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

$sql = "UPDATE rental SET rental_date = '$rentaldate', inventory_id = '$inventoryid', customer_id = '$customerid', return_date = '$returndate', staff_id = '$staffid' WHERE rental_id = '$rentalid'";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_rental_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
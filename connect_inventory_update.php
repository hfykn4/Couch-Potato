<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$inventoryid = filter_input(INPUT_POST, 'inventory_id');
$filmid = filter_input(INPUT_POST, 'film_id');
$storeid = filter_input(INPUT_POST, 'store_id');
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

$sql = "UPDATE inventory SET film_id='$filmid', store_id='$storeid', last_update ='$last_update' WHERE inventory_id='$inventoryid'";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_inventory_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
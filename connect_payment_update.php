<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$paymentid = filter_input(INPUT_POST, 'payment_id');
$customerid = filter_input(INPUT_POST, 'customer_id');
$staffid = filter_input(INPUT_POST, 'staff_id');
$rentalid= filter_input(INPUT_POST, 'rental_id');
$amount = filter_input(INPUT_POST, 'amount');
$paymentdate = filter_input(INPUT_POST, 'payment_date');
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

$sql = "UPDATE payment SET customer_id='$customerid', staff_id='$staffid', rental_id='$rentalid', amount='$amount', payment_date='$paymentdate', last_update ='$last_update' WHERE payment_id='$paymentid'";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_payment_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
<?php
$paymentid = filter_input(INPUT_POST, 'payment_id');
$customerid = filter_input(INPUT_POST, 'customer_id');
$staffid = filter_input(INPUT_POST, 'staff_id');
$rentalid= filter_input(INPUT_POST, 'rental_id');
$amount = filter_input(INPUT_POST, 'amount');
$paymentdate = filter_input(INPUT_POST, 'payment_date');

$host = "jupiter.nottingham.edu.my";
$dbusername = "hfykn4jupiter";
$dbpassword = "NKYan@(21112001)##";
$dbname = "hfykn4ju_cw2";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
// Check connection
if (mysqli_connect_error()){
	die('Connect Error ('. mysqli_connect_errno() .') '
	. mysqli_connect_error());
}
// sql to delete a record
$sql = "DELETE FROM payment WHERE payment_id = $paymentid AND customer_id = '$customerid' AND staff_id = '$staffid' AND rental_id = '$rentalid' AND amount = '$amount' AND payment_date = '$paymentdate'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_payment_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>
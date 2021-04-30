<?php
$customerid = filter_input(INPUT_POST, 'customer_id');
$storeid = filter_input(INPUT_POST, 'store_id');
$firstname = filter_input(INPUT_POST, 'first_name');
$lastname = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');
$addressid = filter_input(INPUT_POST, 'address_id');
$active = filter_input(INPUT_POST, 'active');
$createdate = filter_input(INPUT_POST, 'create_date');

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
$sql = "DELETE FROM customer WHERE customer_id = $customerid AND store_id = '$storeid' AND first_name = '$firstname' AND last_name = '$lastname' AND  email = '$email' AND address_id = '$addressid' AND active = '$active' AND create_date = '$createdate'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_customer_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>
<?php
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
$sql = "DELETE FROM staff WHERE staff_id = $staffid AND first_name = '$fname' AND last_name = '$lname' AND address_id = '$addressid' AND picture = '$picture' AND email = '$email' AND store_id = '$storeid' AND active = '$active' AND username = '$username' AND password = '$password'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_staff_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}
mysqli_close($conn);

?>
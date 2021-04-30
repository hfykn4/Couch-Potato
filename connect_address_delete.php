<?php
$addressid = filter_input(INPUT_POST, 'address_id');
$address = filter_input(INPUT_POST, 'address');
$address2 = filter_input(INPUT_POST, 'address2');
$district = filter_input(INPUT_POST, 'district');
$cityid = filter_input(INPUT_POST, 'city_id');
$postalcode = filter_input(INPUT_POST, 'postal_code');
$phone = filter_input(INPUT_POST, 'phone');

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
$sql = "DELETE FROM address WHERE address_id = $addressid ";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_address_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}
mysqli_close($conn);
?>
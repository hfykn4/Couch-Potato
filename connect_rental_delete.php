<?php
$rentalid = filter_input(INPUT_POST, 'rental_id');
$rentaldate = filter_input(INPUT_POST, 'rental_date');
$inventoryid = filter_input(INPUT_POST, 'inventory_id');
$customerid = filter_input(INPUT_POST, 'customer_id');
$returndate = filter_input(INPUT_POST, 'return_date');
$staffid = filter_input(INPUT_POST, 'staff_id');

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
$sql = "DELETE FROM rental WHERE rental_id = $rentalid AND rental_date = '$rentaldate' AND inventory_id = $inventoryid AND customer_id = '$customerid' AND return_date = '$returndate' AND staff_id = '$staffid'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_rental_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>
?>
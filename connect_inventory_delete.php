<?php
$inventoryid = filter_input(INPUT_POST, 'inventory_id');
$filmid = filter_input(INPUT_POST, 'film_id');
$storeid = filter_input(INPUT_POST, 'store_id');

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
$sql = "DELETE FROM inventory WHERE inventory_id = $inventoryid AND film_id = '$filmid' AND store_id = '$storeid'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_inventory_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>
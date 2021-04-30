<?php
$filmid = filter_input(INPUT_POST, 'film_id');
$catid = filter_input(INPUT_POST, 'category_id');

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
$sql = "DELETE FROM film_category WHERE film_id = $filmid AND category_id = '$catid'";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>
<?php
$actorid = filter_input(INPUT_POST, 'actor_id');
$fname = filter_input(INPUT_POST, 'first_name');
$lname = filter_input(INPUT_POST, 'last_name');

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
$sql = "DELETE FROM actor WHERE actor_id = $actorid AND first_name = '$fname' AND last_name = '$lname'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_actor_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>
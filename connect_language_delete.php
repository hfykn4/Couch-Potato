<?php
$languageid = filter_input(INPUT_POST, 'language_id');
$name = filter_input(INPUT_POST, 'name');

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
$sql = "DELETE FROM language WHERE language_id = $languageid AND name = '$name'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_language_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}
mysqli_close($conn);
?>
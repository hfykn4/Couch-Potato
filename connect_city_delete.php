<?php
$cityid = filter_input(INPUT_POST, 'city_id');
$city = filter_input(INPUT_POST, 'city');
$countryid = filter_input(INPUT_POST, 'country_id');

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
$sql = "DELETE FROM city WHERE city_id = $cityid AND city = '$city' AND country_id = '$countryid' ";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_city_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>
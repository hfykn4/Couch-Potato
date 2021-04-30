<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$actorid = filter_input(INPUT_POST, 'actor_id');
$fname = filter_input(INPUT_POST, 'first_name');
$lname = filter_input(INPUT_POST, 'last_name');
$last_update = date("Y-m-d H:i:s");

$host = "jupiter.nottingham.edu.my";
$dbusername = "hfykn4jupiter";
$dbpassword = "NKYan@(21112001)##";
$dbname = "hfykn4ju_cw2";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE actor SET first_name='$fname', last_name='$lname', last_update ='$last_update' WHERE actor_id='$actorid'";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_actor_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
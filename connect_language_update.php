<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$languageid = filter_input(INPUT_POST, 'language_id');
$name = filter_input(INPUT_POST, 'name');
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

$sql = "UPDATE language SET name = '$name' WHERE language_id = '$languageid'";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_language_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
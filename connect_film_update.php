<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$filmid = filter_input(INPUT_POST, 'film_id');
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$releaseyr= filter_input(INPUT_POST, 'release_year');
$languageid = filter_input(INPUT_POST, 'language_id');
$orilanguageid = filter_input(INPUT_POST, 'original_language_id');
$rentalduration = filter_input(INPUT_POST, 'rental_duration');
$rentalrate = filter_input(INPUT_POST, 'rental_rate');
$length = filter_input(INPUT_POST, 'length');
$replacementcost = filter_input(INPUT_POST, 'replacement_cost');
$rating = filter_input(INPUT_POST, 'rating');
$specialfeatures = filter_input(INPUT_POST, 'special_features');
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

$sql = "UPDATE film SET title='$title', description='$description', release_year='$releaseyr', language_id='$languageid', original_language_id='$orilanguageid', rental_duration='$rentalduration', rental_rate='$rentalrate',length='$length', replacement_cost='$replacementcost',rating='$rating',special_features='$specialfeatures', last_update ='$last_update' WHERE film_id='$filmid'";

if (mysqli_query($conn, $sql)) {
  //echo "Record updated successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_film_select.php?save_status=success");
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
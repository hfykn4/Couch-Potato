<?php
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
$sql = "DELETE FROM film WHERE film_id = $filmid AND title = '$title' AND description = '$description' AND release_year = '$releaseyr' AND language_id = '$languageid' AND original_language_id = '$orilanguageid' AND rental_duration = '$rentalduration' AND rental_rate = '$rentalrate' AND length = '$length' AND replacement_cost = '$replacementcost' AND rating = '$rating' AND special_features = '$specialfeatures'";

if ($conn->query($sql) === TRUE) {
  //echo "Record deleted successfully"
  header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_film_select.php?save_status=success");
} else {
  echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
?>
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

if (mysqli_connect_error()){
	die('Connect Error ('. mysqli_connect_errno() .') '
	. mysqli_connect_error());
}
else{
	$sql = "INSERT INTO film (film_id, title, description, release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features, last_update)
	values ('$filmid', '$title', '$description', '$releaseyr', '$languageid', '$orilanguageid', '$rentalduration', '$rentalrate', '$length', '$replacementcost', '$rating', '$specialfeatures', '$last_update')";
	if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_film_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}
?>
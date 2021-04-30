<?php

$filmid = filter_input(INPUT_POST, 'film_id');
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');


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
	$sql = "INSERT INTO film_text (film_id, title, description)
	values ('$filmid','$title','$description')";
	if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_film_text_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}

?>
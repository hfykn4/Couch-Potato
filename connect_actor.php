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

if (mysqli_connect_error()){
	die('Connect Error ('. mysqli_connect_errno() .') '
	. mysqli_connect_error());
}
else{
	$sql = "INSERT INTO actor (actor_id, first_name, last_name, last_update)
	values ('$actorid', '$fname', '$lname', '$last_update')";
	if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_actor_select.php?save_status=success");
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}
?>
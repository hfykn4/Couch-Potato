<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$ctyid = filter_input(INPUT_POST, 'country_id');
$country = filter_input(INPUT_POST, 'country');
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
	$sql = "INSERT INTO country (country_id, country, last_update)
	values ('$ctyid', '$country', '$last_update')";
	if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_country_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}
?>
<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$staffid = filter_input(INPUT_POST, 'staff_id');
$fname = filter_input(INPUT_POST, 'first_name');
$lname = filter_input(INPUT_POST, 'last_name');
$addressid= filter_input(INPUT_POST, 'address_id');
$picture = filter_input(INPUT_POST, 'picture');
$email = filter_input(INPUT_POST, 'email');
$storeid = filter_input(INPUT_POST, 'store_id');
$active = filter_input(INPUT_POST, 'active');
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');
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
	$sql = "INSERT INTO staff (staff_id, first_name, last_name, address_id, picture, email, store_id, active, username, password, last_update)
	values ('$staffid', '$fname', '$lname', '$addressid', '$picture', '$email', '$storeid', '$active', '$username', '$password', '$last_update')";
	if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_staff_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}
?>
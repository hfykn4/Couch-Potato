<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$storeid = filter_input(INPUT_POST, 'store_id');
$managerstaffid = filter_input(INPUT_POST, 'manager_staff_id');
$addressid = filter_input(INPUT_POST, 'address_id');
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
	$sql = "INSERT INTO store (store_id, manager_staff_id, address_id, last_update)
	values ('$storeid','$managerstaffid','$addressid','$last_update')";
	if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_store_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}

?>
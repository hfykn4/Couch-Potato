<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$addressid = filter_input(INPUT_POST, 'address_id');
$address = filter_input(INPUT_POST, 'address');
$address2 = filter_input(INPUT_POST, 'address2');
$district = filter_input(INPUT_POST, 'district');
$cityid = filter_input(INPUT_POST, 'city_id');
$postalcode = filter_input(INPUT_POST, 'postal_code');
$phone = filter_input(INPUT_POST, 'phone');
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
	$sql = "INSERT INTO address (address_id, address, address2, district, city_id, postal_code, phone, last_update)
	values ('$addressid','$address','$address2','$district','$cityid','$postalcode','$phone','$last_update')";
	if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
     //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_address_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}


?>
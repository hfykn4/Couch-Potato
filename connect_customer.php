<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$customerid = filter_input(INPUT_POST, 'customer_id');
$storeid = filter_input(INPUT_POST, 'store_id');
$firstname = filter_input(INPUT_POST, 'first_name');
$lastname = filter_input(INPUT_POST, 'last_name');
$email = filter_input(INPUT_POST, 'email');
$addressid = filter_input(INPUT_POST, 'address_id');
$active = filter_input(INPUT_POST, 'active');
$createdate = filter_input(INPUT_POST, 'create_date');
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
	$sql = "INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update)
	values ('$customerid','$storeid','$firstname','$lastname','$email','$addressid','$active','$createdate','$last_update')";
	if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_customer_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}

?>
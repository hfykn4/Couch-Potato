<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$paymentid = filter_input(INPUT_POST, 'payment_id');
$customerid = filter_input(INPUT_POST, 'customer_id');
$staffid = filter_input(INPUT_POST, 'staff_id');
$rentalid= filter_input(INPUT_POST, 'rental_id');
$amount = filter_input(INPUT_POST, 'amount');
$paymentdate = filter_input(INPUT_POST, 'payment_date');
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
	$sql = "INSERT INTO payment (payment_id, customer_id, staff_id, rental_id, amount, payment_date, last_update)
	values ('$paymentid', '$customerid', '$staffid', '$rentalid', '$amount', '$paymentdate', '$last_update')";
	if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_payment_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}
?>
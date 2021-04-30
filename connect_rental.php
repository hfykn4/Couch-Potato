<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$rentalid = filter_input(INPUT_POST, 'rental_id');
$rentaldate = filter_input(INPUT_POST, 'rental_date');
$inventoryid = filter_input(INPUT_POST, 'inventory_id');
$customerid = filter_input(INPUT_POST, 'customer_id');
$returndate = filter_input(INPUT_POST, 'return_date');
$staffid = filter_input(INPUT_POST, 'staff_id');
$last_update = date("Y-m-d h:i:s");
    
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
	$sql = "INSERT INTO rental (rental_id, rental_date, inventory_id, customer_id, return_date, staff_id,last_update)
	values ('$rentalid','$rentaldate','$inventoryid','$customerid','$returndate','$staffid','$last_update')";
		if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_rental_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}



?>
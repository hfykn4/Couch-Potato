<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
$inventoryid = filter_input(INPUT_POST, 'inventory_id');
$filmid = filter_input(INPUT_POST, 'film_id');
$storeid = filter_input(INPUT_POST, 'store_id');
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
	$sql = "INSERT INTO inventory (inventory_id, film_id, store_id, last_update)
	values ('$inventoryid', '$filmid', '$storeid', '$last_update')";
		if ($conn->query($sql)){
		//echo("<script type='text/javascript'>
        //alert('Address successfully inserted');
        //</script>");
		header("Location: http://hfykn4.jupiter.nottingham.edu.my/connect_inventory_select.php?save_status=success");
		
	}
	else{
		echo "Error: ". $sql ."<br>". $conn->error;
	}
	$conn->close();
}
?>
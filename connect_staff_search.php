<!DOCTYPE html>
<html>
<head><link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
<style>
 body {
        padding: 0px;
        margin: 0;
        font-family: 'Roboto Condensed', sans-serif;
    }
    
    table {
        margin-left: auto;
	margin-right: auto;
        border-collapse: collapse;
        width: auto;
        height: auto;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th {
	background: linear-gradient(to right, #66ffff 15%, #ccffcc 93%);
	color: #fff;
	font-size: 25px;
}
    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    #header {
        color: #fff;
    }
    
    h1 {
        font-weight: 600;
        text-align: center;
        background: linear-gradient(to right, #66ffff 15%, #ccffcc 93%);;
        color: #fff;
        padding: 10px 0px;
    }
    
    tr:hover {
        background-color: #f5f5f5;
        transform: scale(1.02);
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }

    @media only screen and (max-width: 768px) {
        table {
            width: 90%;
        }
}
</style>
</head>
<body>
	<h1>Search Result</h1>

<?php
$search1 = filter_input(INPUT_POST, 'search1');
$search2 = filter_input(INPUT_POST, 'search2');
$search3 = filter_input(INPUT_POST, 'search3');

$host = "jupiter.nottingham.edu.my";
$dbusername = "hfykn4jupiter";
$dbpassword = "NKYan@(21112001)##";
$dbname = "hfykn4ju_cw2";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (!$search1) {
	if (!$search2) {
		$sql = "SELECT * FROM staff WHERE last_name = '$search3'";
	}
	else if (!$search3) {
		$sql = "SELECT * FROM staff WHERE first_name = '$search2'";
	}
	else 
	{
		$sql = "SELECT * FROM staff WHERE first_name = '$search2' AND last_name = '$search3'";
	}
} 

else if (!$search2) {
	if (!$search1) {
		$sql = "SELECT * FROM staff WHERE last_name = '$search3'";
	}
	else if (!$search3) {
		$sql = "SELECT * FROM staff WHERE staff_id = '$search1'";
	}
	else 
	{
		$sql = "SELECT * FROM staff WHERE staff_id = '$search1' AND last_name = '$search3'";
	}
}

else if (!$search3) {
	if (!$search1) {
		$sql = "SELECT * FROM staff WHERE first_name = '$search2'";
	}
	else if (!$search2) {
		$sql = "SELECT * FROM staff WHERE staff_id = '$search1'";
	}
	else 
	{
		$sql = "SELECT * FROM staff WHERE staff_id = '$search1' AND first_name = '$search2'";
	}
} 
 else 
{	
	$sql = "SELECT * FROM staff WHERE staff_id = '$search1' AND first_name  = '$search2' AND last_name  = '$search3' ";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Staff ID</th><th>First Name</th><th>Last Name</th><th>Address ID</th><th>Picture</th><th>Email</th><th>Store ID</th><th>Active</th><th>Username</th><th>Password</th><th>Last Update</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["staff_id"]. "</td><td>" . $row["first_name"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["address_id"]. "</td><td>" . $row["picture"]. "</td><td>" . $row["email"]. "</td><td>" . $row["store_id"]. "</td><td>" . $row["active"]. "</td><td>" . $row["username"]. "</td><td>" . $row["password"]. "</td><td>" . $row["last_update"]. "</td></tr>";
    }
    echo "</table>";
} 
else {
	echo "0 results";
}

$conn->close();
?>
</body>
</html>
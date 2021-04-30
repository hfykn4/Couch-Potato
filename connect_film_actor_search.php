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
        width: 800px;
        height: auto;
        border: 1px solid #bdc3c7;
        box-shadow: 2px 2px 12px rgba(0, 0, 0, 0.2), -1px -1px 8px rgba(0, 0, 0, 0.2);
    }
    
    tr {
        transition: all .2s ease-in;
        cursor: pointer;
    }
    
    th {
	background: linear-gradient(to bottom left, #3366ff -1%, #99ff99 100%);
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
        background: linear-gradient(to bottom left, #3366ff -1%, #99ff99 100%);
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
	$sql = "SELECT * FROM film_actor WHERE film_id = '$search2'";
} 
else if (!$search2) 
{
	$sql = "SELECT * FROM film_actor WHERE actor_id = '$search1'";
} else
{
	$sql = "SELECT * FROM film_actor WHERE actor_id = '$search1' AND film_id = '$search2'";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Actor ID</th><th>Film ID</th><th>Last Update</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["actor_id"]. "</td><td>" . $row["film_id"]. "</td><td>" . $row["last_update"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>
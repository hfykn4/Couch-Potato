<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
	background: linear-gradient(to right, #cc99ff 15%, #ffcccc 93%);
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
         background: linear-gradient(to right, #cc99ff 15%, #ffcccc 93%);
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
     <!-- Success Modal -->
<div class="modal fade" id="modal_success" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            <div class="modal-header" style="background: linear-gradient(to right, #cc99ff 15%, #ffcccc 93%">
               
                <h5 class="modal-title" id="exampleModalCenterTitle" style="color:white">Successful!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <h1 style="text-align:center;">
                    <div class="checkmark-circle">
                        <div class="background"></div>
                        <div class="checkmark draw"></div>
                    </div>
                </h1>
                        <div style="text-align:center;">
                            <image width ="20%" src="successful.png" style=>
                        </div>
                        <p>We have received your information.</p>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?
if($_GET['save_status']=="success"){
// print "<span class='succ' >We have receive your registration. Email had been sent to your email</span>";
echo "<script>
$('#modal_success').modal('show');
</script>";                                  }
 ?>
 
<h1>Rental Table</h1>

<?php
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


$sql = "SELECT * FROM rental";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Rental ID</th><th>Rental Date</th><th>Inventory ID</th><th>Customer ID</th><th>Return Date</th><th>Staff ID</th><th>Last Update</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["rental_id"]. "</td><td>" . $row["rental_date"]. "</td><td>" . $row["inventory_id"]. "</td><td>" . $row["customer_id"]. "</td><td>" . $row["return_date"]. "</td><td>" . $row["staff_id"]. "</td><td>" . $row["last_update"]. "</td></tr>";
    }
    echo "</table>";
} 
else {
	echo "0 results";
}
$result = $conn->query($sql);
$conn->close();
?>
<?php
$name = $_GET['name'];
$date=$_GET['date'];
require_once('db.php');
$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$stmt=mysqli_query($con,"insert into leaves(name,date,status) values ('$name','$date','Pending')");
echo $stmt;
?>
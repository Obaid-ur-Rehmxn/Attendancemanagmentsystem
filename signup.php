<?php
$username = $_GET['username'];
$password=$_GET['password'];
$date=$_GET['date'];
require_once('db.php');
$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$stmt=mysqli_query($con,"insert into users(username,password) Values ('$username','$password')");
$sql=mysqli_query($con,"insert into attendance(name,date,status) Values ('$username','$date','Absent')");
echo $stmt;
?>
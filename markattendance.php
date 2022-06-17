<?php
$name = $_GET['name'];
$date=$_GET['date'];
require_once('db.php');
$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$stmt=mysqli_query($con,"Update attendance set status='Present' where name='$name' AND date='$date'");
echo $stmt;
?>
<?php
$name=$_GET{'name'};
$date=$_GET['date'];
require_once('db.php');
$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$stmt=mysqli_query($con,"Select * from attendance where date='$date' And name='$name' AND status='Present'");
$stmt1=mysqli_num_rows($stmt);
echo $stmt1;
?>
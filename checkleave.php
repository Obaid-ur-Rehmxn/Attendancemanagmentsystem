<?php
$name=$_GET{'name'};
$month=$_GET['month'];
$year=$_GET['year'];
require_once('db.php');
$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$stmt=mysqli_query($con,"Select * from attendance where date Like '$year%$month%' And name='$name' AND status='Leave'");
$stmt1=mysqli_num_rows($stmt);
echo $stmt1;
?>
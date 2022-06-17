<?php
$no=$_GET['no'];
$status=$_GET['status'];
require_once('db.php');
$con1 = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$result3 = mysqli_query($con1, "Update attendance Set status='$status' where no='$no'");
echo $result3;
?>

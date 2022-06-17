<?php
$no=$_GET['no'];
require_once('db.php');
$con1 = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$result3 = mysqli_query($con1, "Delete from attendance where no='$no'");
echo $result3;
?>

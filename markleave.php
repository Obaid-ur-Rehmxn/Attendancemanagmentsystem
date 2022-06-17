<?php
$date=$_GET['date'];
require_once('db.php');
$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$sql=mysqli_query($con,"Select * from leaves where date='$date' And status='Approved'");
while($res=mysqli_fetch_array($sql)){
    $abc=$res['name'];
    $stmt=mysqli_query($con,"Update attendance Set status='Leave' where name='$abc' And date='$date'");
}
echo true;
?>
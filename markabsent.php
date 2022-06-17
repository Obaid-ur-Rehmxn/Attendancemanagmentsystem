<?php
$date=$_GET['date'];
require_once('db.php');
$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$sql=mysqli_query($con,"Select * from users");
while($res=mysqli_fetch_array($sql)){
    $abc=$res['username'];
    $stmt=mysqli_query($con,"Insert into attendance(name,date,status) Values('$abc','$date','Absent')");
}
echo true;
?>
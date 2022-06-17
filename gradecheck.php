<?php
$month=$_GET['month'];
$year=$_GET['year'];
require_once('db.php');
$con = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$sql=mysqli_query($con,"Select * from users");
?>
<table class="styled-table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Grade</th>
    </tr>
    </thead>
    <tbody>
    <?php
while($res=mysqli_fetch_array($sql)) {
    $name = $res['username'];
    $grade = null;
    $stmt = mysqli_query($con, "Select * from attendance where date Like '$year%$month%' And name='$name' AND status='Present'");
    $count = mysqli_num_rows($stmt);
    if ($count > 21 && $count <= 26) {
        $grade = "A";
    } else if ($count > 16 && $count <= 21) {
        $grade = "B";
    } else if ($count > 10 && $count <= 16) {
        $grade = "C";
    } else {
        $grade = "D";
    }
    echo '<tr>';
    echo '<td>' . $res['username'] . '</td>';
    echo '<td>' . $grade . '</td>';
    echo '</tr>';
}
        ?>
    </tbody>
</table>

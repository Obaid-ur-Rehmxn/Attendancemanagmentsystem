<?php
$name=$_GET['name'];
require_once('db.php');
$con1 = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$result3 = mysqli_query($con1, "SELECT * FROM attendance where name='$name' order by no desc");
?>
    <table class="styled-table">
        <thead>
        <tr>
            <th>Date</th>
            <th>Attendance</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($res=mysqli_fetch_array($result3)) {
            echo '<tr>';
            echo '<td>'.$res['date'].'</td>';
            echo '<td>'.$res['status'].'</td>';
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
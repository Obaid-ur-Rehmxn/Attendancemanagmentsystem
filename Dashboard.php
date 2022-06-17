<?php
require_once('db.php');
$con1 = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);
$result3 = mysqli_query($con1, "SELECT * FROM leaves where status='Pending'");
$result4 = mysqli_query($con1, "SELECT * FROM attendance");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/dashboard.css">

</head>
<body onload="onDraw()">
<form action="Dashboard.php" method="POST" class="form">
    <div class="admin" id="admin">
        <div class="heading">
            <h2>DASHBOARD</h2>
            <div class="datetime">
                <h3>Logged in:</h3>
                <h3 id="check"></h3>
                <h3 id="date"></h3>
                <h3 id="time"></h3>
            </div>
        </div>
        <div class="showdata">
            <div class="table2">
                <div class="table" id="table2">
                    <table class="styled-table">
                        <thead>
                        <tr>
                            <th>Sr no</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($res=mysqli_fetch_array($result4)) {
                        echo '<tr>';
                            echo '<td>'.$res['no'].'</td>';
                            echo '<td>'.$res['name'].'</td>';
                            echo '<td>'.$res['date'].'</td>';
                            echo '<td contenteditable="true">'.$res['status'].'</td>';
                            echo '<td><input type="button" name="alldatasave" id="alldatasave" class="alldatasave" value="Save"><input type="button" name="alldatadelete" id="alldatadelete" class="leavechange1" value="Delete"></td>';
                            echo '</tr>';
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="showdata1">
            <div class="leaveapproval">
                <div class="table3">
                    <div class="table" id="table3">
                        <table class="styled-table">
                            <thead>
                            <tr>
                                <th>Sr no</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($res=mysqli_fetch_array($result3)) {
                                echo '<tr>';
                                echo '<td>'.$res['lno'].'</td>';
                                echo '<td>'.$res['name'].'</td>';
                                echo '<td>'.$res['date'].'</td>';
                                echo '<td><select class="tableinput" id="tableinput'.$res['lno'].'"><option value="'.$res['status'].'">'.$res['status'].'</option><option value="Approved">Approved</option><option value="Rejected">Rejected</option></select></td>';
                                echo '<td><input type="button" name="leavechange" id="leavechange" class="leavechange" value="Save"></td>';
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="grade">
                <div class="table4">
                    <div class="table" id="table4">
                        <table class="styled-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Grade</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="user" id="user">
        <div class="sec1">
            <div class="profile">
                <img src="images/circle.png" alt="circle">
                <input type="file" name="upload" id="upload" style="width: 90%; margin: 2px; font-size: 8px">
                <input type="button" value="Upload" class="pic" id="pic" name="pic" style="font-size: 9px">
                <p>Logged in:</p>
                <p id="check1"></p>
            </div>
            <div class="button" id="view" onclick="onView()">
                <img src="images/view.png" alt="view">
                <p>View</p>
                <p>Attendance</p>
            </div>
            <div class="button" onclick="markAttandance()">
                <img src="images/mark.png" alt="mark">
                <p>Mark</p>
                <p>Attendance</p>
            </div>
            <div class="button" onclick="leaveRequest()">
                <img src="images/request.png" alt="request">
                <p>Request</p>
                <p>Leave</p>
            </div>
        </div>
        <div class="sec2">
            <div class="heading">
                <h2>DASHBOARD</h2>
                <div class="datetime">
                    <h3 id="date1"></h3>
                    <h3 id="time1"></h3>
                </div>
            </div>
            <div class="cards">
                <div class="card colora">
                    <img src="images/present.png" alt="present">
                    <div class="abc">
                        <p>Present</p>
                        <p id="present">0</p>
                    </div>
                </div>
                <div class="card colorb">
                    <img src="images/absent.png" alt="absent">
                    <div class="abc">
                        <p>Absent</p>
                        <p id="absent">0</p>
                    </div>
                </div>
                <div class="card colorc">
                    <img src="images/leave.png" alt="leave">
                    <div class="abc">
                        <p>Leave</p>
                        <p id="leave">0</p>
                    </div>
                </div>
            </div>
            <div class="attendance" id="attendance" name="attendance">
                    <input type="text" name="input" id="input" class="input" placeholder="Search">
                <div class="table1">
                    <div class="table" id="table">
                    <table class="styled-table">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Attendance</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            <div class="attendance1" id="attendance1" name="attendance1">
                <input type="date" name="input1" id="input1" class="input" placeholder="Date">
                <input type="button" id="leavesubmit" name="leavesubmit" class="leavesubmit" onclick="requestLeave()" value="Submit Request">
                <div class="table1">
                    <div class="table" id="table1">
                        <table class="styled-table">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
        function onDraw(){
            var username=localStorage.getItem("username");
            if (username=="Admin"){
                document.getElementById('user').style.display='none';
                document.getElementById('admin').style.display='Block';
            }
            else{
                document.getElementById('admin').style.display='none';
                document.getElementById('user').style.display='Block';
            }
        }
        var username=localStorage.getItem("username");
        setInterval(showTime, 1000);
        function showTime() {
            let time = new Date();
            let hour = time.getHours();
            let min = time.getMinutes();
            let sec = time.getSeconds();
            am_pm = "AM";
            if (hour > 12) {
                hour -= 12;
                am_pm = "PM";
            }
            if (hour == 0) {
                hr = 12;
                am_pm = "AM";
            }
            hour = hour < 10 ? "0" + hour : hour;
            min = min < 10 ? "0" + min : min;
            sec = sec < 10 ? "0" + sec : sec;
            let currentTime = hour + ":"
                + min + ":" + sec + am_pm;
            document.getElementById("time")
                .innerHTML = currentTime;
            document.getElementById("time1")
                .innerHTML = currentTime;
        }

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        document.getElementById('date').innerHTML=today;
        document.getElementById('date1').innerHTML=today;
        onDraw();
        showTime();
        checkPresent();
        checkAbsent();
        checkLeave();
        dataintoTable();
        dataintoleave();
        gradecheck();
        document.getElementById("check1").innerHTML=username;
        document.getElementById("check").innerHTML=username;

        function onView(){
            var a=document.getElementById('attendance');
            if (a.style.display=='none'){
                document.getElementById('attendance1').style.display='none';
                document.getElementById('attendance').style.display='Block';
            }
            else{
                document.getElementById('attendance').style.display='none';
                document.getElementById('attendance1').style.display='none';
            }
        }

        function leaveRequest(){
            var a=document.getElementById('attendance1');
            if (a.style.display=='none'){
                document.getElementById('attendance').style.display='none';
                document.getElementById('attendance1').style.display='Block';
            }
            else{
                document.getElementById('attendance1').style.display='none';
                document.getElementById('attendance').style.display='none';
            }
        }

        function markAttandance(){
            var date=document.getElementById('date').innerHTML;
            var name=localStorage.getItem("username");
            var confirmmsg=confirm("Are u sure u want to mark ur attendance?");
            if (confirmmsg){
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function (){
                    if (this.readyState==4 && this.status==200){
                        var myObj1=this.responseText;
                        if (myObj1==0){
                            var xmlhttp=new XMLHttpRequest();
                            xmlhttp.onreadystatechange=function (){
                                if (this.readyState==4 && this.status==200){
                                    var myObj1=this.responseText;
                                    if (myObj1==1){
                                        alert("Attendance marked successfully");
                                        dataintoTable();
                                        checkPresent();
                                        checkAbsent();
                                        checkLeave();
                                    }
                                    else{
                                        alert("Some error occurred");
                                    }
                                }
                            };
                            xmlhttp.open("GET","markattendance.php?name="+ name +"&date="+ date,true);
                            xmlhttp.send();
                        }
                        else{
                            alert("You have already mark today attendance");
                        }
                    }
                };
                xmlhttp.open("GET","checkduplicate1.php?name="+ name +"&date="+ date,true);
                xmlhttp.send();
            }
            }




        function dataintoTable(){
            var name=localStorage.getItem("username");
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    document.getElementById('table').innerHTML=myObj1;
                }
            };
            xmlhttp.open("GET","intoTable.php?name="+ name +"",true);
            xmlhttp.send();
        }

        function dataintoleave(){
            var name=localStorage.getItem("username");
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    document.getElementById('table1').innerHTML=myObj1;
                }
            };
            xmlhttp.open("GET","intoleave.php?name="+ name +"",true);
            xmlhttp.send();
        }


        function requestLeave(){
            var name=localStorage.getItem("username");
            var date=document.getElementById('input1').value;
            console.log(date);
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    if (myObj1==1){
                        alert("Request has been send to the admin");
                        dataintoleave();
                    }
                    else{
                        alert("Some error occurred");
                    }
                }
            };
            xmlhttp.open("GET","requestLeave.php?name="+ name +"&date="+ date,true);
            xmlhttp.send();
        }

        function checkPresent(){
            var date1=(new Date().getMonth())+1;
            var date2=new Date().getFullYear();
            console.log(date);
            var name=localStorage.getItem("username");
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    console.log(myObj1);
                    document.getElementById('present').innerHTML=myObj1;
                }
            };
            xmlhttp.open("GET","checkpresent.php?name="+ name +"&month="+ date1+"&year="+ date2,true);
            xmlhttp.send();
        }

        function checkAbsent(){
            var date1=(new Date().getMonth())+1;
            var date2=new Date().getFullYear();
            var name=localStorage.getItem("username");
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    console.log(myObj1);
                    document.getElementById('absent').innerHTML=myObj1;
                }
            };
            xmlhttp.open("GET","checkabsent.php?name="+ name +"&month="+ date1+"&year="+ date2,true);
            xmlhttp.send();
        }

        function checkLeave(){
            var date1=(new Date().getMonth())+1;
            var date2=new Date().getFullYear();
            var name=localStorage.getItem("username");
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    console.log(myObj1);
                    document.getElementById('leave').innerHTML=myObj1;
                }
            };
            xmlhttp.open("GET","checkleave.php?name="+ name +"&month="+ date1+"&year="+ date2,true);
            xmlhttp.send();
        }

        function gradecheck(){
            var date1=(new Date().getMonth())+1;
            var date2=new Date().getFullYear();
            var name=localStorage.getItem("username");
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    console.log(myObj1);
                    document.getElementById('table4').innerHTML=myObj1;
                }
            };
            xmlhttp.open("GET","gradecheck.php?month="+ date1+"&year="+ date2,true);
            xmlhttp.send();
        }

        $(".leavechange").click(function() {
            var val = $(this).closest('td').siblings(':first-child').text();
            var val1 =$('#tableinput'+val).find(':selected').html();
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    if (myObj1==1){
                        alert("Updated Successfully");
                    }
                    else{
                        alert("Some error occurred");
                    }
                }
            };
            xmlhttp.open("GET","leavestatus.php?no="+ val +"&status="+ val1,true);
            xmlhttp.send();
        });

        $(".alldatasave").click(function() {
            var val = $(this).closest('td').siblings(':first-child').text();
            var val1 = $(this).closest('td').siblings(':nth-child(4)').text();
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    if (myObj1==1){
                        alert("Updated Successfully");
                    }
                    else{
                        alert("Some error occurred");
                    }
                }
            };
            xmlhttp.open("GET","alldata.php?no="+ val +"&status="+ val1,true);
            xmlhttp.send();
        });

        $(".leavechange1").click(function() {
            var val = $(this).closest('td').siblings(':first-child').text();
            var xmlhttp=new XMLHttpRequest();
            xmlhttp.onreadystatechange=function (){
                if (this.readyState==4 && this.status==200){
                    var myObj1=this.responseText;
                    if (myObj1==1){
                        alert("Deleted Successfully");
                    }
                    else{
                        alert("Some error occurred");
                    }
                }
            };
            xmlhttp.open("GET","alldatadelete.php?no="+ val +"",true);
            xmlhttp.send();
        });

        // function uploadFile() {
        //     var username=localStorage.getItem("username");
        //     var upload=document.querySelector("#upload").value;
        //     var object = new ActiveXObject("Scripting.FileSystemObject");
        //     var file = object.getFile(upload);
        //     file.Move('pics/'+username+'.jpg');
        //     document.write("File is moved successfully");
        // }
</script>
</body>
</html>
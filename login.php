<?php

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<div class="wrapper">
    <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
    </div>
    <div class="form-container">
        <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked>
            <input type="radio" name="slide" id="signup">
            <label for="login" class="slide login">Login</label>
            <label for="signup" class="slide signup">Signup</label>
            <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
            <form action="Dashboard.php" class="login">
                <div class="field">
                    <input type="text" placeholder="Username" name="loginUser" id="loginUser" required>
                </div>
                <div class="field">
                    <input type="password" placeholder="Password" name="loginPass" id="loginPass" required>
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Login" onclick="login(document.getElementById('loginUser').value,document.getElementById('loginPass').value)">
                </div>
                <div class="signup-link">Not a user? <a href="">Signup now</a></div>
            </form>
            <form action="login.php" class="signup">
                <div class="field">
                    <input type="text" placeholder="Username" name="signUser" id="signUser" required>
                </div>
                <div class="field">
                    <input type="password" placeholder="Password" name="signPass" id="signPass" required>
                </div>
                <div class="field">
                    <input type="password" placeholder="Confirm password" name="signconPass" id="signconPass" required>
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Signup" onclick="signup(document.getElementById('signUser').value,document.getElementById('signPass').value,document.getElementById('signconPass').value)">
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.signup");
    const signupLink = document.querySelector("form .signup-link a");
    const loginuser = document.getElementById("loginUser").value;
    signupBtn.onclick = (()=>{
        loginForm.style.marginLeft = "-50%";
        loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (()=>{
        loginForm.style.marginLeft = "0%";
        loginText.style.marginLeft = "0%";
    });
    signupLink.onclick = (()=>{
        signupBtn.click();
        return false;
    });

    markAbsent();
    markleave();

    function login(user,pass){
        localStorage.setItem("username",user);
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function (){
            if (this.readyState==4 && this.status==200){
                var myObj1=this.responseText;
                if (user=="Admin" && pass=="Admin"){
                    alert("Login successfully");
                    window.location.href='Dashboard.php';
                }
                else if(myObj1==true){
                    alert("login successfully");
                    window.location.href='Dashboard.php';
                }
                else{
                    alert("Invalid credentials");
                    window.location.href='login.php';
                }
            }
        };
        xmlhttp.open("GET","logincredentials.php?username="+ user +"&password="+ pass,true);
        xmlhttp.send();
    }

    function signup(user,pass,conpass){
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        if (pass==conpass){
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function (){
            if (this.readyState==4 && this.status==200){
                var myObj1=this.responseText;
                    if (myObj1==1){
                        alert("User created successfully");
                        window.location.href='login.php';
                    }
                    else{
                        alert("Some error occurred");
                        window.location.href='login.php';
                    }
            }
        };
        xmlhttp.open("GET","signup.php?username="+ user +"&password="+ pass+"&date="+ today,true);
        xmlhttp.send();
        }
        else{
            alert("Confirm password is not same as password");
            window.location.href='login.php';
        }
    }

    function markAbsent(){
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        console.log(today);
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function (){
            if (this.readyState==4 && this.status==200){
                var myObj1=this.responseText;
                if (myObj1==0){
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange=function (){
                        if (this.readyState==4 && this.status==200){
                            var myObj1=this.responseText;
                            console.log(myObj1);
                        }
                    };
                    xmlhttp.open("GET","markabsent.php?date="+ today+"",true);
                    xmlhttp.send();
                }
            }
        };
        xmlhttp.open("GET","checkduplicate.php?date="+ today+"",true);
        xmlhttp.send();
    }

    function markleave(){
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();
        today = yyyy + '-' + mm + '-' + dd;
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function (){
            if (this.readyState==4 && this.status==200){
                var myObj1=this.responseText;
                console.log(myObj1);
            }
        };
        xmlhttp.open("GET","markleave.php?date="+ today+"",true);
        xmlhttp.send();
    }

</script>
</body>
</html>
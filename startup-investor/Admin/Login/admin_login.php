<?php
   include("../../Assets/php/connection/connection.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($con,$_POST['username']);
      $mypassword = mysqli_real_escape_string($con,$_POST['password']); 
      //mysqli_query($con,"INSERT INTO admin(username,passcode) values('$myusername','$mypassword')");
      $result = mysqli_query($con,"SELECT * FROM admin WHERE username='$myusername' AND passcode='$mypassword'");  
      echo mysqli_num_rows($result);
      if(mysqli_num_rows($result) > 0) {   
        while($admin_query = mysqli_fetch_array($result)){
            $_SESSION['admin_id'] = $admin_query['a_user_id'];
        }    
        header("Location:../home/admin_dashboard.php");
        
      }else {
         $error = "Your Login Name or Password is invalid";
         echo $error;
      }
   }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/admin_style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <title>Admin Login </title>
    <style>
        body {
      background-image: url('../../Assets/logo/background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: cover;
    }
    header{
            margin: 20px;
            position: fixed;
            top: 0;
        }
        .log{
            float: right;
            display: flex;
            align-items: center;
            column-gap: 20px;
        }
        .log  > b,a{
            font-size: x-large;
        }
        a{
            text-decoration: underline;
            color: black;
            font-family: sofia;
        }
        .logo{
            margin-top: 20px;
            float: left;
            transform: translate(10px, -20px);
        }
    </style>
</head>
<body>
<div class="header">
      <div class="logo">
          <img src="../../Assets/logo/logo.png" alt="" height="75px" width="75px">
      </div>
      <nav>
          <li><a href="../../index.php">Home</a></li>
      </nav>
    </div>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" method="post">
                    <legend>Admin Login</legend>
                    <div class="login__field">
                        <input type="text" class="login__input" placeholder="Username" name="username">
                    </div>
                    <div class="login__field">
                        <input type="password" class="login__input" placeholder="Password" name="password">
                    </div>
                    <input type="submit" class="button login__submit" value="Login">
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>
        </div>
    </div>
    
</body>
</html>
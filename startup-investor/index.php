<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="Assets/css/index_style.css" />
    <title>StartUp Investment System</title>
    <script src="Assets/js/index_script.js" defer></script>
    <style>
        body {
      background-image: url('Assets/logo/background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: cover;
    }
    </style>
</head>
<body>
    <div class="grid-container">
        <div class="item1">
            <div class="logo">
                <img src="Assets/logo/logo.png" alt="" height="75px" width="75px">
            </div>
            <nav>
                <li>Home</li>
                <li><a href="Admin/Login/admin_login.php" target="_blank">Admin Login</a></li>
                <li><a href="Investor/signup/investor_signup.php">Investor Signup</a></li>
                <li><a href="Startup/signup/startup_signup.php">StartUp Signup</a></li>
            </nav>
        </div>
        <div class="item3">
            <div class="title">
                StartUp - Investor Interaction <br>
                Platform
            </div>
        </div>  
        <div class="item4">
            <div class="registration-form">
                <div class="header">
                   <button class="btn btn-tab btn-ripple active" data-target-tab="#investor_login">
                   Investor Login
                   </button>
                   <button class="btn btn-tab btn-ripple" data-target-tab="#startup_login">
                   Startup Login
                   </button>
                </div>
                <div class="body">
                   <div class="content active" id="investor_login">
                       <h3>Welcome Investor</h3>
                      <form method="post">
                         <div class="input-group">
                            <input type="email" name="email_check" id="email" class="input-elem" placeholder=" " autocomplete="off" required/>
                            <label for="name">Email</label>
                         </div>
                         <div class="input-group">
                            <input type="password" name="password_check" id="password" class="input-elem" placeholder=" " autocomplete="off" required/>
                            <label for="password">Password</label>
                            <i class="fas fa-eye-slash eye"></i>
                         </div>
                         <button class="btn btn-register" name="i_submit">Log In</button>
                      </form>
                   </div>
                   <div class="content" id="startup_login">
                    <h3>Welcome StartUp</h3>
                     <form  method="post">
                       <div class="input-group">
                         <input type="email" name="email_check" id="email" class="input-elem" placeholder=" " autocomplete="off" required/>
                         <label for="name">Email</label>
                      </div>
                      <div class="input-group">
                         <input type="password" name="password_check" id="password" class="input-elem" placeholder=" " autocomplete="off" required/>
                         <label for="password">Password</label>
                         <i class="fas fa-eye-slash eye"></i>
                      </div>
                        <button class="btn btn-register" name="s_submit">Log In</button>
                     </form>
                  </div>
                </div>
             </div>
        </div>
    </div>
</body>
</html>

<?php  
if(isset($_POST["i_submit"])){  
  
if(!empty($_POST['email_check']) && !empty($_POST['password_check'])) {  
    $user=$_POST['email_check'];  
    $pass=$_POST['password_check'];  
    
    include("Assets/php/connection/connection.php");
    $query=mysqli_query($con,"SELECT * FROM investor WHERE email='".$user."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    
        $dbusername=$row['email'];  
        $dbpassword=$row['password'];
        $dbunique_id=$row['unique_id'];  
    }  
  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['user_id']=$dbunique_id;  
   
    echo "<script>
      window.location.href = 'Investor/home/investor_home.php';
      alert('LogIn Successful');
    </script>";
    }  
    } else {   
    echo '<script type ="text/JavaScript">';  
    echo 'alert("Invalid username or password!")';  
    echo '</script>'; 
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>

<?php  
if(isset($_POST["s_submit"])){  
  
if(!empty($_POST['email_check']) && !empty($_POST['password_check'])) { 

    $user=$_POST['email_check'];  
    $pass=$_POST['password_check'];  
    
    include("Assets/php/connection/connection.php");
    $query=mysqli_query($con,"SELECT * FROM startup WHERE email='".$user."' AND password='".$pass."'");  
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    
        $dbusername=$row['email'];  
        $dbpassword=$row['password'];  
        $dbunique_id=$row['unique_id'];

    }  
    if($user == $dbusername && $pass == $dbpassword)  
    {  
    session_start();  
    $_SESSION['user_id']=$dbunique_id;  
  
    /* Redirect browser */  
    echo "<script>
      window.location.href = 'Startup/home/startup_home.php';
      alert('LogIn Successful');
    </script>"; 
    }  
    } else {  
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Invalid username or password!")';  
        echo '</script>'; 
     
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>
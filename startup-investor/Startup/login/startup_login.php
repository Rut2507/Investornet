<?php  
if(isset($_POST["submit"])){  
  
if(!empty($_POST['email_check']) && !empty($_POST['password_check'])) { 

    $user=$_POST['email_check'];  
    $pass=$_POST['password_check'];  
    
    include("../../Assets/php/connection/connection.php");
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
    header("Location: ../home/startup_home.php");  
    }  
    } else {  
    echo "Invalid username or password!";
     
    }  
  
} else {  
    echo "All fields are required!";  
}  
}  
?>
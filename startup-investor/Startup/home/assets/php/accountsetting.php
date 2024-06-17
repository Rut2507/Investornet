<?php
session_start();
    include("../../../../Assets/php/connection/connection.php");
    $id = $_SESSION['user_id'];

    $query =mysqli_query($con,"SELECT * FROM startup WHERE unique_id ='".$id."'");
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    
        $dbusername=$row['name'];
        $dbpass = $row['password'] ;  
        $u_email = $row['email'];
        $u_number = $row['number'];
        $u_startup_name = $row['startup_name'];
        $u_website_url = $row['website_url'];
        $u_sector = $row['sector'];
        $u_stage = $row['stage']; 
        $u_city = $row['city_opp'];
        $profile_pic = $row['profile_pic_url'];

    }
    }   
    $dir = "../upload/".$id;
    $dir_path = str_replace(' ','',$dir);

    if(!file_exists($dir_path)){
        mkdir($dir_path,0777);
    }


    if(isset($_POST['acc_update'])){
        mysqli_query($con,"UPDATE startup SET name ='".$_POST['updated_name']."',email='".$_POST['updated_email']."',number='".$_POST['updated_number']."',startup_name='".$_POST['updated_startupname']."',website_url='".$_POST['updated_website']."',stage ='".$_POST['updated_stage']."',city_opp ='".$_POST['updated_city']."' WHERE unique_id ='".$id."' ");
        echo "<script>
                alert('Profile Updated');
                </script>";
        header("Refresh:0");

    }

    if(isset($_POST['acc_pass'])){
        $old_pass = $_POST['old_pass'];
        if($old_pass == $dbpass){
            if($_POST['pass1']==$_POST['pass2']){
                $pass_final=$_POST['pass1'];
                mysqli_query($con,"UPDATE startup SET password = '".$pass_final."' WHERE unique_id ='".$id."' ");
                echo "<script>
                    window.location.href = '../../startup_home.php';
                    alert('Password Updated');
                    </script>"; 
            }else{
                echo "<script>
                alert('Password not matching');
                </script>";
            }
        }else{
            echo "<script>
                alert('Old Password Incorrect');
                </script>";
        }
    }

    if(isset($_POST['pic_update'])){
        $filename = $_FILES['profile_pic']['name'];
        $location = $dir_path."/".$filename;

        if(move_uploaded_file($_FILES['profile_pic']['tmp_name'],$location)){
            $location = str_replace('../','assets/',$location);
            mysqli_query($con,"INSERT INTO startup (unique_id,profile_pic_url) values('$id','$location') ON DUPLICATE KEY UPDATE profile_pic_url = '".$location."'");   
            echo "<script>
                    window.location.href = '../../startup_home.php';
                    alert('Profile Pic Updated');
                    </script>"; 
            header("Refresh:0");
        }else{
            
        }
    }
    
    

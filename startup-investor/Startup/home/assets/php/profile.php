<?php
session_start();
include("../../../../Assets/php/connection/connection.php");
$id = $_SESSION['user_id'];


$query =mysqli_query($con,"SELECT * FROM startup WHERE unique_id ='".$id."'");
$numrows=mysqli_num_rows($query);  
if($numrows!=0){  
    while($row=mysqli_fetch_assoc($query)){  
        $pitch = $row['video_url'];
    }
}   

if(isset($_POST['update_profile'])){
    mysqli_query($con,"INSERT INTO startup_info (unique_id,problem,solution,product,traction,bizmodel,market,competition,vision) 
    values('".$id."','".$_POST['problem']."','".$_POST['solution']."','".$_POST['product']."','".$_POST['traction']."','".$_POST['bizmodel']."','".$_POST['market']."','".$_POST['competition']."','".$_POST['vision']."') ON DUPLICATE KEY 
    UPDATE problem = '".$_POST['problem']."',solution = '".$_POST['solution']."',product = '".$_POST['product']."',traction = '".$_POST['traction']."',bizmodel = '".$_POST['bizmodel']."',market = '".$_POST['market']."',competition = '".$_POST['competition']."',vision = '".$_POST['vision']."'");   
    echo "<script>
    alert('Profile Updated');
    </script>";
}



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <title>Document</title>
</head>
<style>
    body{
            font-family: "Sofia", sans-serif; 
            background-color: transparent;
        }
    .main{
        padding: 5px;
    }
    label{
        font-size: large;
        font-weight: bold;
    }
    textarea{
        border: 2px solid black;
        width: 98%;
        border-radius: 5px;
        background-color: rgba(255, 255, 255, 0.371);;
    }
    input[type="file"]{
        width: 50%;
        border: 2px solid black;
        border-radius: 5px;
        background-color: transparent;
    }
    input[type="submit"]{
        border: 2px solid black;
        width: 50%;
        height: 40px;
        border-radius: 10px;
        background-color: black;
        color: white;
        font-size: large;
        font-family: "Sofia", sans-serif; 
    }
    .center {
        display: flex;
        justify-content: center;
    }

    video{
        border:10px solid black;
        border-radius: 20px;
    }
</style>
<body>
    <div class="main">
        <div class="pitch">
            <h2><u>Pitch Upload</u></h2>
            <?php if($pitch == null){
                echo "<h3>Pitch not found!!</h3>";
            }else{ ?>
            <div class="p_video center">
            <video width="640" height="400" controls>
                <source src="../../<?php
                
                echo $pitch;
                ?>" type="video/mp4">
            </video>
            
            </div>
            <?php } ?>
            <form action="upload_file.php" method="post" enctype="multipart/form-data" >
               <div class="center">
               <label for="file">Filename:</label><br>
               </div>
                <div class="center">
                <input type="file" name="file" id="file" /> <br>
                </div>
                <br>
                <div  class="center">
                    <input type="submit" name="submit" value="Submit"/>
                </div>
            </form>
        </div>
        <hr>
        <div class="profile">
            <h2>Profile Details</h2>
            <form action="" method="post">
                <div>
                    <label for="">Problem</label><br>
                    <textarea name="problem" id="" cols="30" rows="6"></textarea>
                </div>
                <div>
                    <label for="">Solution</label><br>
                    <textarea name="solution" id="" cols="30" rows="6"></textarea>
                </div>
                <div>
                    <label for="">Product</label><br>
                    <textarea name="product" id="" cols="30" rows="6"></textarea>
                </div>
                <div>
                    <label for="">Traction</label><br>
                    <textarea name="traction" id="" cols="30" rows="6"></textarea>
                </div>
                <div>
                    <label for="">Business Model</label><br>
                    <textarea name="bizmodel" id="" cols="30" rows="6"></textarea>
                </div>
                <div>
                    <label for="">Market</label><br>
                    <textarea name="market" id="" cols="30" rows="6"></textarea>
                </div>
                <div>
                    <label for="">Competetion</label><br>
                    <textarea name="competition" id="" cols="30" rows="6"></textarea>
                </div>
                <div>
                    <label for="">Vision</label><br>
                    <textarea name="vision" id="" cols="30" rows="6"></textarea>
                </div>
                <div class="center">
                    <input type="submit" value="Update Profile" name="update_profile">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
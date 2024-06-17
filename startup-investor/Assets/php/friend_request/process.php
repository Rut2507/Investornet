<?php
  session_start();
  include("../connection/connection.php");


  $receiver=$_GET['send'];
  $sender= $_SESSION["user_id"];
  $query = mysqli_query($con,"SELECT * FROM friendship_request WHERE receiver = '" . $_SESSION["user_id"] . "' AND sender = '" . $_GET['send'] . "' OR receiver = '" . $_GET['send'] . "' AND sender = '" . $_SESSION["user_id"] . "' ");

  if(mysqli_num_rows($query) > 0){
   
    $row = mysqli_fetch_array($query); 
    $inv = mysqli_query($con,"SELECT * FROM investor WHERE unique_id ='".$sender."'");
    if(mysqli_num_rows($inv) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Investor/home/assets/php/search.php";
      
      </script>';
    }
  
    $star = mysqli_query($con,"SELECT * FROM startup WHERE unique_id ='".$sender."'");
    if(mysqli_num_rows($star) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Startup/home/assets/php/search.php";
      
      </script>';
    }
             

  }else{
   
    $query = mysqli_query($con,"SELECT * FROM myfriends WHERE my_id='" . $_SESSION["user_id"] . "' AND my_friends='" . $_GET['send'] . "' OR my_id='" . $_GET['send'] . "' AND my_friends ='" . $_SESSION["user_id"] . "'");
    if(mysqli_num_rows($query) > 0){
    
	    $row = mysqli_fetch_array($query);

      $inv = mysqli_query($con,"SELECT * FROM investor WHERE unique_id ='".$sender."'");
    if(mysqli_num_rows($inv) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Investor/home/assets/php/search.php";
      
      </script>';
    }
  
    $star = mysqli_query($con,"SELECT * FROM startup WHERE unique_id ='".$sender."'");
    if(mysqli_num_rows($star) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Startup/home/assets/php/search.php";
      
      </script>';
    }

    }else{
      
      mysqli_query($con,"INSERT INTO friendship_request (receiver,sender) VALUES('$receiver','$sender') ");

      $inv = mysqli_query($con,"SELECT * FROM investor WHERE unique_id ='".$sender."'");
    if(mysqli_num_rows($inv) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Investor/home/assets/php/search.php";
      
      </script>';
    }
  
    $star = mysqli_query($con,"SELECT * FROM startup WHERE unique_id ='".$sender."'");
    if(mysqli_num_rows($star) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Startup/home/assets/php/search.php";
      
      </script>';
    } 
			 
    }
  }		
 
             ?>


   
    
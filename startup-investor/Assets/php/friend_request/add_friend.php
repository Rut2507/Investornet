<?php
  
    session_start();
    include("../connection/connection.php");
			
	$myfriend=$_GET['accept'];
    $me= $_SESSION["user_id"];
	$mfriends=mysqli_query($con,"INSERT INTO myfriends(my_id,my_friends) VALUES('$me','$myfriend') ");
    $query = mysqli_query($con,"delete from friendship_request WHERE receiver = '" . $_SESSION["user_id"] . "' AND sender = '" . $_GET['accept'] . "' OR receiver = '" . $_GET['accept'] . "' AND sender = '" . $_SESSION["user_id"] . "' ");

	$inv = mysqli_query($con,"SELECT * FROM investor WHERE unique_id ='".$me."'");
    if(mysqli_num_rows($inv) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Investor/home/investor_home.php";
      
      </script>';
    }
  
    $star = mysqli_query($con,"SELECT * FROM startup WHERE unique_id ='".$me."'");
    if(mysqli_num_rows($star) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Startup/home/startup_home.php";
      
      </script>';
    }
	
	
?>
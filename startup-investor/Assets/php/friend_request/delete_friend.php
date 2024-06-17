<?php
  session_start();
  include("../connection/connection.php");

  $myfriend=$_GET['delete'];
  $me= $_SESSION["user_id"];
  $query = mysqli_query($con,"delete from myfriends WHERE my_id = '" . $_SESSION["user_id"] . "' AND my_friends = '" . $_GET['delete'] . "' OR my_id = '" . $_GET['delete'] . "' AND my_friends = '" . $_SESSION["user_id"] . "' ");
  
	
	$inv = mysqli_query($con,"SELECT * FROM investor WHERE unique_id ='".$me."'");
    if(mysqli_num_rows($inv) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Investor/home/assets/php/connections.php";
      
      </script>';
    }
  
    $star = mysqli_query($con,"SELECT * FROM startup WHERE unique_id ='".$me."'");
    if(mysqli_num_rows($star) > 0){
      echo '<script type="text/javascript">
      
      window.location = "../../../Startup/home/assets/php/connections.php";
      
      </script>';
    }
?>
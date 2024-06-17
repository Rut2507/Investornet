<?php
session_start();
include("../../../../Assets/php/connection/connection.php");

$id = $_POST['v_id'];
if(isset($_POST['s_reject'])){
  mysqli_query($con,"UPDATE startup SET status = 0 where unique_id = $id");
  header("Location: startups_profile.php");
}
if(isset($_POST['s_approve'])){
mysqli_query($con,"UPDATE startup SET status = 1 WHERE unique_id = $id ");
header("Location: startups_profile.php");
}
if(isset($_POST['s_block'])){
  mysqli_query($con,"UPDATE startup SET status = 3 WHERE unique_id = $id ");
  header("Location: startups_profile.php");
}
if(isset($_POST['s_unblock'])){
  mysqli_query($con,"UPDATE startup SET status = 1 WHERE unique_id = $id ");
  header("Location: startups_profile.php");
}


$id = $_POST['v_id'];
if(isset($_POST['i_reject'])){
  mysqli_query($con,"UPDATE investor SET status = 0 where unique_id = $id");
  header("Location: investor_profile.php");
}
if(isset($_POST['i_approve'])){
mysqli_query($con,"UPDATE investor SET status = 1 WHERE unique_id = $id ");
header("Location: investor_profile.php");
}
if(isset($_POST['back'])){
  header("Location: investor_profile.php");
}
if(isset($_POST['i_block'])){
  mysqli_query($con,"UPDATE investor SET status = 3 WHERE unique_id = $id ");
  header("Location: investor_profile.php");
}
if(isset($_POST['i_unblock'])){
  mysqli_query($con,"UPDATE investor SET status = 1 WHERE unique_id = $id ");
  header("Location: investor_profile.php");
}
?>
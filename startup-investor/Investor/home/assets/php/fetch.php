<?php
session_start();
include("../../../../Assets/php/connection/connection.php");
$id = $_SESSION['user_id'];
$member_id=$_SESSION["user_id"];
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM startup 
  WHERE startup_name LIKE '%".$search."%' AND status='1' AND unique_id!='$member_id'
 ";
}else{
    $query="SELECT * FROM startup WHERE unique_id!='$member_id' AND status='1'";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_array($result))
 {
  $memberid = $row["unique_id"];
  $post = mysqli_query($con,"SELECT * FROM myfriends WHERE my_id = '$member_id' AND my_friends='$memberid' OR my_friends = '$member_id' AND my_id='$memberid' ");
  $num_rows  =mysqli_num_rows($post);
  if ($num_rows == 0 ){
        echo '
            <div class="startup-profile">
            <div class="front-cover">
                <img src="../../../../Assets/images/profile_pic.png" alt="">
                <h1>'.$row['startup_name'].'</h1>
                <h2>'.$row['sector'].'</h2>
                <h2>'.$row['stage'].'</h2>
                <h3>'.$row['city_opp'].'</h3>
                <a href="startup_profile.php?send='.$row['unique_id'].'" class="retweet_link"><div id="button_style1">Show Profile</div></a><br>	
                <a href="../../../../Assets/php/friend_request/process.php?send='.$row['unique_id'].'" class="retweet_link"><div id="button_style1" onclick="alert(\'Friend Request Sent\')">Add Friend</div></a><br>	
            </div>
            </div>
        ';
            
  }         
 }
}
else
{
 echo 'Data Not Found';
}

?>

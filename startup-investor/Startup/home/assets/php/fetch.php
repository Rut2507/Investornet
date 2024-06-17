<?php
session_start();
include("../../../../Assets/php/connection/connection.php");
$member_id=$_SESSION["user_id"];
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM investor 
  WHERE name LIKE '%".$search."%' AND status = '1' AND unique_id!='$member_id'
 ";
}else{
    $query="SELECT * FROM investor WHERE unique_id!='$member_id' AND status='1'";
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
        echo '<div class="card-container">
        <img class="round" src="../../../../Assets/images/profile_pic.png" alt="user" width="100px" height="100px">
        <h3>'.$row['name'].'</h3>
        <p>'.$row['describes'].'</p>
        <a href="investor_profile.php?send='.$row['unique_id'].'" class="retweet_link"><div id="button_style1">Show Profile</div></a><br>
        <a href="../../../../Assets/php/friend_request/process.php?send='.$row['unique_id'].'" class="retweet_link" onclick="alert(\'Request Sent\')"><div id="button_style1">Add Friend</div></a><br>	
        </div>';
            
  }         
 }
}
else
{
 echo 'Data Not Found';
}

?>

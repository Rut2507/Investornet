<?php
session_start();
include("../../../../Assets/php/connection/connection.php");
$id = $_SESSION['user_id'];
$member_id=$_SESSION["user_id"];
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="../../assets/css/startup_style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<style>
    body{
            font-family: "Sofia", sans-serif; 
        }
</style>
<?php 
    $post = mysqli_query($con,"SELECT * FROM myfriends WHERE my_id = '$member_id' OR my_friends = '$member_id' ");
    $num_rows  =mysqli_num_rows($post);
    if ($num_rows != 0 ){
        while($row = mysqli_fetch_array($post)){
            $myfriend = $row['my_id'];
            if($myfriend == $member_id){   
                $myfriend1 = $row['my_friends'];
                $friends = mysqli_query($con,"SELECT * FROM investor WHERE unique_id = '$myfriend1'");
                $friendsa = mysqli_fetch_array($friends);
                
                echo"<div class='myfriend_div'>";
                echo '
                <div class="con-card friend_info" data-title="'.$friendsa['name'].'">
                <p class="con-p">
                  <div class="myfriend"><a href="investor_profile.php?send='.$friendsa['unique_id'].'">Show Profile</a> </div>
                  <div class="myfriend"><a href="../../../../Assets/php/friend_request/delete_friend.php?delete=' .$friendsa['unique_id'].' " onclick="alert(\'Removed Connection\')">Unfriend</a> </div>
                </p>
              </div>';
              echo'</div>';                       
            }else{
                $friends = mysqli_query($con,"SELECT * FROM investor WHERE unique_id = '$myfriend'");
                $friendsa = mysqli_fetch_array($friends);
                                    
                echo"<div class='myfriend_div1' >";
                echo '
                <div class="con-card friend_info" data-title="'.$friendsa['name'].'">
                <p class="con-p">
                  <div class="myfriend"><a href="investor_profile.php?send='.$friendsa['unique_id'].'">Show Profile</a> </div>
                  <div class="myfriend"><a href="../../../../Assets/php/friend_request/delete_friend.php?delete=' .$friendsa['unique_id'].' " onclick="alert(\'Removed Connection\')">Unfriend</a> </div>
                </p>
              </div>';echo'</div>';
            }                          
        }
    }else{
        echo"<div id='myfriend_div'>";
        echo '<center><h1>You don\'t have friends<h1><center>';
        echo'</div>';	
    }               
?>
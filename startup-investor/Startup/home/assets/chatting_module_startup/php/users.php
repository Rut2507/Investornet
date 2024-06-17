<?php
    session_start();
    include_once "config.php";
    $outgoing_id = $_SESSION['unique_id'];
    $post = mysqli_query($con,"SELECT * FROM myfriends WHERE my_id = '$outgoing_id' OR my_friends = '$outgoing_id' ");
    $num_rows  =mysqli_num_rows($post);
    $x = "' '";
    if ($num_rows != 0 ){
        while($row = mysqli_fetch_array($post)){
            $myfriend = $row['my_id'];
            if($myfriend == $outgoing_id){   
                $myfriend1 = $row['my_friends'];
                $x .= ",'". $myfriend1 . "'";                  
            }else{
                $x .= ",'". $myfriend . "'";   
            }                          
        }
    }  
    $sql = "SELECT * FROM investor WHERE NOT unique_id = {$outgoing_id} AND unique_id IN ($x)";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>
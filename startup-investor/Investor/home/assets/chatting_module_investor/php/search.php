<?php
    session_start();
    include_once "config.php";

    $outgoing_id = $_SESSION['unique_id'];

    $sql = "SELECT * FROM startup WHERE NOT unique_id = {$outgoing_id} ";
    $output = "";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>
<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "startup_investor";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
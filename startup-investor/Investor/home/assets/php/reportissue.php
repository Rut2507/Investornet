<?php 
session_start();
include("../../../../Assets/php/connection/connection.php");

$id = $_SESSION['user_id'];
$query =mysqli_query($con,"SELECT * FROM investor WHERE unique_id ='".$id."'");
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    
        $dbusername=$row['name'];
        $u_email = $row['email'];
        $profilr_pic = $row['profile_pic_url'];

    }
    }   

if(isset($_POST['report'])){
    $ran_id = rand(time(), 1000000);
    mysqli_query($con,"INSERT INTO report (report_id,unique_id,name,email,subject,description,action) values('".$ran_id."','".$id."','".$dbusername."','".$u_email."','".$_POST['subject']."','".$_POST['discription']."',0)");
}

?>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

<style>

body{
            font-family: "Sofia", sans-serif; 
            background-color: transparent;

}

div > form > input[type="text"]{
    width: 90%;
    height: 30px;
    border: 2px solid black;
    border-radius: 5px;
    font-size: medium;
    background-color: transparent;
}

div > form > textarea{
    width: 90%;
    border: 2px solid black;
    border-radius: 5px;
    font-size: medium;
    background-color: transparent;
}

div > form > input[type="submit"]{
    width: 30%;
    height: 30px;
    border: 2px solid black;
    border-radius: 5px;
    font-size: medium;
    transform: translateX(400px);
    background-color: black;
	color: white;
}
table,th,td{
	border: 2px solid black;
	text-align: center;
	border-radius: 5px;
	font-weight: bold;
    background-color: rgba(255, 255, 255, 0.371);
}

td,th{
    word-wrap: break-word;
    max-width: 200px;
}

table{
	margin: 10px;
	width: 1150px;
}

.view{
    width: 90%;
    height: 90%;
    border: 1px solid black;
    transform: translateY(8px);
    background-color: black;
    color: white;
}

</style>


<div>
    <form action="" method="post">
        <h2>Subject</h2>
        <input type="text" name="subject" id="" required>
        <br>
        <h3>Discription</h3>
        <textarea name="discription" id="" cols="30" rows="10" required></textarea>
        <br><br>
        <input type="submit" value="Submit" name="report" onclick="alert(\'Query Sent to Admin!!\')">
    </form>
</div>
<hr>
<h2>Report History</h2>
<div>
    <table>
        <tr>
            <td>Sl No.</td>
            <td>Query Id</td>
            <td>Subject</td>
            <td>Status</td>
            <td>View</td>
        </tr>
        <?php
            $reports = mysqli_query($con,"SELECT * FROM report where unique_id = $id");
            $x =1;
            while($fetch = mysqli_fetch_array($reports)){
                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>'.$fetch['report_id'].'</td>
                    <td>'.$fetch['subject'].'</td>
                    <td>';
                    
                    if($fetch['action']==0){
                        echo "Submitted";
                    }elseif($fetch['action'] ==1){
                        echo "Responded";
                    }
                    
                    echo '</td>
                    <td><form action="report_reply.php" method="post">
                    <input type="text" value="'.$fetch['report_id'].'" name="report_id" hidden>
                    <input type="text" value="'.$fetch['unique_id'].'" name="user_id" hidden>
                    <input type="submit" value="View" class="view">
                    </form></td>
                </tr>
                ';
                $x++;
            }
        
        ?>
    </table>
</div>
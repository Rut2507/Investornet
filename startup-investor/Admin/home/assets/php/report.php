<?php
session_start();
include("../../../../Assets/php/connection/connection.php");
?>


<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

<style>

body{
            font-family: "Sofia", sans-serif; 
            background-color: transparent;

}
    table,th,td{
	border: 2px solid black;
	text-align: center;
	border-radius: 5px;
	font-weight: bold;
}
table{
	background-color: #0084ffb9;
}
th{
	background-color: #003c7c9d;
	color: #fff;
}
tr{
	background-color: #f1f1f1;
	
}
table{
	margin: 10px;
    width: 1150px;
	max-width: 1150px;
}

.view{
    width: 90%;
    height: 90%;
    border: 1px solid black;
    transform: translateY(8px);
}
</style>
<h2>Report History</h2>
<div>
    <table>
        <tr>
            <td>S.No</td>
            <td>Query Id</td>
            <td>Name</td>
            <td>Number</td>
            <td>Email</td>
            <td>Status</td>
            <td>Action</td>
        </tr>
        <?php
            $reports = mysqli_query($con,"SELECT * FROM report");
            $x =1;
            while($fetch = mysqli_fetch_array($reports)){
                echo '
                <tr>
                    <td>'.$x.'</td>
                    <td>'.$fetch['report_id'].'</td>';

                    $s_rep = mysqli_query($con,"SELECT * FROM startup where unique_id ='".$fetch['unique_id']."'");
                    $i_rep = mysqli_query($con,"SELECT * FROM investor where unique_id = '".$fetch['unique_id']."'");
                    if(mysqli_num_rows($s_rep)>0){
                        while($res = mysqli_fetch_array($s_rep)){
                            $name = $res['startup_name'];
                            $number = $res['number'];
                            $email = $res['email'];
                            $type = "startup";
                        }
                    }else{
                        while($res = mysqli_fetch_array($i_rep)){
                            $name = $res['name'];
                            $number = $res['number'];
                            $email = $res['email'];
                            $type = "investor";

                        }
                    }
                    
                    echo '<td>'.$name.'</td>
                    <td>'.$number.'</td>
                    <td>'.$email.'</td>
                    <td>';
                    if($fetch['action'] ==0){
                        echo "Pending";
                    }elseif($fetch['action'] == 1){
                        echo "Replied";
                    }
                    echo '</td>
                    <td><form action="viewreport.php" method="post">
                    <input type="text" value="'.$fetch['unique_id'].'" name="user_id" hidden>
                    <input type="text" value="'.$fetch['report_id'].'" name="report_id" hidden>
                    <input type="text" value="'.$type.'" name="user_type" hidden>
                    <input type="submit" value="View" class="view">
                    </form></td>
                </tr>
                ';
                $x++;
            }
        
        ?>
    </table>
</div>
<?php
    session_start();
    include("../../Assets/php/connection/connection.php");
     $id = $_SESSION['admin_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="assets/css/admin_dashboard_css.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="assets/js/admin_dashboard.js"></script>
    <title>DASHBOARD</title>
    <style>
        .dashboard{
            display:block;
        }
        .SupportChat,.Startups,.Investors,.Account,.Issues{
            display : none;
        }

    </style>
    <style>
        body {
      background-image: url('../../Assets/logo/background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: cover;
    }
    </style>
</head>
<body>
    <div class="grid-container">
        <div class="item1">
            <div class="logo">
                <img src="../../Assets/images/logo.png" alt="" height="75px" width="75px">
            </div>
            <div class="log">
                <b>ADMIN</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="../../Assets/php/logout.php">Logout</a>
            </div>
        </div>
        <div class="item2">
            <div class="sidenav">
                <div class="">
                    <a href="#dashboard" onclick="showDashboard()">Dashboard</a>
                </div>
                <div class="">
                    <a href="#Startups" onclick="showStartups()">Startups</a>
                </div>
                <div class="">
                    <a href="#Investors" onclick="showInvestors()">Investors</a>
                </div>
                <div class="">
                    <a href="#Issues" onclick="showIssues()">Issues</a>
                </div>
                <div class="">
                    <a href="#Account" onclick="showAccount()">Account</a>
                </div>
            </div>
        </div>
        <div class="item3">
            <div class="dashboard" id="dashboard">
                <div class="div-dashboard">
                    <div class="box1">
                        <div id="total-User">
                            Total Users
                            <hr>
                            <?php
                                $sql1 = mysqli_query($con,"SELECT * FROM investor");
                                $a = mysqli_num_rows($sql1);
                                $sql2 = mysqli_query($con,"SELECT * FROM startup");
                                $b = mysqli_num_rows($sql2);

                                $total = $a + $b;
                                echo $total;
                                
                            ?>
                        </div>
                        <div id="total-User">
                            Total Startups
                            <hr>
                            <?php  echo $b;?>
                        </div>
                        <div id="total-User">
                            Total Investors
                            <hr>
                            <?php echo $a; ?>
                        </div>                       
                    </div>
                    <div class="break"></div>
                    <div class="box2" id="chartContainer">
                    <?php

                        $startup_unverified = mysqli_query($con,"SELECT * FROM startup WHERE status='0'");
                        $ST_UNV_USER = mysqli_num_rows($startup_unverified);
                        $startup_verified = mysqli_query($con,"SELECT * FROM startup WHERE status='1'");
                        $ST_V_USER = mysqli_num_rows($startup_verified);
                        $startup_blocked = mysqli_query($con,"SELECT * FROM startup WHERE status='3'");
                        $ST_V_BLOCKED = mysqli_num_rows($startup_blocked);
 
                        $dataPoints1 = array( 
                            array("label"=>"Verified Users", "y"=>$ST_V_USER),
                            array("label"=>"Unverified Users", "y"=>$ST_UNV_USER),
                            array("label"=>"Blocked Users", "y"=>$ST_V_BLOCKED)
                        )
                        
                    ?>
                    </div>
                    <div class="box2" id="chartContainer1">
                    <?php

                        $investor_unverified = mysqli_query($con,"SELECT * FROM investor WHERE status='0'");
                        $I_UNV_USER = mysqli_num_rows($investor_unverified);
                        $investor_verified = mysqli_query($con,"SELECT * FROM investor WHERE status='1'");
                        $I_V_USER = mysqli_num_rows($investor_verified);
                        $investor_blocked = mysqli_query($con,"SELECT * FROM investor WHERE status='3'");
                        $I_V_BLOCKED = mysqli_num_rows($investor_blocked);
 
                        $dataPoints2 = array( 
                            array("label"=>"Verified Users", "y"=>$I_V_USER),
                            array("label"=>"Unverified Users", "y"=>$I_UNV_USER),
                            array("label"=>"Blocked Users", "y"=>$I_V_BLOCKED)
                        )
                        
                    ?>
                    </div>
                </div>
            </div>
            <div class="Startups" id="Startups">
                <iframe src="assets/php/startups_profile.php" frameborder="0" height="600px" width="1300px" allowtransparency="true"></iframe>
            </div>
            <div class="Investors" id="Investors">
                <iframe src="assets/php/investor_profile.php" frameborder="0" height="600px" width="1300px" allowtransparency="true"></iframe>
            </div>
            <div class="Issues" id="Issues">
                <iframe src="assets/php/report.php" frameborder="0" height="600px" width="1300px" allowtransparency="true"></iframe>
            </div>
            <div class="Account" id="Account">
            <div class="acc-pass-form">
                    <h2>Change Password</h2>
                    <form action="" method="post">
                        <div>
                            <label for="u_old_pass">Old Password</label><br>
                            <input type="password" name="old_pass" id="u_name" value="">
                        </div>
                        <div class="break"></div>
                        <div>
                            <label for="u_new_pass">New Password</label><br>
                            <input type="password" name="pass1" id="u_email" value="">
                        </div>
                        <div>
                            <label for="u_new_pass2">Confirm Passowrd</label><br>
                            <input type="password" name="pass2" id="u_email" value="">
                        </div>
                        <div>
                            <button type="submit" name="acc_pass">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>  
      </div>
      
</body>
</html>
<?php
$query =mysqli_query($con,"SELECT * FROM admin WHERE a_user_id ='".$id."'");
while($row=mysqli_fetch_assoc($query))  
{  

    $dbpass = $row['passcode'];  
}  

if(isset($_POST['acc_pass'])){
    $old_pass = $_POST['old_pass'];
    if($old_pass == $dbpass){
        if($_POST['pass1']==$_POST['pass2']){
            $pass_final=$_POST['pass1'];
            mysqli_query($con,"UPDATE admin SET passcode = '".$pass_final."' WHERE a_user_id ='".$id."' ");
            header("Location:../../investor_home.php");
        }else{
            echo "Password not matching";
        }
    }else{
        echo "Old Password Incorrect";
    }
}
?>


<script>
    window.onload = function() {
    
    
    var chart1 = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Startups"
        },
        data: [{
            type: "pie",
            yValueFormatString: "#,##0",
            indexLabel: "{label} ({y})",
            dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart1.render();    
    
    var chart2 = new CanvasJS.Chart("chartContainer1", {
        animationEnabled: true,
        title: {
            text: "Investors"
        },
        data: [{
            type: "doughnut",
            yValueFormatString: "#,##0",
            indexLabel: "{label} ({y})",
            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
        }]
    });
    chart2.render();
    
    }
</script>

<style>
    .acc-pass-form > form > div >button:hover{
    box-shadow: rgba(0, 0, 0, 0.3) 0px 19px 38px, rgba(0, 0, 0, 0.22) 0px 15px 12px;
    cursor: pointer;
}

.acc-pass-form > form{
    display: flex;
    align-content: center;
    flex-wrap: wrap;
}
.break {
    flex-basis: 100%;
    height: 0;
}  

.acc-pass-form > form > div{
    margin: 10px 10px 5px 10px;
    padding: 10px;
    width: max-content;
}

.acc-pass-form > form > div > label{
    font-size: larger;
    font-weight: bold;
}

.acc-pass-form > form > div > input{
    width: 300px;
    padding: 10px;
    border: 0px;
    border-bottom: 2px solid black;
    font-size: large;
} 
.acc-pass-form > form > div > input:focus{
    outline: none;
}
.acc-pass-form > form > div >button{
    background-color: #000000;
    color: #fff;
    padding: 10px;
    font-size: large;
    border-radius: 5px;
    margin: 10px;
    
}
</style>
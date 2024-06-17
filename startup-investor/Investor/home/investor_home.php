<?php
    session_start();
    include("../../Assets/php/connection/connection.php");
    //include("../../Assets/php/function/function.php");
    $id = $_SESSION['user_id'];
    $member_id=$_SESSION["user_id"];
    $_SESSION['unique_id'] = $member_id;

    $query =mysqli_query($con,"SELECT * FROM investor WHERE unique_id ='".$id."'");
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    
        $dbusername=$row['name'];
        $dbpass = $row['password'];  
        $u_email = $row['email'];
        $u_number = $row['number'];
        $u_pan = $row['pan'];
        $u_describes = $row['describes'];
        $u_budget = $row['budget'];
        $profilr_pic = $row['profile_pic_url'];

    }
    }   
    if(isset($_POST['report'])){
        mysqli_query($con,"INSERT INTO report (id,name,email,subject,description,action) values('".$id."','".$dbusername."','".$u_email."','".$_POST['subject']."','".$_POST['discription']."',0)");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <link rel="stylesheet" href="assets/css/investor_style.css">
    <title>HOME</title>
    <style>
       .home{
            display:block;
        }
        .message,.search,.investment,.account,.connection,.reportissue{
            display : none;
        }
        body {
            background-image: url('../../Assets/logo/background.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;  
            background-size: cover;
        }
    </style>
    <script>
		$(document).ready(function(){
			$(".notification_icon .bell").click(function(){
				$(".dropdown").toggleClass("active");
			})
		});
	</script>
</head>
<body>
    <div class="grid-container">
       
        <div class="item1">
            <div class="logo">
            <br>
                <img src="../../Assets/logo/logo.png" alt="" height="75px" width="75px">
            </div>
            <div class="log">
                
                <div class="note" id="note"> 
                    <div class="notification_wrap">
                        <div class="notification_icon">
                                <?php				  
                                    //Section for showing friendship request
                                    $que = mysqli_query($con,"SELECT * FROM friendship_request WHERE receiver = '$member_id'");
                                    if(mysqli_num_rows($que)!=0)
                                    {
                                        echo '<img src="../../Assets/images/notification.png" alt="" class="bell" width="25px" height="25px">'; 
                                    }else{
                                        
                                        echo '<img src="../../Assets/images/bell.svg" alt="" class="bell">';
                                    }
                                ?>
                        </div>
                        <div class="dropdown">
                            <div class="notify_item">
                                <div class="notify_info">
                                <?php				  
                                    //Section for showing friendship request
                                    $que = mysqli_query($con,"SELECT * FROM friendship_request WHERE receiver = '$member_id'");
                                    if(mysqli_num_rows($que)>0)
                                    {
                                        while($row = mysqli_fetch_array($que)) 
                                        { 
                                            $_query = mysqli_query($con,"SELECT * FROM startup WHERE unique_id = '" . $row["sender"] . "'");
                                            while($_row = mysqli_fetch_array($_query)) 
                                            {
                                                echo '
                                            
                                                    <div class="myfriend_div1">     
                                                        <div style="position:relative; margin:2px 0px 0px 13px;"><span style="font-size:20px; font-weight:bold; color:blue;">'.$_row['name'].'</span><span style="font-size:20px; font-weight:bold; color:black;"> want to be friends with you</span></div>
                                                        <br>
                                                        <div class="myfriend width-100"><a href="../../Assets/php/friend_request/add_friend.php?accept=' .$row['sender'].' ">Accept</a></div><br>
                                                        <div class="myfriend width-100"><a href="../../Assets/php/friend_request/delete_friend_request.php?accept=' .$row['sender'].'">Reject</a></div>
                                                        <hr>
                                                    </div>';
                                            }  
                                        }  
                                    }else{  
                                    	echo"<div class='myfriend_div1'>
                                    	    You do not have any friend pending
                                    	</div>";
                                    }
                                ?>
                                </div>
                           </div>
                       </div>
                    </div>
                </div>
                <b>Welcome <?php echo $dbusername;?></b>
                <a href="../../Assets\php\logout.php">Logout</a>
            </div>
        </div>
        <div class="item2">
            <div class="sidenav">
                
                <div class="">
                    <a href="#home" onclick="showHome()"><img src="../../Assets/images/home.svg" alt="">&nbsp;Home</a>
                </div>
                <hr>
                <div class="">
                    <a href="#search" onclick="showInvestment()"><img src="../../Assets/images/investment.svg" alt="">&nbsp;Investment</a>
                </div>
                <hr>
                <div class="">
                    <a href="#search" onclick="showSearch()"><img src="../../Assets/images/search.svg" alt="">&nbsp;Search</a>
                </div>
                <hr>
                <div class="">
                    <a href="#connection" onclick="showConnection()"><img src="../../Assets/images/connection.svg" alt="">&nbsp;Connections</a>
                </div>
                <hr>
                <div class="">
                    <a href="#message" onclick="showMessage()"><img src="../../Assets/images/message.svg" alt="">&nbsp;Message</a>
                </div>
                <hr>
                <div class="">
                    <a href="#reportissue" onclick="showreportissue()"><img src="../../Assets/images/warning.svg" alt="">&nbsp;Query</a>
                </div>
                <hr>
                <div class="">
                    <a href="#account" onclick="showAccount()"><img src="../../Assets/images/account.svg" alt="">&nbsp;Account</a>
                </div>
                
            </div>
        </div>
        <div class="item3">
            <div class="home" id="home">
                <div class="dashboard">
                    <div class="div-box-dashboard">
                        <div class="box1">
                            <b>No of Connections</b>
                            <hr>
                            <?php
                            $post = mysqli_query($con,"SELECT * FROM myfriends WHERE my_id = '$id' OR my_friends = '$id' ");
                            echo mysqli_num_rows($post);
                            ?>
                        </div>
                        <div class="box2">
                            <b>No of Investments</b>
                            <hr>
                            
                            <?php
                            $inv_count = mysqli_query($con,"SELECT * FROM investment WHERE investor = '$id' and status=1 ");
                            echo mysqli_num_rows($inv_count);
                            ?>
                        </div>
                        <div class="box1">
                            <b>Total Investment</b>
                            <hr>
                            <?php
                            
                            $invested_amount = 0;
                            while($inv_amt = mysqli_fetch_array($inv_count)){
                                $invested_amount = $invested_amount + $inv_amt['amount'];
                            }
                            echo "&#8377 $invested_amount";
                            ?>
                        </div>

                        <div class="break"></div>   
                        <div id="chartContainer" style="height: 370px; width:500px;"></div>
                        <?php
                        $dataPoints = array();
                        $x = 0;
                            $investment_graph = mysqli_query($con,"SELECT * FROM investment WHERE investor ='".$id."' AND status = 1");
                            while($fetch = mysqli_fetch_array($investment_graph)){
                                $inv_name = mysqli_query($con,"SELECT * FROM startup WHERE unique_id='".$fetch['startup']."'");
                                while($f_name = mysqli_fetch_array($inv_name)){$i_name = $f_name['startup_name'];}
                                $eq = (int)$fetch['equity_percent'];
                                $x = $x + $fetch['equity_percent'];
                                $date = $fetch['date'];
                                $a = array("label"=>"$date", "symbol" => "$i_name","y"=>$eq);
                                array_push($dataPoints,$a);
                            }  
                        ?>
                        <script>
                            window.onload = function() {
                            
                            var chart = new CanvasJS.Chart("chartContainer", {
                                theme: "light2",
                                animationEnabled: true,
                                title: {
                                    text: "My Investments"
                                },
                                data: [{
                                    type: "doughnut",
                                    indexLabel: "{symbol} - {y}",
                                    yValueFormatString: "#,##0.0\"%\"",
                                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                                }]
                            });
                            chart.render();
                            }
                        </script>   

                    </div>
                </div>
            </div>
            <div class="investment" id="investment">
                <h2>Investment History</h2>
                    <div class="box">
                        <table>
                            <tr>
                                <th>Startup Name</th>
                                <th>Investment Date</th>
                                <th>Amount Invested</th>
                                <th>Equity Percentage</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                                                    
                            <?php
                             
                                $investment = mysqli_query($con,"SELECT * FROM investment WHERE investor ='".$id."'");
                                while($fetch = mysqli_fetch_array($investment)){
                                    $inv_name = mysqli_query($con,"SELECT * FROM startup WHERE unique_id='".$fetch['startup']."'");
                                    while($f_name = mysqli_fetch_array($inv_name)){$i_name = $f_name['startup_name'];}
                                    echo '
                                    <tr>
                                        <td>'.$i_name.'</td>
                                        <td>'.$fetch['date'].'</td>
                                        <td>'.$fetch['amount'].'</td>
                                        <td>'.$fetch['equity_percent'].'%</td>
                                        <td>';
                                        if($fetch['status']==0){
                                            echo "Pending";
                                            
                                        }elseif($fetch['status']==1){
                                            echo "Comfirmed";
                                           
                                        }elseif($fetch['status']==2){
                                            echo "Cancelled";
                                            
                                        }
                                        echo '</td>
                                        <td><form method="post">
                                        <input type="text" name="inv_id" value="'.$fetch['id'].'" hidden>
                                        <input type="submit" value="Confirm" name="inv_confirm" class="inv_b" onclick="alert(\'Investment Confirmed\')">
                                        <input type="submit" value="Cancel" name="inv_reject" class="inv_b" onclick="alert(\'Investment Cancelled\')">
                                    </form></td>
                                    </tr>
                                    ';
                                }
                            
                            ?>
                        </table>
                    </div>
            </div>
            <div class="search" id="search">
                <iframe src="assets/php/search.php" frameborder="0" height="550px" width="1250px"></iframe allowtransparency="true">
            </div>
            <div class="connection" id="connection">
                <iframe src="assets/php/connections.php" frameborder="0" height="550px" width="1250px" allowtransparency="true"></iframe>
            </div>
            <div class="message" id="message">
                <iframe src="assets/chatting_module_investor/users.php" frameborder="0" height="550px" width="1250px" allowtransparency="true"></iframe>
            </div>
            <div class="reportissue" id="reportissue">
                <iframe src="assets/php/reportissue.php" frameborder="0" height="550px" width="1250px" allowtransparency="true"></iframe>
            </div>
            <div class="account" id="account">
                <h2>Account Settings</h2>
                    <div class="acc-setting-form">
                        <form action="assets/php/accountsetting.php" method="post" enctype="multipart/form-data">
                            <div id="profile-container">
                                <image id="profileImage" src="<?php if(!empty($profilr_pic)){echo $profilr_pic;}else{echo "../../Assets/images/profile_pic.png";}?>"/>
                            </div>
                            <div>
                                <label for="">Change Profile Picture</label>
                                <input type="file" name="profile_pic" id="">
                            </div>
                            <div>
                                <button type="submit" name="pic_update">Upload</button>
                            </div>
                        
                        </form>
                    </div>
                    
                
                <div class="acc-setting-form">
                    <form action="assets/php/accountsetting.php" method="post">
                        <div>
                            <label for="u_name">Name</label><br>
                            <input type="text" name="updated_name" id="u_name" value="<?php echo $dbusername;?>">
                        </div>
                        <div>
                            <label for="u_email">Email</label><br>
                            <input type="email" name="updated_email" id="u_email" value="<?php echo $u_email;?>">
                        </div>
                        <div>
                            <label for="u_number">Number</label><br>
                            <input type="tel" name="updated_number" id="u_number" value="<?php echo $u_number;?>">
                        </div>
                        <div>
                            <label for="pan">PAN Card No</label><br>
                            <input type="text" name="pan" id="pan" value="<?php echo $u_pan;?>" disabled>
                        </div>
                        <div>
                            <label for="describes">Describe</label><br>
                            <input type="text" name="describes" id="describes" value="<?php echo $u_describes;?>" disabled>
                        </div>
                        <div>
                            <label for="u_budget">Budget</label><br>
                            <input type="text" name="updated_budget" id="u_budget" value="<?php echo $u_budget;?>" >
                        </div>
                        <div>
                            <button type="submit" name="acc_update">Update</button>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="acc-pass-form">
                    <h2>Change Password</h2>
                    <form action="assets/php/accountsetting.php" method="post">
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
            <script src="assets/js/navigation.js"></script>
            <script src="assets/js/users.js"></script>
        </div>  
        
    </div>
      
</body>
</html>


<?php

if(isset($_POST['inv_confirm'])){
    mysqli_query($con,"UPDATE investment set status = 1 WHERE id ='".$_POST['inv_id']."'");
}
if(isset($_POST['inv_reject'])){
    mysqli_query($con,"UPDATE investment set status = 2 WHERE id ='".$_POST['inv_id']."'");
}
?>
 
<?php
    session_start();
    include("../../Assets/php/connection/connection.php");
    $id = $_SESSION['user_id'];
    $member_id=$_SESSION["user_id"];
    $_SESSION['unique_id'] = $member_id;

    $query =mysqli_query($con,"SELECT * FROM startup WHERE unique_id ='".$id."'");
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    
        $dbusername=$row['name'];
        $dbpass = $row['password'] ;  
        $u_email = $row['email'];
        $u_number = $row['number'];
        $u_startup_name = $row['startup_name'];
        $u_website_url = $row['website_url'];
        $u_sector = $row['sector'];
        $u_stage = $row['stage']; 
        $u_city = $row['city_opp'];
        $profile_pic = $row['profile_pic_url'];

    }
    }
    
    if(isset($_POST['investment_submit'])){
        mysqli_query($con,"Insert into investment (investor,startup,date,amount,equity_percent,status) values('".$_POST['investor_id']."','".$id."','".$_POST['investment_date']."','".$_POST['amount']."','".$_POST['equity']."',0)");
        echo "<script>
        alert('Investment Recorded');
        </script>";
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
    <link rel="stylesheet" href="assets/css/startup_style.css">
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <link rel="stylesheet" href="../../Assets/css/chat_style.css">
    <title>HOME</title>
    <style>
        .home{
            display:block;
        }
        .reportissue,.Investment,.search,.message,.account,.connection,.Profile{
            display : none;
        }
        .break {
  flex-basis: 100%;
  height: 0;
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
    <script>  
if ( window.history.replaceState ) { 
        window.history.replaceState( null, null, window.location.href ); 
    } 
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
                                            $_query = mysqli_query($con,"SELECT * FROM investor WHERE unique_id = '" . $row["sender"] . "'");
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
                <a href="../../Assets/php/logout.php">Logout</a>
            </div>
        </div>
        <div class="item2">
            <div class="sidenav">
                <div class="">
                    <a href="#home" onclick="showHome()"><img src="../../Assets/images/home.svg" alt="">&nbsp;Home</a>
                </div>
                <hr>
                <div class="">
                    <a href="#investment" onclick="showInvestment()"><img src="../../Assets/images/investment.svg" alt="">&nbsp;Investment</a>
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
                    <a href="#Profile" onclick="showProfile()"><img src="../../Assets/images/profile-svgrepo-com.svg" alt="">&nbsp;Profile</a>
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
                            $inv_count = mysqli_query($con,"SELECT * FROM investment WHERE startup = '$id' and status=1 ");
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
                            $investment_graph = mysqli_query($con,"SELECT * FROM investment WHERE startup ='".$id."' AND status = 1");
                            while($fetch = mysqli_fetch_array($investment_graph)){
                                $inv_name = mysqli_query($con,"SELECT * FROM investor WHERE unique_id='".$fetch['investor']."'");
                                while($f_name = mysqli_fetch_array($inv_name)){$i_name = $f_name['name'];}
                                $eq = (int)$fetch['equity_percent'];
                                $x = $x + $fetch['equity_percent'];
                                $date = $fetch['date'];
                                $a = array("label"=>"$date", "symbol" => "$i_name","y"=>$eq);
                                array_push($dataPoints,$a);
                            }
                            $tes = array("label"=>"$u_startup_name", "symbol" => "$u_startup_name","y"=>100-$x);
                            array_push($dataPoints,$tes);  
                              
                        
                        
                    ?>
                    <script>
                        window.onload = function() {
                        
                        var chart = new CanvasJS.Chart("chartContainer", {
                            theme: "light2",
                            animationEnabled: true,
                            title: {
                                text: "Equity"
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
            <div class="Investment" id="investment">
                <h2>Add Investment Details</h2>
                <div class="acc-setting-form">
                    <form action="" method="post">
                        <div>
                            <label for="">Investor Name</label><br>
                            <select name="investor_id" id="investor_id" autofocus required>
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
                                            
                                            echo '<option value="' .$friendsa['unique_id'].'">'.$friendsa['name'].'</option>';                      
                                        }else{
            
                                            $friends = mysqli_query($con,"SELECT * FROM investor WHERE unique_id = '$myfriend'");
                                            $friendsa = mysqli_fetch_array($friends);
                                                                
                                            echo '<option value="' .$friendsa['unique_id'].'">'.$friendsa['name'].'</option>';
                                        }                          
                                    }
                                }else{
                                    echo '<option>No Connections</option>';	
                                }               
                                
                                ?>
                            </select> 
                        </div>
                        <div>
                            <label for="">Investment Date</label><br>
                            <input type="date" name="investment_date" id="" required>
                        </div>
                        <div>
                            <label for="">Amount Invested</label><br>
                            <input type="text" name="amount" id="" required>
                        </div>
                        <div>
                            <label for="">Equity Percentage</label><br>
                            <input type="text" name="equity" id="" required>
                        </div>
                        <div>
                            <button type="submit" name="investment_submit">Submit</button>
                        </div>
                    </form>
                </div>
                <h2>Investment History</h2>
                <div class="box">
                    <table>
                        <tr>
                            <th>Investor Name</th>
                            <th>Investment Date</th>
                            <th>Amount Invested</th>
                            <th>Equity Percentage</th>
                            <th>Status</th>
                        </tr>
                                                
                        <?php
                            $investment = mysqli_query($con,"SELECT * FROM investment WHERE startup ='".$id."'");
                            while($fetch = mysqli_fetch_array($investment)){
                                $inv_name = mysqli_query($con,"SELECT * FROM investor WHERE unique_id='".$fetch['investor']."'");
                                while($f_name = mysqli_fetch_array($inv_name)){$i_name = $f_name['name'];}
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
                                        echo "Rejected";
                                    }
                                    echo '</td>
                                    
                                </tr>
                                ';
                            }
                        
                        ?>
                    </table>
                </div>
            </div>
            <div class="search" id="search">
                <iframe src="assets/php/search.php" frameborder="0" height="550px" width="1250px"></iframe>
            </div>
            <div class="connection" id="connection">
                <iframe src="assets/php/connections.php" frameborder="0" height="550px" width="1250px"></iframe>
            </div>
            <div class="Profile" id="Profile">
                <iframe src="assets/php/profile.php" frameborder="0" height="550px" width="1250px"></iframe>
            </div>
            <div class="message" id="message">
                <iframe src="assets/chatting_module_startup/users.php" frameborder="0" height="550px" width="1250px"></iframe>
            </div>
            <div class="reportissue" id="reportissue">
                <iframe src="assets/php/reportissue.php" frameborder="0" height="550px" width="1250px"></iframe>
            </div>
            <div class="account" id="account">
                <h2>Account Settings</h2>
                    <div class="acc-setting-form">
                        <form action="assets/php/accountsetting.php" method="post" enctype="multipart/form-data">
                            <div id="profile-container">
                                <image id="profileImage" src="<?php if(!empty($profile_pic)){echo $profile_pic;}else{echo "../../Assets/images/profile_pic.png";}?>"/>
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
                            <label for="u_startup_name">Startup Name</label><br>
                            <input type="text" name="updated_startupname" id="u_startup_name" value="<?php echo $u_startup_name;?>">
                        </div>
                        <div>
                            <label for="u_website">Startup Website</label><br>
                            <input type="text" name="updated_website" id="u_website" value="<?php echo $u_website_url;?>">
                        </div>
                        <div>
                            <label for="u_sector">Sector</label><br>
                            <input type="text" name="updated_sector" id="u_sector" value="<?php echo $u_sector;?>" disabled>
                        </div>
                        <div>
                            <label for="u_stage">Stage</label><br>
                            <select name="updated_stage" id="stage" autofocus>
                                <option value="<?php echo $u_stage?>" selected><?php echo $u_stage?></option>
                                <option value="Idea Stage">Idea Stage</option>
                                <option value="Proof Of Concept">Proof Of Concept</option>
                                <option value="Beta Launched">Beta Launched</option>
                                <option value="Early Traction">Early Traction</option>
                                <option value="Steady Revenues">Steady Revenues</option>>
                            </select> 

                        </div>
                        <div>
                            <label for="u_city">City OF Operation</label><br>
                            <input type="text" name="updated_city" id="city" value="<?php echo $u_city;?>">
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
        </div>  
        
    </div>
      
</body>
</html>
<?php

session_start();
include("../../../../Assets/php/connection/connection.php");

$verify_id = $_POST['verify_id'];

$sql = mysqli_query($con,"SELECT * FROM investor where unique_id = $verify_id");
while($row = mysqli_fetch_array($sql)){
  $profile_pic = $row['profile_pic_url'];

?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <title>Document</title>
  <style>
    body{
            font-family: "Sofia", sans-serif; 
        }
    body{
      background-color: transparent;
    }
    .cover{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .profile-pic > img{
      height: 200px;
      width: 150px;
      border: 10px solid white;
      position: relative;
      top: 40px;
    }
    .main{
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .box{
      position: relative;
      top: 35px;
      text-align: center;
      line-height: 80%;
    }
    table, td {
      border: 0;
      border-bottom: 1px solid black;
      border-collapse: collapse;
    }
    td{
      padding: 5px;
    }
    #reject{
      background-color: rgba(255, 0, 0, 0.585);
      font-size: large;
      border-radius: 5px;
    }
    #approve{
      background-color: rgba(0, 128, 0, 0.497);
      font-size: large;
      border-radius: 5px;
    }

    #back{
        background-color:#C4DDFF;
        border-radius: 5px;
        font-size: large;
    }

    .b_flex{
        display: flex;
        justify-content: center;
        column-gap: 5px;
    }
  </style>
</head>
<body>
  <div class="cover">
    <div class="profile-pic">
    <image src="../../../../Investor/home/<?php if(!empty($profile_pic)){echo $profile_pic;}else{echo "../../../../Assets/images/profile_pic.png";}?>"/>
    </div>
  </div>
  <div class="main">
    <div class="box">
      <h1><?php echo $row['name']; ?></h1>
      <h3><?php echo $row['describes']; ?></h3> 
      <table>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
          <td>Phone No.</td>
          <td>:</td>
          <td><?php echo $row['number']; ?></td>
        </tr>
        <tr>
          <td>Gender</td>
          <td>:</td>
          <td><?php echo $row['gender']; ?></td>
        </tr>
        <tr>
          <td>PAN</td>
          <td>:</td>
          <td><?php echo $row['pan']; ?></td>
        </tr>
        <tr>
          <td>Invested Before</td>
          <td>:</td>
          <td><?php echo $row['invested_before']; ?></td>
        </tr>
        <tr>
          <td>Investement Budget</td>
          <td>:</td>
          <td><?php echo $row['budget']; ?> Lakh</td>
        </tr>
        <tr>
          <td>Assets Worth</td>
          <td>:</td>
          <td><?php echo $row['property'];?> Lakhs</td>
        </tr> 
      </table><br>
      <div class="b_flex">
      <form action="profile_verification.php" method="post">
        <input type="text" value="<?php echo $row['unique_id']; ?>" hidden name="v_id">
        <input type="submit" value="Reject" name="i_reject" id="reject" <?php if($row['status'] == 1 or $row['status'] == 3){echo "hidden";}?>>
      </form>
      <form action="profile_verification.php" method="post">
      <input type="text" value="<?php echo $row['unique_id']; ?>" hidden name="v_id">
        <input type="submit" value="Approve" name="i_approve" id="approve" <?php if($row['status'] == 1 or $row['status'] == 3){echo "hidden";}?>>
      </form>
      <form action="profile_verification.php" method="post">
        <input type="submit" value="Back" name="back" id="back">
      </form>
      <form action="profile_verification.php" method="post">
      <input type="text" value="<?php echo $row['unique_id']; ?>" hidden name="v_id">
        <input type="submit" value="Block" name="i_block" id="approve" <?php if($row['status'] == 0){echo "hidden";}elseif($row['status'] == 3){echo "disabled";}?>>
      </form>
      <form action="profile_verification.php" method="post">
      <input type="text" value="<?php echo $row['unique_id']; ?>" hidden name="v_id">
        <input type="submit" value="Unblock" name="i_unblock" id="approve" <?php if($row['status'] == 0 or $row['status'] == 1){echo "hidden";}?>>
      </form>
      </div>
      <br><br>
    </div>
  </div>
</body>
</html>

<?php
}




?>
<?php
session_start();
include("../../../../Assets/php/connection/connection.php");

$user_id = $_POST['user_id'];
$report_id = $_POST['report_id'];
$user_type = $_POST['user_type'];

if(isset($_POST['query_submit'])){
  mysqli_query($con,"INSERT INTO query_reply (reply_id,reply) values('".$_POST['rpt_id']."','".$_POST['reply']."')");
  mysqli_query($con,"UPDATE report SET action = 1 WHERE report_id = '".$_POST['rpt_id']."'");
  header("Location: report.php");
}
if(isset($_POST['back'])){
  header("Location: report.php");
}

$sql = mysqli_query($con,"SELECT * FROM report where report_id = '".$report_id."'");
while($row = mysqli_fetch_array($sql)){
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
  background-color: transparent;
}
.box{
  border: 2px dashed black;
  border-radius: 10px;
  padding: 10px;
}

div > form > textarea{
    width: 99%;
    border: 2px solid black;
    border-radius: 5px;
    font-size: medium;
}
#reply{
      background-color: rgba(0, 128, 0, 0.497);
      font-size: large;
      border-radius: 5px;
    }

#back{
        background-color:#C4DDFF;
        border-radius: 5px;
        font-size: large;
    }
input[type="submit"]{
  float: right;
}
  </style>
</head>
<body>
  <div class="main">
    <div class="box">
      <h3>Subject</h3>
        <?php echo $row['subject'];?>
      <hr>
      
      <h4>Description</h4>
        <?php echo $row['description'];?>
    </div>
    <div class="box">
    <?php
      
      if($row['action']==0){?>
      <h3>Reply</h3>
      <form action="" method="post">
      <input type="text" name="rpt_id" id="" value="<?php echo $row['report_id'];?>" hidden>
      <textarea name="reply" id="" cols="30" rows="10"></textarea required disabled>
      <br>
      <input type="submit" value="Back" name="back" id="back">&nbsp;
      <input type="submit" value="Submit" name="query_submit" id="reply">  
      </form>
      <?php
        
      }elseif($row['action']==1){
      ?>
      <h3>Reply</h3>
      <form action="" method="post">
      <?php
        $reply_sql = mysqli_query($con,"SELECT * FROM query_reply where reply_id = '".$report_id."'");
        while($reply_row = mysqli_fetch_array($reply_sql)){
          echo $reply_row['reply'];
        }
      
      ?>

      <input type="submit" value="Back" name="back" id="back">&nbsp; 
      </form>
      <?php
      }
      ?>
      
    </div>
  </div>
</body>
</html>
<?php  
}

?>
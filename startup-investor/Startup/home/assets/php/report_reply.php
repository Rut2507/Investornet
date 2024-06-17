<?php
session_start();
include("../../../../Assets/php/connection/connection.php");

$user_id = $_POST['user_id'];
$report_id = $_POST['report_id'];

if(isset($_POST['back'])){
  header("Location: reportissue.php");
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
    background-color: transparent;
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
    </div>
  </div>
</body>
</html>
<?php  
}

?>
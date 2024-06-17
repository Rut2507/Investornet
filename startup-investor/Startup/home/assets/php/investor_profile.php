<?php
session_start();
include("../../../../Assets/php/connection/connection.php");
$i_id=$_GET['send'];
$sql = mysqli_query($con,"SELECT * FROM investor where unique_id = $i_id");
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
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
  <title>Document</title>
  <style>
    body{
            font-family: "Sofia", sans-serif; 
        }
    body{
      background-color: transparent;
    }
    .cover{
      background-color: rgba(75, 75, 75, 0.395);
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
    .i_box > table,.box > table{
        width:90%;
    }
    .i_box > table,th,td{
      background-color: rgba(255, 255, 255, 0.371);
    }
  </style>
</head>
<body>
  <div class="cover">
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
      <div id="chartContainer" style="height: 370px; width:500px;"></div>
        <?php
        $dataPoints = array();
        $x = 0;
            $investment_graph = mysqli_query($con,"SELECT * FROM investment WHERE investor ='".$i_id."' AND status = 1");
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
      <h2>Investment History</h2>
        <div class="i_box">
            <table>
                <tr>
                    <th>Startup Name</th>
                    <th>Investment Date</th>
                    <th>Amount Invested</th>
                    <th>Equity Percentage</th>
                </tr>
                                        
                <?php
                 
                    $investment = mysqli_query($con,"SELECT * FROM investment WHERE investor ='".$i_id."' and status=1");
                    while($fetch = mysqli_fetch_array($investment)){
                        $inv_name = mysqli_query($con,"SELECT * FROM startup WHERE unique_id='".$fetch['startup']."'");
                        while($f_name = mysqli_fetch_array($inv_name)){$i_name = $f_name['startup_name'];}
                        echo '
                        <tr>
                            <td>'.$i_name.'</td>
                            <td>'.$fetch['date'].'</td>
                            <td>'.$fetch['amount'].'</td>
                            <td>'.$fetch['equity_percent'].'%</td>
                        </tr>
                        ';
                    }
                
                ?>
            </table>
        </div>
    </div>
  </div>
</body>
</html>

<?php
}




?>
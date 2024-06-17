<?php
session_start();
include("../../../../Assets/php/connection/connection.php");

$s_id=$_GET['send'];
$query =mysqli_query($con,"SELECT * FROM startup WHERE unique_id ='".$s_id."'");
$numrows=mysqli_num_rows($query);  
if($numrows!=0)  
{  
while($row=mysqli_fetch_assoc($query))  
{  

    $dbusername=$row['name'];
    $u_email = $row['email'];
    $u_number = $row['number'];
    $u_startup_name = $row['startup_name'];
    $r_startup_name = $row['reg_startup_name'];
    $u_website_url = $row['website_url'];
    $c_founder = $row['blog_linku_one'];
    $u_sector = $row['sector'];
    $u_stage = $row['stage']; 
    $u_city = $row['city_opp'];
    $date = $row['inception_date'];
    $pitch = $row['video_url'];
}
}
$info =mysqli_query($con,"SELECT * FROM startup_info WHERE unique_id ='".$s_id."'");
$numrows=mysqli_num_rows($query);  
if($numrows!=0)  
{  
while($row_i=mysqli_fetch_assoc($info))  
{  

    $problem = $row_i['problem'];
    $solution = $row_i['solution'];
    $product = $row_i['product'];
    $traction = $row_i['traction'];
    $bizmodel = $row_i['bizmodel'];
    $market = $row_i['market'];
    $competition = $row_i['competition'];
    $vision = $row_i['vision'];
}
}
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
            background-color: transparent;
        }
        .center{
            display: flex;
            align-content: center;
            justify-content: center;
            flex-flow:wrap;
        }
        table, td {
      border: 0;
      border-bottom: 1px solid black;
      border-collapse: collapse;
    }
    table{
        width: 90%;
    }
    td{
      padding: 5px;
      font-size:large;
      font-weight:bold;
    }
    .box > table{
        width:90%;
        text-align:center;
    }

    .box > table> tr> th{
        font-size:large;
    }
    .break{
    flex-basis: 100%;
    width: 0px; 
    height: 0px; 
    overflow: hidden;
    }
    .i_box{
        background-color: rgba(255, 255, 255, 0.371);
    }
</style>
</head>
<body>
    <div class="center">
    <div >
        <h1><?php echo $u_startup_name;?></h1>
    </div>
    <div class="break"></div>
    <hr>
    <div class="break"></div>
    <div class="pitch">
        <video width="640" height="400" controls>
            <source src="../../../../Startup/home/<?php echo  $pitch;?>" type="video/mp4">
        </video>
    </div>
    <div class="break"></div>
    <div>
        <h3>Problem</h3>
        <?php echo $problem;?>
    </div>
    <div class="break"></div>
    <div>
        <h3>Solution</h3>
        <?php echo $solution;?>
    </div>
    <div class="break"></div>
    <div>
        <h3>Product</h3>
        <?php echo $product;?>
    </div>
    <div class="break"></div>
    <div>
        <h3>Traction</h3>
        <?php echo $traction;?>
    </div>
    <div class="break"></div>
    <div>
        <h3>Business Model</h3>
        <?php echo $bizmodel;?>
    </div>
    <div class="break"></div>
    <div>
        <h3>Market</h3>
        <?php echo $market;?>
    </div>
    <div class="break"></div>
    <div>
        <h3>Competition</h3>
        <?php echo $competition;?>
    </div>
    <div class="break"></div>
    <div>
        <h3>Vision</h3>
        <?php echo $vision;?>
    </div>
    <div class="break"></div>
    <hr>
    <div class="break"></div>
    <table class="center">
        <tr>
          <td>Founder Name</td>
          <td>:</td>
          <td><?php echo $dbusername;?><td>
        </tr>
        <tr>
          <td>Number</td>
          <td>:</td>
          <td><?php echo $u_number;?><td>
        </tr>
        <tr>
          <td>Email</td>
          <td>:</td>
          <td><?php echo $u_email;?><td>
        </tr>
        <tr>
          <td>Co-Founders</td>
          <td>:</td>
          <td><?php echo $c_founder;?><td>
        </tr>
        <tr>
          <td>Registered Name</td>
          <td>:</td>
          <td><?php echo $r_startup_name;?><td>
        </tr>
        <tr>
          <td>Website</td>
          <td>:</td>
          <td><?php echo $u_website_url;?><td>
        </tr>
        <tr>
          <td>Sector</td>
          <td>:</td>
          <td><?php echo $u_sector;?><td>
        </tr>
        <tr>
          <td>Stage</td>
          <td>:</td>
          <td><?php echo $u_stage;?><td>
        </tr>
        <tr>
          <td>Inception Date</td>
          <td>:</td>
          <td><?php echo $date;?><td>
        </tr>
        <tr>
          <td>City Of Operation</td>
          <td>:</td>
          <td><?php echo $u_city;?><td>
        </tr>
      </table>
      <div class="break"></div>
      <div id="chartContainer" style="height: 370px; width:500px;"></div>
      <div class="break"></div>
                        <?php
                        $dataPoints = array();
                        $x = 0;
                            $investment_graph = mysqli_query($con,"SELECT * FROM investment WHERE startup ='".$s_id."' AND status = 1");
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
    
      <h2>Investment History</h2>
      <div class="break"></div>
        <div class="i_box center">
            <table>
                <tr>
                    <th>Investor Name</th>
                    <th>Investment Date</th>
                    <th>Amount Invested</th>
                    <th>Equity Percentage</th>
                </tr>

                <?php
                    $investment = mysqli_query($con,"SELECT * FROM investment WHERE startup ='".$s_id."' and status = 1");
                    while($fetch = mysqli_fetch_array($investment)){
                        $inv_name = mysqli_query($con,"SELECT * FROM investor WHERE unique_id='".$fetch['investor']."'");
                        while($f_name = mysqli_fetch_array($inv_name)){$i_name = $f_name['name'];}
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
</body>
</html>
<?php
    session_start();
    include("../../../../Assets/php/connection/connection.php");
?>
<link rel="stylesheet" href="../css/admin_dashboard_css.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

<div class="div-startup">
    <h2>Unverified Startups</h2>
    <div class="box">
        <table>
            <tr>
                <th>Startup Name</th>
                <th>Email</th>
                <th>Sector</th>
                <th>Action</th>
            </tr>
                                           
        <?php
        $startup_unverified = mysqli_query($con,"SELECT * FROM startup WHERE status='0'");
            while($fetch = mysqli_fetch_array($startup_unverified)){
                echo '
                <tr>
                    <td>'.$fetch['startup_name'].'</td>
                    <td>'.$fetch['email'].'</td>
                    <td>'.$fetch['sector'].'</td>
                    <td><form action="startup_verify.php" method="post">
                    <input type="text" value="'.$fetch['unique_id'].'" name="verify_id" hidden>
                    <input type="submit" value="Verify" class="verify">
                    </form></td>
                </tr>
                ';
            }
        
        ?>
        </table>
    </div>
    <h2>Verified Startups</h2>
    <div class="box">
        <table>
            <tr>
                <th>Startup Name</th>
                <th>Email</th>
                <th>Sector</th>
                <th>Action</th>
            </tr>
                                           
        <?php
         $startup_verified = mysqli_query($con,"SELECT * FROM startup WHERE status='1'");
            while($fetch = mysqli_fetch_array($startup_verified)){
                echo '
                <tr>
                    <td>'.$fetch['startup_name'].'</td>
                    <td>'.$fetch['email'].'</td>
                    <td>'.$fetch['sector'].'</td>
                    <td><form action="startup_verify.php" method="post">
                    <input type="text" value="'.$fetch['unique_id'].'" name="verify_id" hidden>
                    <input type="submit" value="Edit" class="edit">
                    </form></td>
                </tr>
                ';
            }
        
        ?>
        </table>
        
    </div>
    <h2>Blocked Startups</h2>
    <div class="box">
        <table>
            <tr>
                <th>Startup Name</th>
                <th>Email</th>
                <th>Sector</th>
                <th>Action</th>
            </tr>
                                           
        <?php
         $startup_verified = mysqli_query($con,"SELECT * FROM startup WHERE status='3'");
            while($fetch = mysqli_fetch_array($startup_verified)){
                echo '
                <tr>
                    <td>'.$fetch['startup_name'].'</td>
                    <td>'.$fetch['email'].'</td>
                    <td>'.$fetch['sector'].'</td>
                    <td><form action="startup_verify.php" method="post">
                    <input type="text" value="'.$fetch['unique_id'].'" name="verify_id" hidden>
                    <input type="submit" value="Edit" class="edit">
                    </form></td>
                </tr>
                ';
            }
        
        ?>
        </table>
        
    </div>
</div>
<?php
    session_start();
    include("../../../../Assets/php/connection/connection.php");
?>
<link rel="stylesheet" href="../css/admin_dashboard_css.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

<div class="div-investor">
    <h2>Unverified Investors</h2>
    <div class="box">
        <table>
            <tr>
                <th>Investor Name</th>
                <th>Email</th>
                <th>Describes</th>
                <th>Action</th>
            </tr>
                                           
        <?php
            $investor_unverified = mysqli_query($con,"SELECT * FROM investor WHERE status='0'");
            while($fetch = mysqli_fetch_array($investor_unverified)){
                echo '
                <tr>
                    <td>'.$fetch['name'].'</td>
                    <td>'.$fetch['email'].'</td>
                    <td>'.$fetch['describes'].'</td>
                    <td><form action="investor_verify.php" method="post">
                    <input type="text" value="'.$fetch['unique_id'].'" name="verify_id" hidden>
                    <input type="submit" value="Verify" class="verify">
                    </form></td>
                </tr>
                ';
            }
        
        ?>
        </table>
    </div>
    <h2>Verified Investors</h2>
    <div class="box">
        <table>
            <tr>
                <th>Investor Name</th>
                <th>Email</th>
                <th>Describes</th>
                <th>Action</th>
            </tr>
                                           
        <?php
            $investor_verified = mysqli_query($con,"SELECT * FROM investor WHERE status='1'");
            while($fetch = mysqli_fetch_array($investor_verified)){
                echo '
                <tr>
                    <td>'.$fetch['name'].'</td>
                    <td>'.$fetch['email'].'</td>
                    <td>'.$fetch['describes'].'</td>
                    <td><form action="investor_verify.php" method="post">
                    <input type="text" value="'.$fetch['unique_id'].'" name="verify_id" hidden>
                    <input type="submit" value="Edit" class="edit">
                    </form></td>
                </tr>
                ';
            }
        
        ?>
        </table>
    </div>
    <h2>Blocked Investors</h2>
    <div class="box">
        <table>
            <tr>
                <th>Investor Name</th>
                <th>Email</th>
                <th>Describes</th>
                <th>Action</th>
            </tr>
                                           
        <?php
            $investor_verified = mysqli_query($con,"SELECT * FROM investor WHERE status='3'");
            while($fetch = mysqli_fetch_array($investor_verified)){
                echo '
                <tr>
                    <td>'.$fetch['name'].'</td>
                    <td>'.$fetch['email'].'</td>
                    <td>'.$fetch['describes'].'</td>
                    <td><form action="investor_verify.php" method="post">
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
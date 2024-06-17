<?php 
session_start();

  include("../../Assets/php/connection/connection.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $number = $_POST['number'];
    $encrypt_pass = $_POST['password'];    
    $founder = $_POST['founder'];
    $blog_linku_one = implode(",", $_POST["blog_linku_one"]);
    $blog_linkn_one = implode(",", $_POST["blog_linkn_one"]);
    $startup_name = $_POST['startup_name'];
    $reg_startup_name = $_POST['reg_startup_name'];
    $website_url = $_POST['website_url'];
    $sector = $_POST['sector'];
    $stage = $_POST['stage'];
    $inception_date = $_POST['inception_date'];
    $city_opp = $_POST['city_opp'];


    $ran_id = rand(time(), 100000000);
    $status = "0";
   // $encrypt_pass = md5($password);
		$query = "insert into startup (unique_id,name,email,gender,number,password,founder,blog_linku_one,blog_linkn_one,startup_name,reg_startup_name,website_url,sector,stage,inception_date,city_opp,status) values ('$ran_id','$name','$email','$gender','$number','$encrypt_pass','$founder','".$blog_linku_one."','".$blog_linkn_one."','$startup_name','$reg_startup_name','$website_url','$sector','$stage','$inception_date','$city_opp','$status')";

		if(mysqli_query($con, $query)){

      echo "<script>
      window.location.href = '../../index.php';
      alert('Startup ID Created');
    </script>"; 
    }

		header("Location: ");
		die;
	}
?> 




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/css/startup_style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">

    <script src="assets/js/startup_script.js" defer></script>
    <script src="assets/js/startup_firebase.js" defer></script>

    <title>Startup Registraion Form</title>
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
  <div class="header">
      <div class="logo">
          <img src="../../Assets/logo/logo.png" alt="" height="75px" width="75px">
      </div>
      <nav>
          <li><a href="../../index.php">Home</a></li>
      </nav>
    </div>
    <form action="" method="post" class="form">
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        
        <div class="progress-step progress-step-active"></div>
        <div class="progress-step" ></div>
      </div>

      <!-- Steps -->
      <div class="form-step form-step-active">
        <div class="input-group l">
          <label for="name">Your Name<span class="required">*</span></label>
          <input type="text" name="name" id="name" placeholder="Enter Your Name"/>
        </div>
        <div class="input-group r">
          <label for="email">Email Id<span class="required">*</span></label>
          <input type="email" name="email" id="email" placeholder="Enter Email id"/>
        </div>
        <div class="clr"></div>
        <div class="gen l">
          <label for="gender">Gender<span class="required">*</span></label>
          <div class="inline">
            <input type="radio" name="gender" id="gender" value="Male">Male
            <input type="radio" name="gender" id="gender" value="Female">Female
          </div>
        </div>
        <div class="input-group r">
          <label for="number">Phone number<span class="required">*</span></label>
          <input type="tel" name="number" id="number" placeholder="Enter phone number" required>
        </div>
        <div class="clr"></div>
        <div class="input-group l">
          <label for="password">Password<span class="required">*</span></label>
          <input type="password" name="password" id="password" required placeholder="Enter Password"/>
        </div>
        <div class="input-group r">
          <label for="cnf_password">Confirm Password<span class="required">*</span></label>
          <input type="password" name="cnf_password" id="cnf_password" placeholder="Confirm Your Password"/>
        </div>
        <div class=" founder l">
          <label for="founder">Are you a Single founder<span class="required">*</span></label>
          <div class="inline">
            <input type="radio" name="founder" id="Yes" value="1" onclick="show1();" >Yes
            <input type="radio" name="founder" id="No" value="0" onclick="show2();">No
          </div>
          <script>
            function show1(){
              document.getElementById('conditional').style.display ='none';
            }
            function show2(){
              document.getElementById('conditional').style.display = 'block';
            }
          </script>
        </div>
        <div class="clr"></div>
        <div id="conditional">
          <span class="add"><u>Add Founder</u></span>
          <div class="clr"></div>
          <div class="appending_div">
            <div class="l"><label for="multi_founder">2.Founder Name<span class="required">*</span></label><input type="text" name="blog_linku_one[]" id="multi_founder"></div>
            <div class="r"><label for="multi_founder_email">2.Founder Email<span class="required">*</span></label><input type="text" id="multi_founder_email" name="blog_linkn_one[]"></div>
          </div>
          <script>
            $(document).ready(function() {
            var i = 3;
              $('.add').on('click', function() {
                var field = '<div class="l"><label for="multi_founder">'+i+'.Founder Name<span class="required">*</span></label><input type="text" name="blog_linku_one[]" id="multi_founder"></div><div class="r"><label for="multi_founder_email">'+i+'.Founder Email<span class="required">*</span></label><input type="text" id="multi_founder_email" name="blog_linkn_one[]"></div>';
                $('.appending_div').append(field);
                i = i+1;
              })
            })
          </script>
        </div>
        
        <div class="input-group r">
          <div id="recaptcha-container"></div>
        </div>
        <div class="clr"></div><br>
        <div class="">
          <a href="#pop" class="btn width-100 ml-auto" onclick="phoneAuth();">Next</a>
        </div>
        <div id="pop" class="overlay">
          <div class="popup">
            <a class="close" href="#">&times;</a>
            <div class="content">
              <h2>Enter OTP</h2>
              <div class="formcontainer">
                <div class="input-group">
                  <input type="text" id="verificationCode" placeholder="Enter verification code">
                </div>
                  <button type="button" onCLick="codeverify();" class="btn width-50 ml-auto verify" >Continue</button>
                  <button type="button" class="btn-next otp" hidden id="clickButton"></button>
              </div>
            </div>
          </div>
        </div>
        <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
        <script>
          // Your web app's Firebase configuration
          var firebaseConfig = {
          appId: "1:252748063882:web:5c748730853029ed32f973",
          apiKey: "AIzaSyDMoRmWNM1d-ekHy66EeXpIegEbWnF37LE",
          authDomain: "login-authentication-sys-f9c03.firebaseapp.com",
          projectId: "login-authentication-sys-f9c03",
          storageBucket: "login-authentication-sys-f9c03.appspot.com",
          messagingSenderId: "252748063882",
          };

          // Initialize Firebase
          firebase.initializeApp(firebaseConfig);
          firebase.analytics();
        </script> 
      </div>
      </div>
      <div class="form-step">
        <div class="input-group l">
          <label for="startup_name">Name of Startup<span class="required">*</span></label>
          <input type="text" name="startup_name" id="startup_name" placeholder="Enter the name of your startup"/>
        </div>
        <div class="input-group r">
          <label for="reg_startup_name">Registered Name of startup<span class="required">*</span></label>
          <input type="text" name="reg_startup_name" id="reg_startup_name" placeholder="Enter the regisered name of your startup"/>
        </div>
        <div class="input-group l">
          <label for="website_url">Website URL<span class="required">*</span></label>
          <input type="text" name="website_url" id="websit_url" placeholder="Enter website url"/>
        </div>
        <div class=" r">
          <label for="sector">Sector Of StartUp<span class="required">*</span></label>
          <select name="sector" id="sector">
          <option value="Automotive">Automotive</option>
          <option value="Beauty">Beauty</option>
          <option value="Big Data">Big Data</option>
          <option value="Blockchain">Blockchain</option>
          <option value="Careers">Careers</option>
          <option value="Communication">Communication</option>
          <option value="Computer Vision">Computer Vision</option>
          <option value="Construction">Construction</option>
          </select>       
        </div>
        <div class="l">
            <label for="stage">Stage Of StartUp<span class="required">*</span></label>
            <select name="stage" id="stage">
            <option value="Idea Stage">Idea Stage</option>
            <option value="Proof Of Concept">Proof Of Concept</option>
            <option value="Beta Launched">Beta Launched</option>
            <option value="Early Traction">Early Traction</option>
            <option value="Steady Revenues">Steady Revenues</option>>
            </select>       
        </div>
        <div class="r">
            <label for="inception_date">Month & Year Of Inception</label>
            <input type="month" name="inception_date" id="inception_date" max="<?php echo date('y-m-d');?>">
        </div>
        <div class="input-group l">
          <label for="city_opp">City Of Operation<span class="required">*</span></label>
          <input type="text" name="city_opp" id="city_opp" placeholder="Enter Main Branch City" require>
        </div>
        <div class="clr"></div><br>
        <div class="btns-group width-100">
          <input type="submit" value="Submit" class="btn" >
        </div>
      </div>
    </form>
  </body>
</html>

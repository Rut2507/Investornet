<?php 
session_start();

  include("../../Assets/php/connection/connection.php");
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];
    $pan = $_POST['pan'];
    $number = $_POST['number'];
    $describes = $_POST['describes'];
    $invested_before = $_POST['invested_before'];
    $budget = $_POST['budget'];
    $property = $_POST['property'];
		  
    $ran_id = rand(time(), 100000000);
    $status = 0;
    //$encrypt_pass = md5($password);
		$query = "insert into investor (unique_id,name,email,gender,password,pan,number,describes,invested_before,budget,property,status) values ('$ran_id','$name','$email','$gender','$password','$pan','$number','$describes','$invested_before','$budget','$property','$status')";

		mysqli_query($con, $query);
		header("Location: ../../index.php");
		die;
	}
?> 



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="assets/css/investor_style.css" />
    <script src="assets/js/investor_script.js" defer></script>
    <script src="assets/js/investor_firebase.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <title>Investor Registraion Form</title>
  </head>
  <style>
    body {
      background-image: url('../../Assets/logo/background.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;  
      background-size: cover;
    }
  </style>
  <body>
    <div class="header">
      <div class="logo">
          <img src="../../Assets/logo/logo.png" alt="" height="75px" width="75px">
      </div>
      <nav>
          <li><a href="../../index.php">Home</a></li>
      </nav>
    </div>
    <form method="post" class="form" name="myForm">
      <!-- Progress bar -->
      <div class="progressbar">
        <div class="progress" id="progress"></div>
        
        <div
          class="progress-step progress-step-active"
          data-title="Personal Details"
        ></div>
        <div class="progress-step" data-title="Investment Profile"></div>
      </div>

      <!-- Steps -->
      <div class="form-step form-step-active">
        <div class="input-group l">
          <label for="name">Your Name<span class="required">*</span></label>
          <input type="text" name="name" id="name" placeholder="Enter Your Full Name" onclick="Validate();" required/>
        </div>
        <script>
          function Validate() {
            let x = document.forms["myForm"]["name"].value;
            if (x == "") {
              alert("This Field must be filled out");
              return false;
            }
            
          }
        </script>
        <div class="input-group r">
          <label for="email">Email<span class="required">*</span></label>
          <input type="email" name="email" id="email" placeholder="Enter Your Email ID" onclick="Validate();" required/>
        </div>
        <div class="input-group l">
          <label for="number">Phone number<span class="required">*</span></label>
          <input type="text" name="number" id="number" placeholder="Enter phone number" onclick="Validate();" required>
        </div>
        <div class="input-group r gender">
          <label for="gender">Gender<span class="required">*</span></label>
          <div class="g-inline">
            <input type="radio" name="gender" id="M" value="Male"><label for="M" >Male</label>
            <input type="radio" name="gender" id="F" value="Female"><label for="F" >Female</label>
          </div>
        </div>
        <div class="input-group l">
          <label for="password">Password<span class="required">*</span></label>
          <input type="password" name="password" id="password"  placeholder="Enter Password" onclick="Validate();" required/>
        </div>
        <div class="input-group r">
          <label for="cnf_password">Confirm Password<span class="required">*</span></label>
          <input type="password" name="cnf_password" id="cnf_password" placeholder="Confirm Your Password" onclick="Validate();" required/>
        </div>
        <div class="input-group l">
          <label for="pan">PAN number<span class="required">*</span></label>
          <input type="text" name="pan" id="pan" placeholder="Enter your PAN number" onclick="Validate();" required/>
        </div>
        <div class="input-group r cap">
        <div id="recaptcha-container"></div>
        </div>
        <div class="clr"></div>
        <div class="">
          <a href="#pop" class="btn width-50 ml-auto" onclick="phoneAuth();">Next</a>
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
      <div class="form-step">
        <div class="input-group l">
          <label for="describe">Which of these best describes you?<span class="required">*</span></label>
          <select name="describes" id="describe">
              <option value="Business Owner">Business Owner</option>
              <option value="Professional">Professional</option>
              <option value="VC & PE Professional">VC & PE Professional</option>
              <option value="VC & PE Fund">VC & PE Fund</option>
              <option value="Angel Network">Angel Network</option>
              <option value="Family Office">Family Office</option>
              <option value="Startup Founder">Startup Founder</option>
              <option value="Accelerator/Incubator">Accelerator/Incubator</option>
              <option value="Student">Student</option>
              <option value="Other">Other</option>
          </select>
        </div>
        <div class="input-group r inv-bef">
          <label for="invested_before">Have You Invested Before?<span class="required">*</span></label>
          <div class="inv-inline">
            <input type="radio" name="invested_before" id="invY" value="1"><label for="invY">Yes</label>
            <input type="radio" name="invested_before" id="invN" value="0"><label for="invN">No</label>
          </div>
        </div><br><br>
        <div class="input-group l">
          <label for="budget">What is your Investment budget for the year?<span class="required">*</span></label>
          <input type="text" name="budget" id="budget" placeholder="Example: Enter 5 for 5 Lakhs"/>
        </div>
        <div class="input-group r inv-bef">
          <label for="property">Do you have assets worth over INR 2 cr apart form your primary residence?<span class="required">*</span></label>
          <div class="inv-inline">
            <input type="radio" name="property" id="invY" value="1"><label for="invY">Yes</label>
            <input type="radio" name="property" id="invN" value="0"><label for="invN">No</label>
          </div>
        </div>
        <div class="clr"></div>
        <div class="input-group platform">
          <label for="hear_about_platform">How did you hear about our Platform?<span class="required">*</span></label>
            <div class="plat-inline">
              <input type="radio" name="hear_about_platform" id="News" value=""><label for="News">News</label>
              <input type="radio" name="hear_about_platform" id="social" value=""><label for="social">Social Media</label>
              <input type="radio" name="hear_about_platform" id="refstart" value=""><label for="refstart">Referral form Startup</label>
              <input type="radio" name="hear_about_platform" id="refinv" value=""><label for="refinv">Referral form Investor</label>
              <input type="radio" name="hear_about_platform" id="internet" value=""><label for="internet">Internet Search</label>
            </div>
        </div>
        <br><br>
        <div class="clr"></div>
        <div class="submit-btn">
          <input type="submit" value="Submit" class="btn" />
        </div>
      </div>
    </form>
  </body>
</html>

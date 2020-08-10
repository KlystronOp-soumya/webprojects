<!-- 11700116037 -->
<?php
 //check for exixting sessions
 require_once 'includes/checkSession.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>LogIn Here</title>
    <link href="styles/LoginPageStyle.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="img/sitelogo.png" type="image/icon type">
</head>
  <body>
    <form action="includes/loginProcess.inc.php" method="POST" target="_blank">
      <h1>Login Form</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="uname"><strong>Classroll</strong></label>
        <input type="text" name="stdrol" placeholder="format:ece2017***" required>
        <label for="psw"><strong>Password</strong></label>
        <input type="password" name="univrol" id="pasd" maxlength="11" placeholder="Your University Roll" required>
        <input type="checkbox" onclick="myFunction()">Show Password
        <script src="scripts/showPassword.js" type="text/javascript"></script>
      </div>
      <button type="submit" name="sbmt">Login</button>
      <button type="button">Admin</button>
    <!--   <div class="container" style="background-color: #eee">
         <label style="padding-left: 15px">
        <input type="checkbox"  checked="checked" name="remember"> Remember me
        </label> 
        <span class="psw"><a href="#"> Forgot password?</a></span>
      </div> -->
    </form>
  </body>
</html>
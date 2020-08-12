<?php
if(isset($_REQUEST['roll']))
$rl=$_REQUEST['roll'];
else
$rl="";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register Now</title>
    <link rel="icon" href="img/sitelogo.png" type="image/icon type">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/RegistrationPageStyle.css" text="text/css">
</head>
<body>
<!-- <h2>Hello</h2><?php  echo $_REQUEST['roll']; ?> -->
<form action="includes/registrationProcess.inc.php" method="POST">
      <h1>Register Here</h1>
      <div class="icon">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="formcontainer">
      <div class="container">
        <label for="uname"><strong>Username</strong></label>
        <input type="text" placeholder="Enter name" name="stdname" required>
        <label for="mail"><strong>E-mail</strong></label>
        <input type="email" placeholder="Enter E-mail" name="stdmail" required autocomplete><br>
        <label for="psw"><strong>Roll No.</strong></label>
        <input type="text" placeholder="ece2017***" name="clsrol" value="<?php echo $rl; ?>" required>
      <button type="submit" name="sbmt"><strong>SIGN UP</strong></button>
      <a href="PortalLogin.php"><button> Back</button></a>
     <!-- <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
         <input type="checkbox"  checked="checked" name="remember"> Remember me
        </label>
        <span class="psw"><a href="#">Forgot password?</a></span> -->
      </div>
    </form>
 


</body>
 </html>
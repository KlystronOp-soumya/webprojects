<?php
if(isset($_REQUEST['roll']))
$rl=$_REQUEST['roll'];
else
$rl="";
?>
<!DOCTYPE html>
<head>
    <title>check result</title>
    <link rel="icon" href="img/sitelogo.png" type="image/icon type">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/RegistrationPageStyle.css" text="text/css">
</head>
<body>
<form action="includes/showResult.inc.php" method="POST">
      <h1>check Your result</h1>
      <div class="formcontainer">
      <div class="container">
       
        <label for="psw"><strong>Roll No.</strong></label>
        <input type="text" placeholder="ece2017***" name="clsrol" value="<?php echo $rl; ?>" required>
      <button type="submit" name="sbmt"><strong>check</strong></button>
      <a href="PortalLogin.php"><button type=""> << Back</button></a>
</body>
<?php
require 'includes/dbh.inc.php';
session_start();
?>
<!DOCTYPE html>
<!-- PROPERLY WORKING -->
<html>
 <head>
 <script>
 function redirect()
 {
   setTimeout(function(){window.top.location="quiz-page.php"} ,10000);
   
  }
 
  </script>
  <title>Regulations</title>
 </head>
 
 <body align="center" style="font-size:25px;" onload="redirect()" >
 
 <h1><b>welcome <br><?php echo $_SESSION['Username']; ?></b></h1><br>
  <h2><i> Rules:-</i></h2><br>
  <ol>
  
  <li><i>There are 5 questions;each of 1 mark</i></li>
  <li><i>You will get 15mins;after that autometically will be directed to next<br>page </i></li>
  <li>wait in this page for 2mins</li>
  <li>next page will be quiz page</li> 
  <li>If you press home button you will be logged out and your data will be deleted</li>
  </ol>
  <form align="center" action="includes/logoutred.inc.php" method="POST">
   <input type="submit" name="logred" value="Home-End">
  </form>
 </body>
</html>

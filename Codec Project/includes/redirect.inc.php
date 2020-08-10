 <?php
  require('dbh.inc.php');
   session_start();
   if(isset($_SESSION['Username']))
   {
     if((time()-$_SESSION['last_login_timestamp'])>60)
	   { //2mins after next page
		  header('location:front-page.html'); 
	   }
	   else
      {
	    $_SESSION['last_login_timestamp']=time(); 
	    echo "<h1 align='center'> logged in as".$_SESSION['username']. "</h1>";
		echo "<p align='center'> <a href=' ../log-out-page.html'>End Exam ASAP </a></p>";
      }
  }
  else{
	  header('location: ../log-in-page.html');
	}

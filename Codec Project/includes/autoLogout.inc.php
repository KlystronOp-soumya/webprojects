<?php
include 'dbh.inc.php';
  session_start();
	if(isset($_SESSION['Username']))
	{
		$uid=$_SESSION['Username'];
	    session_unset($_SESSION['Username']);
		echo"<script>alert('Successfully LogOut: $uid');</script>";
		echo"Thank You For participating :)";
		echo"<script>window.location.href=' ../front-page.html'; </script>";
	    //header("Location: ../sign-up-page.html?sessionDestroyed");
		  mysqli_close($conn);
	}
	else{
				echo"\n\nNo active session";
	header("Location: ../sign-up-page.html");
		
	}


?>
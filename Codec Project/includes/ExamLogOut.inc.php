<?php
require 'dbh.inc.php';
//logoutred.inc.php

if (isset($_GET['Examend']))
{
	session_start();
	if(isset($_SESSION['Username']))
	{
		$uid=$_SESSION['Username'];
	    session_unset($_SESSION['Username']);
		echo"<script>alert('Successfully LogOut: $uid');</script>";
		echo"<script>window.location.href='front-page.html';</script>";
            
			//closing the connection
            mysqli_close($conn);
	}
}

?>
<?php
require 'dbh.inc.php';
//logout.inc.php

if (isset($_POST['logout_submit']))
{
	
  //this portion isnt required at all
	/*$uid=$_POST['user'];
	$sql="SELECT * FROM users WHERE user_uid='$uid'";
	$result=mysqli_query($conn,$sql);
	if($result==1)
	{*/
			session_start();
	if(isset($_SESSION['Username']))
	{
		$p=$_SESSION['Username'];
		//echo"<h1>WELCOME: Candidate:</h1><br>".$_SESSION['Username'];
		//echo"<h3>usetting session</h3>".$_SESSION['Username'];
	    session_unset($_SESSION['Username']);
		
	    echo"<script>alert('Successfully LogOut: $p');</script>";
	    //session_destroy for all;
	    echo"<script>window.location.href=' ../sign-up-page.html';</script>";
		mysqli_close($conn);
	}
	else
    {
	 echo"<script>alert('no user session');</script>";
	 echo"<script>window.location.href=' ../log-in-page.html';</script>";
    }
 }
 

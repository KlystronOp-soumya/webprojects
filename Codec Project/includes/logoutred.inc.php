<?php
require 'dbh.inc.php';
//logoutred.inc.php

if (isset($_POST['logred']))
{   
    session_start();
	if(isset($_SESSION['Username']))
	{
		$uid=$_SESSION['Username'];
	    session_unset($_SESSION['Username']);
		echo"<script>alert('Successfully LogOut: $uid');</script>";
		echo"was:$uid";
		$sql = "DELETE FROM candidates WHERE cand_uid = '$uid' " ;
		$retval = mysqli_query($conn,$sql);
		if(! $retval ) {
               die('Could not delete data: ' . mysqli_error());
            }
            
            echo "Deleted data successfully\n";
            
            mysqli_close($conn);
         }
 }
 ?>

 

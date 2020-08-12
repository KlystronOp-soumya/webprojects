<?php
/* **WORKING PROPERLY** */
//login.inc.php
require 'dbh.inc.php';
 if(isset($_POST['btn'])) //if the button is clicked
{ //stored in another variable
	$uid=$_POST['user'];
	$password=$_POST['pwd'];			
			
 
  if(!preg_match("/^[a-zA-Z]*$/",$uid))
   {
	   //only contains a-z and A-Z not any numbers
	     header("Location: ../log-in-page.html?name=invalid");
	     exit();
   }
else{
	 $sql="SELECT *FROM candidates WHERE cand_uid='".$uid."' AND cand_pwd='".$password."' "; //this query is used to check
				 // '"some variable "' is for the VARCHAR type in the database,not necessary
		$rs=mysqli_query($conn,$sql); 
		$result=mysqli_num_rows($rs);//if found
		if( $result== 1)
	   {
		   //session is started
		  	   session_start();
		$_SESSION['Username']=$uid;
		$_SESSION['Password']=$password;//not necessary
		echo"<script>alert('successful log-in');</script>";
		echo"<script>window.location.href=' ../regulations-page.php';</script>"; 
		
	 } 
	   
	   else
	  {
	   echo"<script>alert('credentials mismatch');</script>";
	   echo"<script>window.location.href=' ../log-in-page.html';</script>";
	  }
    }   
	
 }
else
{
	echo"<script>alert('Nothing Submitted');</script>";
	 echo"<script>window.location.href=' ../log-in-page.html';</script>";
}
	
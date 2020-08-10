<?php
  //this the connection script to establish the connection eith the database
 $server="localhost";
 $user="root";
 $password=""; //no password
 $name="codec_portal";
 
 $conn=mysqli_connect($server,$user,$password,$name);/*establishing the connection*/
 /*$database=mysqli_select_db($conn,'codec_portal');*/
   if(!$conn) //or if(mysqli_connect_error())
  {
	  die("connection failed".mysqli_connect_error());
  }
   else
  {
	 echo ("Successful connection");
  }
 
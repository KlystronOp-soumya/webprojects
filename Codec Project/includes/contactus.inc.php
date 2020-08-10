<?php
//working properly
 //contact-proces.inc.php

  if(isset($_POST['issue_submit']))
  {require('dbh.inc.php');
	  $uid=$_POST['user'];
	  $name=$_POST['name'];
	  $subject=$_POST['subject'];
	  $mailFrom=$_POST['mail'];
	  $message=$_POST['message'];
	  
	  //check for first existing user
	  $q=" SELECT * FROM candidates WHERE cand_uid= '".$uid."' ";
	  $result=mysqli_query($conn,$q);
	  $rs=mysqli_num_rows($result);
	  if($rs == 1)//exists then issues will be submitted
	  {
		  echo"<h3>User exists</h3>";
		   $sql="INSERT INTO user_feedback(name,email,issue,message)VALUES('$name','$mailFrom','$subject','$message');";
	       $rs=mysqli_query($conn,$sql);//executed and row affected
		    if($rs == 1)
	      { 
	        echo"<script>alert('Submitted Successfully-redirecting')</script>";
	        echo"<script>window.location.href=' ../front-page.html';</script>";
	      }
		  
		  else
	     {
		  header('Location: ../contact-us-page.html?error=not submitted');
		  echo"<h1>Sorry User</h1>";
	     }
	  }
	  else //if failes existance of the previous user
	  {
		  echo "<script>alert('Signup First!');</script>";
		  echo"<script>window.location.href=' ../sign-up-page.html'</script>";
	  }
	 
}	  
else //if not set
	{ 
        //mysqli_close($conn);
		echo"<script>alert('Kindly Submit fist')</script>";
		echo"<script>window.location.href=' ../front-page.html'</script>";
	}  
	
	
	//this part for practical hosting services
	/*  $mailTo="soumyadeep62.net";
	  $header="From: ".$mailForm;
	  $txt="you have recived an e-mail from ".$name.".\n\n"
	  // function with three parameters:email to be sent,subject,message
	  mail($mailTo,$subject,$txt,$header);
	  header("Location: contact-us.html?mailsend");*/

<?php
//signup.inc.php **WORKING PROPERLY
  //this file is used to handel the data entries into the database
  //ALTER TABLE `candidates` ADD `cand_uid` VARCHAR(256) NOT NULL AFTER `cand_sex`;
  require('dbh.inc.php');//connection established
  
  if(isset($_POST['btn']))
  {
	  $fname=$_POST['name1'];
	  $lname=$_POST['name2'];
	  $sex=$_POST['gender'];
	  $dept=$_POST['stream'];
	  $uname=$_POST['username'];
	 $email=$_POST['Email'];
	  $pwd=$_POST['password'];
	  $pwdrep=$_POST['confpass'];
	  
	  //error handlings
  if(empty($fname)||empty($lname)||empty($uname)||empty($sex)||empty($dept)||empty($email)||empty($pwd)||empty($pwdrep))
  {
	  echo "<script>alert('Fields Missing')</script>";
	  echo"<script>window.location.href=' ../sign-up-page.html'</script>";
	  exit();
  }
   else if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
		header("Location: ../sign-up-page.html?email=invalid");
	    exit();
	 }
  else if(!preg_match("/^[a-zA-Z]*$/",$fname) || !preg_match("/^[a-zA-Z]*$/",$lname) || !preg_match("/^[a-zA-Z]*$/",$uname))
   {
	   //only contains a-z and A-Z not any numbers
	     header("Location: ../sign-up-page.html?name=invalid");
	     exit();
   }
   //added potion
   else if($pwd!=$pwdrep)
  {  
     echo "<script>alert('Password Mismatch')</script>";
	 echo "<script>window.location.href=' ../sign-up-page.html';</script>";
	  exit();
  }
  /*else if( strlen($pwd)>6)
  {
	  echo "<script>alert ('Password length out of bound')</script>)";
  }	*/
  //to check the length of the password
  else
  {      //check for existing user
		  $sql="SELECT * FROM candidates WHERE cand_uid='$uname'";
		  $result=mysqli_query($conn,$sql);
		  $rs=mysqli_num_rows($result);
		  if($rs>=1)
		  {
			  echo"<script>alert('user name taken');</script>";
	          exit();
		  }
	      else
		  {
		  //$hashedPwd=password_hash($password,PASSWORD_DEFAULT);
		 $sql="INSERT INTO candidates (cand_first,cand_last,cand_dept,cand_sex,cand_email,cand_uid,cand_pwd) 
		                       VALUES('$fname','$lname','$dept','$sex','$email','$uname','$pwd'); ";
		$result= mysqli_query($conn,$sql);
		 if($result==1)
		 {
			  echo"<script>alert('user added');</script>";
			  echo"<script>window.location.href=' ../log-in-page.html';</script>";
		 }
	   }
	}
 }
 else
  {
	  echo" <script>alert('Nothing submitted')</script> ";
	  echo"<script>window.location.href=' ../sign-up-page.html';</script>";

	  
  }
 
  
	
	
	
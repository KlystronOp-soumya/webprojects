<?php
/*password-retrive.php*/

require('dbh.inc.php');
//whether the button is pressed
if(isset($_GET['btn']))
{
	$user=$_GET['username'];
	$mail=$_GET['Email'];
	//check for the existance
	$sql="SELECT * FROM candidates WHERE cand_uid ='$user' AND cand_email='$mail' ";
	$run_query=mysqli_query($conn,$sql);
	$result=mysqli_num_rows($run_query);
	
	if($result == 1)
	{
	    $query_fetch= " SELECT * FROM candidates WHERE cand_uid='$user' ";
		$rs=mysqli_query($conn,$query_fetch);
		$fetch=mysqli_fetch_assoc($rs);
		$p=$fetch['cand_pwd'];
	    echo"<script>alert('password:$p');</script>";
		echo"<script>window.location.href=' ../log-in-page.html';</script>";
		//echo "<h2> password:{$fetch['cand_pwd']}</h1>"; //also works
		
   mysql_free_result($fetch);
   echo "Fetched data successfully\n";
   
   mysql_close($conn);
		
	}
	else
	{
       header('location: ../sign-up-page.html');
	}
}
else
{
	header('location: ../forot-password.html');
}

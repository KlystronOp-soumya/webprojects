<?php
//registration process
//using the prepard statements

//mail validation function
function validate_email($mail)
{
   $flag=false;
	   $domains=array("@gmail","@yahoo","@hotmail");//array of domains is created
		for($i=0;$i<count($domains);$i++)
		{
		  $pos= strpos($mail, $domains[i]); //if exists
		  if($pos===false)
			  $flag=true;
		  else
			  $flag=false;
		}
		return $flag;
}


if(isset($_POST["sbmt"]))
{
    //include database connection file
    require('dbconn.inc.php');

    //defining the variables
    $name=mysqli_real_escape_string($conn,$_POST['uname']);
    $gender=mysqli_real_escape_string($conn,$_POST['ugender']);
    $age=mysqli_real_escape_string($conn,$_POST['uage']);
    $weight=mysqli_real_escape_string($conn,$_POST['uweight']);
    $height=mysqli_real_escape_string($conn,$_POST['uheight']);
    $mail=mysqli_real_escape_string($conn,$_POST['umail']);
    $pwd=mysqli_real_escape_string($conn,$_POST['upassword']);

    //hashing the password given
    $hashedPWD=password_hash($pwd,PASSWORD_DEFAULT);//this will be stored in the database
    $mailvalidate=validate_email($mail);

    //check for the empty
    if(empty ($name) || empty( $gender) || empty($age) || empty($weight) ||  empty($height) ||  empty($mail) || empty( $pwd))
    {
      header("Location: ../regsiter.html?error=emptyFIeld");
      exit();
    }
   
    //check for the email validity
    else if (!filter_var($mail,FILTER_VALIDATE_EMAIL) || !$mailvalidate)
  {
      header("Location: ../regsiter.html?error=mailInval");
      exit();
    }
  //check for the correct name
  else if(!preg_match("/^[a-zA-Z ]*$/",$name)) //letters and space
  {
    header("Location: ../regsiter.html?error=nameInval");
    exit();
  }

  else
 {
      //check for the taken user nam
     $sql= "SELECT uname,umail FROM users WHERE uname=? AND  umail=? ;" ; //placeholders
     $stmt=mysqli_stmt_init($conn);

     //if cant be initialized
     if(!mysqli_stmt_prepare($stmt,$sql))
       echo"system error";
    else
    {
      //binding the parameter
      mysqli_stmt_bind_param($stmt,'ss',$name,$mail);
      //execute
      mysqli_stmt_execute($stmt);
      //store the result
      mysqli_stmt_store_result($stmt);
      //
      $result=mysqli_stmt_num_rows($stmt);

      if($result>0)//user exists
      {
        echo"<script>alert('Already Exists');</script>";
        echo"<script>window.location.href='../index1.html?msg=LogIN'</script>";
      }
      else //or add the user
      {
         $sql="INSERT INTO USERS(ugender,uname,uage,uweight,uheight,umail,upassword,pwd) VALUES (?,?,?,?,?,?,?,?); " ;
         $stmt=mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt,$sql))
         echo"system error";
         else
         {
           mysqli_stmt_bind_param($stmt,'ssiisssi',$gender,$name,$age,$weight,$height,$mail,$hashedPWD,$pwd);
           mysqli_stmt_execute($stmt);
           $result=mysqli_stmt_affected_rows($stmt);

           if($result==1)
           {
            echo"<script>alert('succesfully registered');</script>";
						echo"<script>window.location.href=' ../index1.html';</script>";
						mysqli_close($conn);
           }
           else
           {
           
             header("Location: ../index1.html?error=notReg");
             exit();
           }
         }
         
    }
  }
 }
 mysqli_close($conn);
}


else
{
  print("nothing submitted");

}

?>
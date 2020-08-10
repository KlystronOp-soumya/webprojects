<?php
 //script to process the registraions

 //destroy all sessions
 function destroy_sessions()
 {
    if(isset($_SESSION['user_email']))
    {
        session_destroy();
    }
 }
 function phone_number_format($number) {
    // Allow only Digits, remove all other characters.
    $number = preg_replace("/[^\d]/","",$number); //anything not a digit
    echo $number;
   // get number length.
    $length = strlen($number);
   
   // if number = 10
   if($length == 10) 
   {
    $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);//start to end
    }
    return $number;
   }
 function validate_email($umail)
	{
        $flag=false;
	   $domains=array("@gmail","@yahoo","@hotmail");
		for($i=0;$i<count($domains);$i++)
		{
		  $pos= strpos($umail, $domains[$i]);
          if(!empty($pos))
          {
			  $flag=true;
              break;
          }
		  else
			  $flag=false;
		}
		return $flag;
	}
 if(isset($_POST['sbmt']))
 {
     destroy_sessions();
     
    //establish the connection with the database
    require_once "dbconn.inc.php";

    //taking the values from the form
    $uname=mysqli_real_escape_string($conn, $_POST['ufname']);
    $umail=mysqli_real_escape_string($conn,$_POST['umail']);
    $uphone=mysqli_real_escape_string($conn,$_POST['uphone']);
    $upassword=mysqli_real_escape_string($conn,$_POST['upwd']);
    $confpwd=mysqli_real_escape_string($conn,$_POST['confpwd']);
    
        //call a function for the phonenumber formatting
        $formatted_uphone=phone_number_format($uphone);

        //mailvalidate
        $mailvalidate=validate_email($umail);

    //check for empty fileds
    if(empty($uname) || empty($umail) || empty($uphone) || empty($upassword))
    {
        echo"<script>alert('Empty Mandetory Filed');</script>";
        echo"<script>window.href='../index.php';</script>";
    }
    else if(!preg_match("/^[a-zA-Z]*$/",$uname)) //a-zA-Z otherwise won't take
    {
        //only contains a-z and A-Z not any numbers
          header("Location: ../index.php?name=invalid");
          exit();
    }
    elseif(strcmp($upassword,$confpwd)!=0)
    {
        echo"<script>alert('Password mismatch');</script>";
        echo"<script>window.location.href=' ../index.php';</script>";
    }
    elseif(!filter_var($umail,FILTER_VALIDATE_EMAIL)|| !$mailvalidate ) 
    {
         header("Location: ../index.php?email=invalid");
         exit();
     }
    else //if ab0ve criterias are satisfied
    {
       //hashing the password
       $hashedpwd=md5($upassword);
   
      $query="INSERT INTO bitpusers(UNAME,UMAIL,UPHONE,UPASSWORD)VALUES(?,?,?,?) ; ";//query to insert the values into database
            $stmt=mysqli_stmt_init($conn);
             if(!mysqli_stmt_prepare($stmt,$query))
             { 
               mysqli_close($conn);
               echo"system error";
               exit();
            }
             else
            {
            mysqli_stmt_bind_param($stmt,'ssss',$uname,$umail,$formatted_uphone,$hashedpwd);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_affected_rows($stmt); // or mysqli_stmt_get_result($stmt);
            if($result==1)
            {
                mysqli_close($conn);
                echo"<script>alert('Registerd Successfully');</script>";
                echo"<script>window.location.href=' ../index.php';</script>";
                
            }
            else
            { mysqli_close($conn);  
                echo"<script>alert('Not Registered');</script>";
                echo"<script>window.location.href=' ../index.php';</script>";
                
            }
        }
    }
  }

?>

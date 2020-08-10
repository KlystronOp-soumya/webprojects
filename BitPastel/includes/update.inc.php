<?php
//error_reporting(null);
 //script to process the updates
 function phone_number_format($number) {
    // Allow only Digits, remove all other characters.
    $number = preg_replace("/[^\d]/","",$number);
    echo $number;
   
    // get number length.
    $length = strlen($number);
   
   // if number = 10
   if($length == 10) {
    $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
    }
    return $number;
 }
 function validate_email($umail)
{
    $flag=false;
   $domains=array("@gmail","@yahoo","@hotmail");
    for($i=0;$i<count($domains);$i++)
    {
        $pos= strpos($umail, $domains[$i]);//check the position
        if(!empty($pos))//if any valid positive int
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
     session_start();
      if(isset($_SESSION))
     { //echo $_SESSION['user_email'];
        $old_mail=$_SESSION['user_email'];
        }

    require_once "dbconn.inc.php";
    $uname=$_POST['uname'];
    $umail=$_POST['umail'];
    $uphone=$_POST['uphone'];
    $filename=$_FILES["uploadfile"]["name"];
    $formatted_uphone=phone_number_format($uphone);
    $mailvalidate=validate_email($umail);

    //validating the inputs
    if(!filter_var($umail,FILTER_VALIDATE_EMAIL) || !$mailvalidate)
    {
        header("location: ../update.php?errorMail");
        exit();
    }
    elseif(empty($filename))
    {
        $sql="UPDATE BITPUSERS SET UNAME='$uname',UMAIL='$umail',UPHONE='$formatted_uphone' WHERE UMAIL='$old_mail';" ;
        $result=mysqli_query($conn,$sql);
        if($result)
        {
           $_SESSION['user_email']=$umail;//session set to new mailid
           header("Location: ../dashboard.php?updateSuccess");
        }
    }
   else
    { 
    $tmpname=$_FILES["uploadfile"]["tmp_name"];
    $folder="../tempupld/".$filename;
    move_uploaded_file($tmpname,$folder);

    $sql="UPDATE BITPUSERS SET UNAME='$uname', UMAIL='$umail' , UPHONE='$formatted_uphone',IMAGE_ADD='$folder' WHERE UMAIL='$old_mail';" ;
    $result=mysqli_query($conn,$sql);
    if($result)
    {
       $_SESSION['user_mail']=$umail;//session set to new mailid
       header("Location: ../dashboard.php?updateSuccess");
    }
  } 
 }
?>
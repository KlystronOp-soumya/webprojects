<?php
//login process script
session_destroy();//destroy all sessions
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
    require_once "dbconn.inc.php";
    $umail=mysqli_real_escape_string($conn,$_POST['umail']);
    $pwd=mysqli_real_escape_string($conn,$_POST['upwd']);
    $hashedpwd=md5($pwd);
      //mailvalidate
      $mailvalidate=validate_email($umail);
    if(empty($umail) || empty($pwd))
    {
        header("location: ../login.php?emptyFileds");
        exit();
    }
    elseif(!filter_var($umail,FILTER_VALIDATE_EMAIL) || !$mailvalidate)
    {
        header("location: ../login.php?errorMail");
        exit();
    }
   else
   {
       $query="SELECT * FROM BITPUSERS WHERE UMAIL=? AND UPASSWORD=?";
       $stmt=mysqli_stmt_init($conn);
       if(! mysqli_stmt_prepare($stmt,$query))
   {
       echo"system error";
   }
   else
   {  
    //can also be applied for the log in system validation
    mysqli_stmt_bind_param($stmt,'ss',$umail,$hashedpwd);
    mysqli_stmt_execute($stmt); //executed
    mysqli_stmt_store_result($stmt); //result is stored
    $result=mysqli_stmt_num_rows($stmt);//num of rows or fetched result is stored
    if($result>0)
    { 
        //if already exixting
       //START ASESSION WITH THE MAILID
       session_start();
       $_SESSION['user_email']=$umail;
       header("location: ../dashboard.php");
    }
    else
     {
        header("location: ../login.php?noExistingUser");
        exit(); 
     }
    }
 }
 mysqli_close($conn);
}
?>
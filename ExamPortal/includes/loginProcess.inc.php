<?php
if(isset($_POST['sbmt']))
{
    require_once 'dbconn.inc.php';

    
    $student_roll=mysqli_real_escape_string($conn,$_POST['stdrol']);
    $univ_roll=mysqli_real_escape_string($conn,$_POST['univrol']);

    
    if(!preg_match("/^[a-z0-9a-z]*$/",$student_roll))
    {
        header("Location: ../PortalLogin.php?name=invalid");
        exit();
    }
    else if(!preg_match("/^[0-9]*$/",$univ_roll))
    {
        header("Location: ../PortalLogin.php?roll=invalid");
        exit();
    }
    else
    {
   
     $query="SELECT STATUS FROM UNIVERSITY WHERE CLASS_ROLL=? AND UNIV_ROLL=? ;";
      $stmt=mysqli_stmt_init($conn);
      if(! mysqli_stmt_prepare($stmt,$query))
       {
        header("Location: ../PortalLogin.php?SystemError");
        mysqli_close($conn);
        exit;
         }
       else
     {  
   
   mysqli_stmt_bind_param($stmt,'ss',$student_roll,$univ_roll);
   mysqli_stmt_execute($stmt); 
   mysqli_stmt_store_result($stmt);
   $result=mysqli_stmt_num_rows($stmt);
   if($result>0)
   { 
       mysqli_stmt_bind_result($stmt,$status);
        if(!mysqli_stmt_fetch($stmt))
       {
        header("Location: ../PortalLogin.php?InternalErro");
        mysqli_stmt_free_result($stmt);
        mysqli_close($conn);
        exit;
       } 
       else if($status=='N')
       {

        header("Location: ../PortalRegistration.php?roll=".$student_roll);
        mysqli_stmt_free_result($stmt);
        mysqli_close($conn);
        exit;
       }
       else
       {
        header("location: ../checkResult.php?ExamAppeared&roll=".$student_roll);
        mysqli_stmt_free_result($stmt);
        mysqli_stmt_close($stmt);
        exit;
       }
       
    }
    else
    {
       header("location: ../PortalLogin.php?noExistingUser");
       mysqli_stmt_close($stmt);
       
    } 
   }
}
mysqli_close($conn);
exit;
}
?>
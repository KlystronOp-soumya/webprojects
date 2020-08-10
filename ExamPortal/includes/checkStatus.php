<?php

function check_status($link,$class_roll)
{
  $query="SELECT STATUS FROM UNIVERSITY WHERE CLASS_ROLL=? ;" ;
  $stmt=mysqli_stmt_init($link);
  if(! mysqli_stmt_prepare($stmt,$query))
  {
     echo "system error" ;
     exit ;   
  }
   else     
  {  
   
   mysqli_stmt_bind_param($stmt,'s',$class_roll);
   mysqli_stmt_execute($stmt); 
   mysqli_stmt_store_result($stmt);
   $result=mysqli_stmt_num_rows($stmt);
   if($result>0)
   { 
       mysqli_stmt_bind_result($stmt,$status);
        if(!mysqli_stmt_fetch($stmt))
       {
          echo"database error";
          
       } 
    } 
  }
  return $status;
  mysqli_stmt_free_result($stmt);
mysqli_stmt_close($stmt);
}

require_once 'dbconn.inc.php';
$class_roll=$_SESSION['student_roll'];
$st=check_status($conn,$class_roll);
if($st!='N')
{
       header("Location: ../checkResult.php?examGiven");
       mysqli_close($conn);
        exit;
   }
?>
<?php
if(isset($_SESSION))
{
    require_once 'dbconn.inc.php';
    $st="Y";
    $class_roll=$_SESSION['student_roll'];
    
    $query="UPDATE UNIVERSITY SET STATUS=? WHERE CLASS_ROLL=? ;  "; //time to be added later
    $stmt=mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo"database error";
        exit;
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"ss",$st,$class_roll);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $result=mysqli_stmt_affected_rows($stmt);// IN CASE OF SINGLE UPDATE 0 ROW AFFECTED
        if($result!=1)
        {
            echo "Record Saved!Wait for you result or click here <a href='../checkResult.php'>Check Result</a>";
            mysqli_stmt_free_result($stmt);
            mysqli_stmt_close($stmt);
            mysqli_close($conn);
            exit;
        }
      }
  }
  else
  {
      echo"no existing session";
      exit;
  } 

?>
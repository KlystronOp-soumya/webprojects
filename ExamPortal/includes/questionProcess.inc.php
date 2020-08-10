<?php
function store_result($link,$fetched_ans_code,$anscodes,$class_roll)
{
    $resultCounter=1;
    $flag=false;

    for($i=0;$i<count($fetched_ans_code);++$i)
    {
        $flag= $fetched_ans_code[$i]==$anscodes[$i];
        if( $flag)
        $resultCounter++;
    }
   $sql="INSERT INTO RESULTS(CLASS_ROLL,MARKS_OBT)VALUES(?,?) ;";
   $stmt=mysqli_stmt_init($link);
   if(!mysqli_stmt_prepare($stmt,$sql))
   {
       echo "system error";
       exit;
   }
   else
   {
       mysqli_stmt_bind_param($stmt,"si",$class_roll,$resultCounter);
       mysqli_stmt_execute($stmt);
       mysqli_stmt_store_result($stmt);
       $result=mysqli_stmt_affected_rows($stmt);
       if($result==1)
       echo "Record Saved!Wait for you result or click here <a href='../checkResult.php'>Check Result</a>";
       else
       echo"database error";
    }
}


if(isset($_POST['sbmt']))
{
    session_start();
    
    require_once 'examStatusChange.php';
    require_once 'dbconn.inc.php';
    
    $class_roll=$_SESSION['student_roll'];

 $anscodes=array_values($_POST['quizcheck']);
 $fetched_ans_code=array ();   

$keys= (array_keys($_POST['quizcheck']));
    foreach($keys as $qs_id)
    {
       
       $sql="SELECT RT_ANS_CODE FROM QUESTIONS WHERE QS_ID=? ;";
       $stmt=mysqli_stmt_init($conn);

       if(!mysqli_stmt_prepare($stmt,$sql))
         echo"error processing";
       else
       {
           mysqli_stmt_bind_param($stmt,"s",$qs_id);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $result=mysqli_stmt_num_rows($stmt);
           if($result>0)
           {
               mysqli_stmt_bind_result($stmt,$vals);
               if(mysqli_stmt_fetch($stmt))
                array_push($fetched_ans_code,$vals);
            }
        }
    }
    mysqli_stmt_free_result($stmt);
    mysqli_stmt_close($stmt);
   store_result($conn,$fetched_ans_code,$anscodes,$class_roll);
   mysqli_close($conn);
}

?>
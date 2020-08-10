<?php
require_once "dbconn.inc.php";
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
 //get the parameter from the url
 //$status="User Exists Already";
 $umail=mysqli_real_escape_string($conn,$_REQUEST["mail"]);
 $mailvalidate=validate_email($umail);
 if(filter_var($umail,FILTER_VALIDATE_EMAIL) || $mailvalidate)
{ //proper email then
   $query="SELECT UMAIL FROM BITPUSERS WHERE UMAIL=?;";
   $stmt=mysqli_stmt_init($conn);
   if(! mysqli_stmt_prepare($stmt,$query))
   {
       echo"system error";
   }
   else
   {  
    //can also be applied for the log in system validation
    mysqli_stmt_bind_param($stmt,'s',$umail);
    mysqli_stmt_execute($stmt); //executed
    mysqli_stmt_store_result($stmt); //result is stored
    $result=mysqli_stmt_num_rows($stmt);//num of rows or fetched result is stored
    if($result>0)
    { 
        //if already exixting
        $status="User Exists Already";
        echo $status;
        mysqli_close($conn);
        exit();
    }
    else
    {
        $status="OK";
        echo $status;
        mysqli_close($conn);

    }
  }
}

?>
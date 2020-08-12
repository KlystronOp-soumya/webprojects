<?php

if (isset($_POST["sbmt"]))
{
    include('dbconn.inc.php');
   $user=mysqli_escape_string($conn,$_POST['uname']);
   $email=mysqli_escape_string($conn,$_POST['umail']);

   $sql="SELECT * FROM USERS WHERE UNAME= '$user'  AND UMAIL= '$email' ; ";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)==1)
   {
     //if exists only one row
     $row=mysqli_fetch_assoc($result);
     echo"hello".$user."your password is:".$row['pwd'];
     mysqli_close($conn);
     mysqli_free_result($result);
     echo"<a href=' ../index1.html'><button> home</button></a>";
    
   }
  else
  {
      echo"0 result found";
      echo "check your credentials";
  }

}
else
{
    mysqli_close($conn);
    header('Location: ../forgetpass.html?err=nosubmission');
}

?>
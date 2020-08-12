<?php
 //login form process

 if(isset($_POST['login']))
 {
     require('dbconn.inc.php');

     $name=mysqli_real_escape_string($conn,$_POST['user']); //mail
     $pwd=mysqli_real_escape_string($conn,$_POST['pwd']); //password

     $sql="SELECT * FROM users WHERE umail=?;" ;
     $stmt=mysqli_stmt_init($conn);

     if(!mysqli_stmt_prepare($stmt,$sql))
     echo"system error";
     else
     {
        mysqli_stmt_bind_param($stmt,'s',$name);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);//getting the row
        
        $row=mysqli_fetch_assoc($result);
       
    
       if($row) //if name exists
        {
           //check for the password
          // password_verify($pwd,$row['upassword']);
            
           if( password_verify($pwd,$row['upassword'])) //true
           {
               session_start();

               $user=$row['uname'];
               $_SESSION['name']=$user;
               $_SESSION['email']=$name; //mail session is started
               //echo"<script>alert('succesfully loggedIN');</script>";
              header("Location: ../start.php?login=success&user=$user");
               exit();
           }
           else
           {
               header("Location: ../index1.html?error=pwdMismatch");
               exit();
           }
        }
        else
        {
            header("Location: ../index1.html?error=DBerr");
            exit();
        }
        

     }
     mysqli_close($conn);
 }



?>
<?php
function on_session($class_roll)
{
    session_start();
    $_SESSION['student_roll']=$class_roll;
}
function check_existance($link,$std_name,$std_email,$class_roll)
{
    $flag=false;
    $query="SELECT * FROM STUDENTS WHERE STD_NAME=? AND STD_EMAIL=? AND CLASS_ROLL=? ; ";
    $stmt=mysqli_stmt_init($link);
    if(!mysqli_stmt_prepare($stmt,$query))
    {
        header("Location: ../PortalRegistration.php?CheckError");
        mysqli_stmt_free_result($stmt);
        exit; 
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"sss",$std_name,$std_email,$class_roll);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt); //result is stored
        $result=mysqli_stmt_num_rows($stmt);//num of rows or fetched result is stored
        if($result>0)
        { 
              $flag=true;
              mysqli_stmt_free_result($stmt);

        }
    }
    //mysqli_close($link);
    return $flag;
}
if(isset($_POST['sbmt']))
{
    require_once 'dbconn.inc.php';
    

    //taking the variables
    $std_name=mysqli_real_escape_string($conn,$_POST['stdname']);
    $std_email=mysqli_real_escape_string($conn,$_POST['stdmail']);
    $class_roll=mysqli_real_escape_string($conn,$_POST['clsrol']);
    /* echo $std_name.",".$std_email.",".$class_roll; */
     //validation
    if(!preg_match("/^[a-zA-Z ]*$/",$std_name)) //name validation
    {
        header("Location: ../PortalRegistration.php?InvalidName");
        exit;
    }
    else if(!filter_var($std_email,FILTER_VALIDATE_EMAIL)) //email validation
    {
        header("Location: ../PortalRegistration.php?InvalidEmail");
        exit; 
    }
    else
    {
        if(check_existance($conn,$std_name,$std_email,$class_roll))//true
        {
            echo "<script>alert('User Exists-check your result');window.location.href='../checkResult.php?roll=$class_roll';</script>";
            exit;
        }
        else
        { 

       $query="INSERT INTO STUDENTS(std_name,std_email,class_roll)values(?,?,?) ; ";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt,$query))
        {
            header("Location: ../PortalRegistration.php?SystemError");
            mysqli_stmt_close($stmt);
            exit;
        }
        else
        {
            mysqli_stmt_bind_param($stmt,"sss",$std_name,$std_email,$class_roll);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_affected_rows($stmt);
            if($result==1)
            {
                //session start
                on_session($class_roll);
                echo"<script>alert('Regsitered');window.location.href='../showQuestion.php';</script>";
                //start session with the roll number and email;
                mysqli_stmt_close($stmt);
                mysqli_close($conn);
                exit;
            }
        }
    }
  }
}

?>
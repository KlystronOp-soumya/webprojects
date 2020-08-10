<?php
if(isset($_POST['sbmt']))
{
    require_once 'dbconn.inc.php';
    $class_roll=$_POST['clsrol'];
    $query="SELECT university.CLASS_ROLL,university.UNIV_ROLL,results.MARKS_OBT
            FROM university,results 
            WHERE university.CLASS_ROLL=results.CLASS_ROLL 
            AND university.CLASS_ROLL=?;";
   $stmt=mysqli_stmt_init($conn);
   echo" ";
   if(!mysqli_stmt_prepare($stmt,$query))
    {
        echo "sysytem error";
    }
    else
    {
        mysqli_stmt_bind_param($stmt,"s",$class_roll);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt); //one end ?>
<!doctype html>
<html>
<head>
<link rel="icon" href="../img/sitelogo.png" type="image/icon type">
<style>
table {
  border-collapse: collapse;
  width: 50%;
  border:2px solid red;
}


th, td {

  text-align: left;
  padding: 5px;
  border: 1px solid blueviolet;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>
<div style="overflow-x:auto;">
<center>
  <table>
    <tr>
      <th>Class Roll</th>
      <th>University Roll</th>
      <th>marks</th>
    </tr>

        <?php if($row=mysqli_fetch_array($result,MYSQLI_NUM))
        {  //second end ?>
          
    <tr>
      <td><?php echo $row[0] ;?></td>
      <td><?php echo $row[1] ;?></td>
      <td><?php echo $row[2] ;?></td>
     </tr>
     </table>
     </center>    
        
       <?php } 
         else
         echo "can not fetch"; 
         }
    }?> 
        
</body>
 </html> 

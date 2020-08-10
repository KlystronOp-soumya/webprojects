<?php
session_start();
if(isset($_SESSION))
$mail=$_SESSION['user_email'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dash Board</title>
</head>
<style>
  table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #deff8b}
tr:nth-child(odd){background-color: #e1ccec}

th {
  background-color: #fd5e53;
  color: white;
}
a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 8px 8px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
    </style>
<body>
 <?php
 function phone_number_reformat($phone)
 {
     $reformat=" ";
   //if preg_match("/^\d{3}\-\d{3}\-\d{4}$/",$phone);
    $arr=preg_split("/\-/",$phone);
    //print_r($arr);
    for($i=0;$i<count($arr);$i++)
    $reformat=$reformat.$arr[$i];
 
    $reformat=trim($reformat," ");
    return $reformat;
 }

 require_once "includes/dbconn.inc.php";
    $query="SELECT * FROM BITPUSERS WHERE UMAIL='$mail';";
    $result=mysqli_query($conn,$query);
    $resultcheck=mysqli_num_rows($result);
    if($resultcheck>0)
    { ?>
    <!-- html starts here-->
     <table border='2px' align='center' cellpadding='12px' cellspacing='0px'>
	    <tr>
	      <th>Profile Pic</th>
	      <th>Name</th>
	      <th>Mail</th>
          <th>Phone</th>
          <th colspan="3">Opeartions</th>
        </tr>
    <?php
    while($row = mysqli_fetch_array($result)) //or _fetch_assoc()
    {
      $row[5]=substr($row[5],3);
      $reformat=phone_number_reformat($row[3]);
        echo"<tr>
		  <td><img src='".$row[5]."'alt='profile pic' height='100px' width='100px'/></td>
		  <td>".$row[1]."</td>
		  <td>".$row[2]."</td>
          <td>".$reformat."</td>
         <td> <a href='update.php?nm=$row[1]&ml=$row[2]&ph=$reformat&pic=$row[5]'>EDIT</a></td>
         <td> <a href='index.php'>Home</a></td>
		  </tr>";
    }}
    else
    {
      echo"<h3>No data inside database</h3>";
      echo"<a href='index.php'>Home</a>";
    }
    ?>
 <!-- End of php codes-->   
 </body>
</html>
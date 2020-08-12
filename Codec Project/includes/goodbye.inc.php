<?php
session_start();
if(isset($_GET['Examend']))
{
	if(isset($_SESSION['Username']))
{
	$uid=$_SESSION['Username'];
	session_unset();
	echo "<script>alert('goodbye $uid')</script>";
}
 }
 else
 {
		if(isset($_SESSION['Username']))
{
	$uid=$_SESSION['Username'];
	session_unset();
	echo "<script>alert('goodbye $uid')</script>";
} 
 }
?>

<!DOCTYPE html>
<html>
<head>
 <script> 
   setTimeout(function(){window.top.location=" ../front-page.html"},50000);
     </script>
	<title>End Of Exam</title>
</head>
<body onload="redirect()">

	Wait for Your Result..

</body>
</html>
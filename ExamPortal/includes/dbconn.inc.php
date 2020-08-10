<?php
$server="localhost";
$user="root";
$password="";
$database="examportal";

$conn=mysqli_connect($server,$user,$password,$database);
if(!$conn)
die("can not connect to database").mysqli_connect_error();
/* else
echo "successful connection established"; */
?>
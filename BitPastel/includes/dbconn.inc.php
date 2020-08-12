<?php
 //php script to establish commection with the database

 //required vriables
 $server="localhost";
 $user="root";
 $password="";
 $database="bitpastel";

 //connection variable
 $conn=mysqli_connect($server,$user,$password,$database);

 //validation
 if(!$conn)
 {
     die("can not connect to database".mysqli_connect_error());
 }
 /*else
 {
     echo "established connection succssesfully";
 }*/

?>
<?php
  $server="localhost";
  $user="root";
  $pwd="";
  $databse="projectFNL";

  $conn=mysqli_connect($server,$user,$pwd,$databse);

  if(!$conn)
  {
      die('can not coneect to database'.mysqli_connect_error());
  }
  else
  {
      print("successful connection");
  }
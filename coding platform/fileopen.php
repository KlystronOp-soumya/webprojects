<?php
  $file=fopen('helloOutput.txt','r');
  //echo(fgets($file));
  $check=fgets($file);
  $op='0 2 4 6 8 10';
  echo strcmp($op,$check);
  fclose($file);
?>
<?php
 $pwd='1234';
 $hash='$2y$10$Y4pkKx..Pq9PwjNh0Rtvv.PUpv.A6MFFYz.dW2mf0v9bvBqP1bXu6';
 if(password_verify($pwd,$hash))
   echo "success";
   else
   echo"success";

?>
<?php
session_start();
session_unset($_SESSION['name']);

    if(!isset($_SESSION['name']))
    {
        echo"<script>
        alert('LogOut Successfully');
          window.location.href='index.html';
        
             </script>";
        
    }

?>
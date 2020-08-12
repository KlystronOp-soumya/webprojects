<?php
//this to show the php through ajax
session_start();
if (isset($_SESSION['name']))
{
    $uname=$_SESSION['name'];

    echo"<a href='http://thingspeak.com/channels/865794/charts/1'>Go</a>";
     //echo"<script>window.location.href='http://thingspeak.com/channels/865794/charts/1' ;</script>";
    //echo $uname;
}
else
echo "no session";
?>
<?php
session_start();

   if(isset($_SESSION['name']))
   {
      //in log in file user session is set
       $uname=$_SESSION['name'];
   }
   else
   {
     echo"No active session";
   }
?>


<!DOCTYPE html>
<html lang="en">
 <head>
   <title>start</title>
 <style>
body 
{
    background-color: #ff7675;

}
h3
{
  text-align: center;
    color: white;
    text-decoration: underline;
}

.nav 
{
    background-color: #7b61f8;
    float: right;
    padding: 15px;
    top: 30px;
}

.container 
{
  width:650px;
    height: 450px;
    border: 1px solid red;
    margin-left: 550px;
    margin-top: 80px;
    background: rgb(63,94,251);
background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(252,70,107,0.404096672848827) 100%);
box-shadow: 5px 5px 0px 0px #289FED, 10px 10px 0px 0px #5FB8FF, 15px 15px 0px 0px #A1D8FF, 20px 20px 0px 0px #CAE6FF, 25px 25px 0px 0px #E1EEFF, 0px 6px 12px 13px rgba(185,79,145,0);
}
.start 
{
  margin-left: 250px;
}

#show 
{
  margin-right: 40px;
  padding: 20px;
}
.push-button 
{
  display: inline-block;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background: rgb(61,62,177);
background: linear-gradient(197deg, rgba(61,62,177,1) 20%, rgba(175,163,26,1) 50%, rgba(209,59,115,0.9671218829328606) 84%);

  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}
.push-button:hover {background-color: #3e8e41}

.push-button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

</style>

<script type="text/javascript">
 function myAjax()
 {
 
     document.getElementById("show").innerHTML = '<iframe width="450" height="350" style="border: 1px solid #cccccc;" src="http://thingspeak.com/channels/865794/charts/1?dynamic=true"></iframe>';


 }

    </script>

 </head>
<body>
    <div class="nav">
  <!-- home and log out icon-->
  <a href="index.html"><button type="button" id="b1">Home</button></a>
  <a href="logout.php"><button type="button" id="b2">logout</button></a>
</div>
 <h3>hello <?php echo $uname ?></h3>
 <div class="container">
   <!--<img src="img/h3.gif" alt="gif" onclick="myAjax()"/>-->
   <div class="start"> 
     <button type="button" onclick="myAjax()" class="push-button" id="b3">Show</button>
     <button type="button" value="Reload Page" class="push-button" onclick="document .location.reload(true)">Refresh</button>
    </div>
       <div id="show">

       </div>
       <div id="">
</div>
 </body>
 </html>
<!--
<!DOCTYPE html>
<html>
<head>
   <title>Graph</title>

<script>
 function show(id)
{
    if(id=="1")
  {
      window.location.href="https://api.thingspeak.com/channels/865794/fields/HB";
   
    }
   else if(id=="2")
   {
      window.location.href="http://thingspeak.com/channels/865794/charts/1";
      
    }
   else
{
   alert("wrong id");

 }
}


</script>


</head>
<body>

<button type="button" id="1" onclick="show(this.id)">showData</button>
<button type="button" id="2" onclick="show(this.id)">showGraph</button>

<iframe width="450" height="250" style="border: 1px solid #cccccc;" src="http://thingspeak.com/channels/865794/charts/1"></iframe>




 </body>

 




 </html>-->



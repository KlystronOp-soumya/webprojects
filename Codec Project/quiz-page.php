<?php
require 'includes/dbh.inc.php';
   session_start(); //after login
   
   if(!isset($_SESSION['Username']))
   {
   	header('Location: ../log-in-page.html');
   }
  
   ?>
<!DOCTYPE html>
<!-- to be inserted into QuizControl Folder -->
<html>
   <head>
      <title>Quiz</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css"><!-- style sheet -->
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="
         https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      <style type="text/css">
         .animateuse{
         animation: leelaanimate 0.5s infinite;
         }
         @keyframes leelaanimate{
         0% { color: red },
         10% { color: yellow },
         20%{ color: blue }
         40% {color: green },
         50% { color: pink }
         60% { color: orange },
         80% {  color: black },
         100% {  color: brown }
         }
      </style>
	  <script>
	  //function to redirect to logout page
	   function redirect()
 {
   setTimeout(function(){window.top.location="includes/autoLogout.inc.php"},300000); //an automatic logout php code after 12 min,here after compiler to be added
   
  }
	    </script>
   </head>
   <body onload="redirect();"> <!-- autometic log out after 12 min if not submitted -->

    <div>
         <h1 class="text-center text-white font-weight-bold text-uppercase bg-dark" >  Complete Quiz Website using PHP and MYSQL using Session </h1><br>
      <div class="container "><br>
         <div class="container">
            <div class=" col-lg-12 text-center">
               <h3> <a href="#" class="text-uppercase text-warning"> <?php echo $_SESSION['Username']; ?>,</a> Welcome to Codec Test </h3>
            </div>
            <br>
            <div class="col-lg-8 d-block m-auto bg-light quizsetting ">
               <div class="card">
                  <p class="card-header text-center" > <?php echo $_SESSION['Username']; ?>, you have to select only one out of 4. Best of Luck <i class="fas fa-thumbs-up"></i></p>
               </div>
               <br>
			   
               <form action="includes/quizProcess.php" method="POST" >
                  <?php
			       
				    for($i=1;$i<6;$i++)
				 {
                     $sql = "SELECT * FROM questions WHERE qid =$i"; //q_id will be changed
                     	$result = mysqli_query($conn, $sql);
                     		if (mysqli_num_rows($result) >=1) {
                     						while($rows = mysqli_fetch_assoc($result)) { 
                     	?>				
                  <br>
                  <div class="card">
                     <br>
                     <p class="card-header">  <?php echo $i ." )". $rows ['question']; ?> </p> <!-- 1) question description -->
                    
                <?php
                        $sql = "SELECT * FROM answers WHERE ans_id =$i "; //q_id changed
                        	$result = mysqli_query($conn, $sql);
                        		if (mysqli_num_rows($result) >= 1) {
                        						while($rows = mysqli_fetch_assoc($result)) {
                        	?>	
                           
                     <div class="card-block">
                        <input type="radio" name="quizcheck[<?php echo $rows['ans_id']; ?>]"  value="<?php echo $rows['aid']; ?>" > 
						           <?php echo $rows['answer']; ?> 
                        <br> 
                     </div>
                     <?php
                        
                        } } 
                       
                        } }}
                        //the closing 
                     ?>
                  </div>

                  <br>
				  <!-- EXAM SUBMIT BUTTON-->
                  <input type="submit" name="submit" Value="Submit ANS." class="btn btn-success m-auto d-block" /> <br>
               </form>
			   
               <p id="letc"></p>
            </div>
            <br>
			   <form align="center" action="includes/ExamLogOut.inc.php" method="GET">
           <input type="submit" name="Examend" value="End"  class="btn btn-primary d-block m-auto text-white">
		       </form>
            <!-- <a href="includes/ExamLogOut.inc.php"  class="btn btn-primary d-block m-auto text-white" > End Here</a> <br> -->
         </div>
         <br>
         <footer>
            <h5 class="text-center"> &copy2018 Codec Services </h5> 
          </footer>
      </div>
	  
   </body>
</html>

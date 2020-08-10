<?php
 require_once 'includes/defcon.php';
 require_once 'includes/dbconn.inc.php';
 require_once 'includes/checkStatus.php'; 
 session_start();
 if(isset($_SESSION['student_roll']))
 {
   $name=$_SESSION['student_roll'];
 }
?>
<!doctype html>
<html>
<head>
    <title>Exam On</title>
    <link rel="icon" href="img/sitelogo.png" type="image/icon type">
</head>
<body>
  <center><h3><?php echo"Welcome ".$name; ?></h3></center>
<form action="includes/questionProcess.inc.php" method="POST">
 <?php
 $c=1;
 $question_query="SELECT QS_ID,QS_DESC FROM QUESTIONS LIMIT ".constant("NOQ");
 $question_results = mysqli_query($conn, $question_query);
    if (mysqli_num_rows($question_results)>=1) 
   {
       while($question_rows = mysqli_fetch_array($question_results)) 
    {?>

    <p class="card-header">  <?php echo  $c.") ". $question_rows[1]; ?> </p>
    
    <?php
       $qs=$question_rows[0];
       $ans_query = "SELECT * FROM answers WHERE qs_id = '".$qs."' ; ";
        $ans_results = mysqli_query($conn, $ans_query);
        if(mysqli_num_rows($ans_results) >= 1) 
        {
          while($ans_rows = mysqli_fetch_assoc($ans_results)) 
         { ?>
    <p><input type="radio" name="quizcheck[<?php echo $ans_rows['QS_ID']; ?>]"  value="<?php echo $ans_rows['ANS_CODE'];?>" />
                  <?php echo $ans_rows['ANS_OPTIONS']; ?></p> 
     
    <?php 
      }}
    ++$c;
    }}
    ?>
    <button type="submit" name="sbmt">Submit</button>



</body>

</html>



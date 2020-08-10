 <?php
    /*$command = ('hello.py');
    $output = shell_exec($command);
    echo $output;*/
    $code='';
$output='';

if(!empty($_POST)){
 $code = $_POST['editor'];
 $file = "run.py";
 file_put_contents($file, $code);
 
 //putenv("PATH=C:\xampp\php");
 
 //shell_exec("php run.php");
 
 $output = shell_exec("run.py");
 

}
?>
<style>
#editor{
width: 100%;
height: 400;
border: 3px solid black;
padding: 10;
outline: none;
overflow:hidden;
resize: none;
}
#output{
width: 100%;
height: 200;
border: 3px solid black;
padding: 10;
outline: none;
overflow:hidden;
resize: none;
border-top: none;
}
button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
button:hover {
  background-color: #008CBA;
  color: white;
}

</style>
<form action="" method=POST>
<h1 style="color:blue">Online C IDE</h1>
<p>
<textarea id=editor name=editor placeholder="C code"><?php echo $code; ?></textarea>
<br>
<textarea id=output name=output readonly><?php echo $output; ?></textarea>
<p>
<center>
<button type=submit>Compile &amp; Run</button>
</center>


</form>


<?php
$code='';
$output='';

if(!empty($_POST)){
 $code = $_POST['editor'];
 $file = "run.cpp";
 file_put_contents($file, $code);
 
 putenv("PATH=C:\Program Files (x86)\Dev-Cpp\MinGW64\bin");
 
 shell_exec("g++ run.cpp -o run.exe");
 
 $output = shell_exec("run.exe");
 

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


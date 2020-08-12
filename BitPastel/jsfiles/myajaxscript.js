var interval;
var result=null;
function existence_status(email)

{
 
    if(email.length==0)
    {
        document.getElementById("status").innerHTML="Status: ";
        return;
    }
    else
    {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if(this.readyState==4 && this.status==200)
            {
                document.getElementById("status").innerHTML=this.responseText; 
                result=this.responseText;
            }
        };
        xmlhttp.open("GET","includes/existinguser.inc.php?mail="+email,true);
        xmlhttp.send();
 }
}
interval = setInterval("getResult()", 1000);
// Alert the value of result and clear interval
function getResult()
{
    interval = clearInterval(interval);
// once we get a result, turn interval off. 
 if(result.startsWith("User"))
 {
 
 //alert(result); // we're clearly out of the onreadystatechange scope with our result.
  document.getElementById("mybutton").disabled=true;
  document.getElementById("suggestion").innerHTML="Try with another Mail id or try LogIn";
}
}
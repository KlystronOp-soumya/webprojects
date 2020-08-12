<!DOCTYPE html>
<html>
<head>
<title>login</title>
 <!-- Links for the required CDN and Libraries -->
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="styles/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Hello LogIn here</p>
                </div>
              <form action="includes/login.inc.php" method="post"> 
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                           <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="umail"  placeholder="Your Mail Id *"  onfocusout="existence_status(this.value)" required/>
                            </div>  
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="upwd"  placeholder="Your Password *"  required maxlength="8"/>
                            </div>   
                             </div>
                    </div>
                    <button type="submit" name="sbmt" id="mybutton" class="btnSubmit">login</button> 
                    <a href="index.php"><button type="button" class="btnSubmit">Register Now</button></a>  
                </div>
                </form>
            </div>
        </div>
    <footer>
<!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 1997 Copyright:
    <a href="#">Soumyadeep Paul</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->

</body>

</html>          
                           
                        
                          
                   
                    
                                     
                   
   
<!DOCTYPE html>
<!-- 
Required PHP files are inside "includes" folder
-->
<html> 
<head>
 <title>BitPastel Registration</title>
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
                    <p>Welcome! Register Here</p>
                </div>
              <form action="includes/signup.inc.php" method="post"> 
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>FName</label>
                                <input type="text" class="form-control" name="ufname"  placeholder="Your First Name *" value="" required/>
                            </div>
                           
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="umail"  placeholder="Your Mail Id *"  onfocusout="existence_status(this.value)" required/>
                            </div>
                            <p id="status"></p>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="tel" class="form-control" name="uphone"  placeholder="Phone Number *" value="" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="upwd"  placeholder="Your Password *"  required maxlength="8"/>
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" name="confpwd"  placeholder="Confirm Password *"  required maxlength="8"/>
                            </div>
                        </div>
                    </div>
                    <!-- script: to disbale the user with existing mailid -->
                    <script src="jsfiles/myajaxscript.js"></script>
                    <button type="submit" name="sbmt" id="mybutton" class="btnSubmit">Submit</button>
                    <a href="login.php"><button type="button" class="btnSubmit">LogIn</button></a>                    
                    <p id="suggestion"></p>
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
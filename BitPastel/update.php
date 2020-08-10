<?php
//error_reporting(null);
 //script to update the profiles
 $name=$_REQUEST['nm'];
 $mail=$_REQUEST['ml'];
 $phone=$_REQUEST['ph'];
 $picadd=$_REQUEST['pic'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <title>Update Profile</title>
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
                    <p>Update Yor Profile</p>
                </div>
              <form action="includes/update.inc.php" method="POST" enctype="multipart/form-data"> 
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name=" uname"  placeholder="Your First Name *" value="<?php echo $name; ?>" required/>
                            </div>
                           <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="umail"  placeholder="Your Mail Id *"   value="<?php echo $mail ;?>"required/>
                            </div>  
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                                <label>Phone</label>
                                <input type="tel" class="form-control" name="uphone"  placeholder="Your phone num *"   value="<?php echo $phone ;?>"required/>
                            </div>
                            <label>Your Current Profile Picture</label><br>
                            <img src="<?php echo $picadd;?>" alt="profilepic.jpeg" height="100px" width="100px"><br>
                            <p>Edit/Add</p>
                            <label style="color:green;font-weight:bold;font-size:14px;">Upload New Profile Picture</label>  
                           <input type="file" name="uploadfile" value=""/>
                             </div>
                    </div>
                    
                    <button type="submit" name="sbmt" id="mybutton" class="btnSubmit">update</button> 
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
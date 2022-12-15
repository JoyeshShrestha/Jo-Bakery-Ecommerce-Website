<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="designs/loginpage.css">
<link rel="stylesheet" href="designs/signinpage.css">
<link rel="stylesheet" href="main.css">

<link rel="stylesheet" href="https://maxcdn/bootstrapcdn.com/bootstrap/3.3.6/css/bootstap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>


<div class="alert alert-warning" role="alert">
  We will contact you for the confirmation of your order.
</div>

<form action="signup_db.php" onsubmit="return validateForm()" method="post">
  <div class="container">
  <a class="navbar-brand ms-4 logo text-center  " href="index.html"><h1>Jo-Bakery.</h1></a>
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <!-- <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required> -->
    
    <label for="address"><b>Address</b></label>
    <input type="text" placeholder="Enter Address" name="address" required>
    
    <!-- <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="email" style='width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;'required> -->
    
    <label for="phn"><b>Phone No</b></label>
    <input type="number" placeholder="Enter Number" name="phn" style='width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;' required>

<label for="phn"><b>Time</b></label>
    <input type="time" placeholder="Enter time" name="utime" style='width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;' required>
    
    <button type="submit" class="btn-danger" >Confirm Order</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn align-center" OnClick=" location.href='cart.php' " >Cancel</button>
    
  </div>
</form>



<script>
   
  //  function validateEmail() {
  //        var emailID = document.myForm.EMail.value;
  //        atpos = emailID.indexOf("@");
  //        dotpos = emailID.lastIndexOf(".");
         
  //        if (atpos < 1 || ( dotpos - atpos < 2 )) {
  //           alert("Please enter correct email ID")
  //           document.myForm.EMail.focus() ;
  //           return false;
  //        }
  //        return( true );
  //     }

function validateForm(){
      if( document.myForm.uname.value == "" ) {
         alert( "Please provide your name!" );
         document.myForm.Name.focus() ;
         return false;
      }
      //validate email
      if( document.myForm.email.value == "" ) {
         alert( "Please provide your Email!" );
         document.myForm.EMail.focus() ;
         return false;
      }
      else{
        var emailID = document.myForm.email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) {
            alert("Please enter correct email ID")
            document.myForm.EMail.focus() ;
            return false;
         }
      }
      if( document.myForm.pw.value == "" || isNaN( document.myForm.Zip.value ) ||
         document.myForm.Zip.value.length != 5 ) {
         
         alert( "Please provide a zip in the format #####." );
         document.myForm.Zip.focus() ;
         return false;
      }
      if( document.myForm.phn.value == "-1" ) {
         alert( "Please provide your country!" );
         return false;
      }
      return( true );
   
}
 
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
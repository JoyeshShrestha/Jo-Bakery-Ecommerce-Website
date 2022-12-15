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

<div class="container hmm text-center"> You can add product by entering below</div>
<div class="container">
<form action="added.php" method="post" >
  

  <div class="row">
  <label for="unameq" class="ry-2" >Product Name</label>

    <input type="text"  placeholder="" id="unameq" name="uname" required>
</div>

    <div class="row my-4">
    
    <label for="uprice" class="ry-2">Price</label>
    
    <input type="text" class="" id="uprice" name="uprice" required>
    </div>
    
    <button type="submit"  class="btn btn-success" Onclick="location.href='added.php'">Add Items</button>
    
 


    <button type="button" class="btn btn-danger align-center" OnClick=" location.href='dashboard.php' " >Cancel</button>
    
    </div>
</form>




   
  
 
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>


<style>
body{
    margin:200px;
    font: 2rem Raleway;
}

.hmm{
    font: 3rem Afterglow;
    margin-bottom:50px;
}
    </style>
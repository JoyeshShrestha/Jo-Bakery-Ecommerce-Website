<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Admin</title>
</head>
<body>

<header class="logo text-center mt-5 mb-5" style="font: 6rem 'Afterglow';">
<h1 class="">Jo-Bakery.Dashboard</h1>
</header>
<div class="container border-primary">
    <?php if (isset($_GET['error'])){?>
    <p class="error"><?php echo $_GET['error'];?></p>
    
    <?php } ?>
</div>
    <form action="loginadmin.php" method="post" class="container mt-4 border border-dark px-4 py-4">
<div class="mb-3 form-floating">
   



<input type="text" name="uname" class="form-control" id="floatingInput" placeholder="Enter ID">
  <label for="floatingInput">Admin Id</label>
  
</div>
<div class="mb-3 form-floating">
<input type="Password" name="password" class="form-control" id="floatingInput1" placeholder="Enter Password">
  <label for="floatingInput1">Password</label>
</div>  
<div class="text-center">
<button class="btn btn-outline-dark " type="submit">Submit</button> 
</div>
</form>


<footer class="container" style="margin-top: -30px;">
    <div class="row">
        <div class="col-4 mb-5 d-flex flex-row-reverse"><img src="imgback/ladys.png" alt=""></div>
        <div class="col-4 mt-5 pt-5"> 
            
        <div class=" text-center mt-5">

       
<div class="logo mt-4" style="font: 1.5rem 'Afterglow';">Jo-Bakery.</div>
<div class="lower mt-2 mb-5" style="font-size: 0.75rem ;">@2022 All right reserved.<br> Website by: Joyesh </div>
</div></div>

        <div class="col-4"><img src="imgback/guys.png" alt=""></div>

    </div>
</footer>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<style>
body{
    overflow: hidden;
}
.error{
    background:#f2dede;
    color: #A94442;
    padding: 10px;
    width:95%;

}
</style>
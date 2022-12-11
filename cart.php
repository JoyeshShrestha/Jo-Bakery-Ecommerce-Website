<?php
session_start();
$product_ids = array();
//session_destroy();

//check if add to cart button has been submitted
if(filter_input(INPUT_POST, 'add_to_cart')){
  echo '<script>alert("Item successfully added")</script>';
    if(isset($_SESSION['shopping_cart'])){

        //keep track of how many products in shopping cart
        $count = count($_SESSION['shopping_cart']);

        //create sequential array for matching array keys to product id's
        $product_ids = array_column($_SESSION['shopping_cart'],'id');
    
        if(!in_array(filter_input(INPUT_GET,'id'),$product_ids)){
            $_SESSION['shopping_cart'][$count] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
    
        }
        else{//product already exists, increase quantity
            //match array key to id of the product being added to the cart
            for($i=0; $i< count($product_ids);$i++){
                if($product_ids[$i]== filter_input(INPUT_GET, 'id')){
                    //add item quantity to the existing product in the array
                    $_SESSION['shopping_cart'][$i]['quantity']+=filter_input(INPUT_POST,'quantity');
                }
            }
        }


        // pre_r($product_ids);
    }
    else{ //if shopping cart doesnt exist, create first product with array key 0
        //create array using submitted form data, start from key 0 nd fill it with values
        $_SESSION['shopping_cart'][0] = array
        (
            'id' => filter_input(INPUT_GET, 'id'),
            'name' => filter_input(INPUT_POST, 'name'),
            'price' => filter_input(INPUT_POST, 'price'),
            'quantity' => filter_input(INPUT_POST, 'quantity')
        );

    }
}

if(filter_input(INPUT_GET, 'action')== 'delete'){
    //loop through all products in the shopping cart until it matches with GET id variable
    foreach($_SESSION['shopping_cart'] as $key => $product){
        if($product['id'] == filter_input(INPUT_GET, 'id')){
            //remove product from the shopping cart when it matches with the GET id
            unset($_SESSION['shopping_cart'][$key]);
            echo '<script>alert("Item removed successfully")</script>';
        }
    }
    //reset session array keys so they match with $product_ids numeric array
    $_SESSION['shopping_cart']= array_values($_SESSION['shopping_cart']);
}
//pre_r($_SESSION);

function pre_r($array){
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="main.css">

    <link rel="stylesheet" href="https://maxcdn/bootstrapcdn.com/bootstrap/3.3.6/css/bootstap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Shopping cart</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-light text-bg-light shadow ">
      <div class="container-fluid">
        <div class="logo">
          <a class="navbar-brand ms-4 " href="index.html">Jo-Bakery.</a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="d-flex othernav">
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active me-4" aria-current="page" href="#" id="#home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-4" href="#">About Us</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle me-4" href="#" role="button" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  Menu
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Bread</a></li>
                  <li><a class="dropdown-item" href="#">Smoothies</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Contact Us</a></li>
                </ul>
              </li>
              
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <div class="container-fluid fixed-bottom mb-5">
  <button class="btn btn-outline-danger align-center mycartbutton " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom"><img class="px-2 py-2 " src="img/icon/cart.png" alt=""></button>
  </div>    
  <a href="cart.php"><div class="container-fluid menu " >
    <div class="row">


      <div class="col  text-center   pb-5 " style="color: white; font-weight: 200; padding-top: 0px;" id="menus">
        <div style=" color:rgb(251, 251, 251); font-size: 7rem;" >
          Menu
        </div>
        <!-- <div class="icons"><img src="img/icon/facebook.png" alt=""></div> -->
      </div>

      <!-- <div class="col-6   text-center  align-middle border-start">
        <button type="button" class="btn btn-dark mt-4 buttonhover rounded text-center align-middle btn-lg" ><p style="font-size: 2rem;">Menu</p></button>
      </div> -->

    </div>


  </div></a>    
  <div class="container mt-5 " >
          <div class="row">
          
          <?php

            $connect = mysqli_connect('localhost','root','','cart');
            $query = 'SELECT * FROM product_tables ORDER BY id ASC';

            $result = mysqli_query($connect, $query);

            if($result):
                if(mysqli_num_rows($result)>0):
                    while($product_table = mysqli_fetch_assoc($result)):
                        // print_r($product_table);
                       ?>
                        <div class="col-sm-4 col-md-3 " >
                            <form method="post" action="cart.php?action=add&id=<?php echo $product_table["ID"]?>">
                            <div class="products" id="bgcol">
                                <h4 class="text second1heading"><?php echo $product_table['ProductName'];?></h4> 
                                <h4 class="secondheading">$ <?php echo $product_table['ProductPrice'];?></h4> 
                                <input type="text secondheading" name="quantity" class="form-control" value="1"/>
                                <input type="hidden" name="name" value="<?php echo $product_table['ProductName'];?>" />
                                <input type="hidden" name="price" value="<?php echo $product_table['ProductPrice'];?>" />
                                <input type="submit" name="add_to_cart" class="btn btn-danger my-3 " value="Add to Cart "/>
</div>
                            </form>
                        </div>

                         <?php
                    endwhile;
                endif;
            endif;
                
            
            ?></div>
            <div style="clear:both"></div>
            <br/>
            

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasBottom" aria-labelledby="offcanvasBottomLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasBottomLabel">My items</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body large">
  <div class=" container-fluid table-responsive">
                <table class="table">
                    <tr><th colspan="5"><h3>Order Details</h3></th></tr>
                    <tr>
                        <th width="40%">Product Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                        <th width="5%">Action</th>
        </tr>   
        <?php
        if(!empty($_SESSION['shopping_cart'])):
            $total = 0;
            
            foreach($_SESSION['shopping_cart'] as $key => $product):

            ?>

            <tr>
                <td><?php echo $product['name']; ?> </td>
                <td><?php echo $product['quantity']; ?> </td>
                <td>$ <?php echo $product['price']; ?> </td>
                <td>$ <?php echo number_format($product['quantity']*$product['price'],2); ?></td>
                <td>
                    <a href="cart.php?action=delete&id=<?php echo $product['id'];?>">
                    <div class="btn-danger"> Remove</div>
        </a>
        </td>
        </tr>
            <?php
                $total = $total + ($product['quantity']* $product['price']);
        endforeach;
        ?>
        <tr>
            <td colspan="3" align="right"> Total</td>
            <td align="right">$ <?php echo number_format($total, 2);?></td>

    </tr>
    <tr>
        <!-- Show checkout button only if the shopping cart is not empty-->
        <td colspan="5">
            <?php
                if (isset($_SESSION['shopping_cart'])):
                    if(count($_SESSION['shopping_cart'])>0):
                        ?>

                        <a href="signin.php" class="button"> Checkout </a>

                        <?php endif; endif; ?>
                    </td></tr>
                    <?php
                    endif;
                    ?>
                    </table>
                </div>
            </div>
  </div>
</div>


<div class=" container border-top">

<div class="container pt-5 mb-5">
  <div class="row mt-5">
    <div class="col-4 text-left Subheading border-end">

      
      <div class=" mt-4 pb-3 border-bottom">About</div>
      <div class=" mt-3 pb-3 border-bottom">Menu</div>
      <div class=" mt-3">Follow us:</div>
      <div class="row mt-3 container-fluid">
        <div class="col-4"><img src="img/icon/face.png" alt=""></div>
        
        <div class="col-4"><img src="img/icon/insta.png" alt=""></div>
        
        <div class="col-4"><img src="img/icon/twit.png" alt=""></div>
      </div>
    </div>
    <div class="col-4 text-left border-end">
    
      
      <div class=" mt-4 pb-3 border-bottom">Contact</div>
      <div class="lower mt-2 mb-5">Naxal <Br>
      Kathmandu, Nepal<Br>
      P.O. Box 6969<Br>
      +977 1 545454756/87<Br>
      sales@jobakery.com  <Br>
    </div>
    </div>
    <div class="col-4 text-center">

     
      <div class="logo mt-4">Jo-Bakery.</div>
      <div class="lower mt-2 mb-5" style="font-size: 0.75rem ;">@2022 All right reserved.<br> Website by: Joyesh </div>
    </div>
  </div>
</div>
</div> 
            
            
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

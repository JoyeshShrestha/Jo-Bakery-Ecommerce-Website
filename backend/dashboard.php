<?php
session_start();

if(isset($_SESSION['ID']) && isset($_SESSION['user_name'])){
?>



<!DOCTYPE html>
<html lang="en">
<head><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cart.css">
    <link rel="stylesheet" href="main.css">

    <link rel="stylesheet" href="https://maxcdn/bootstrapcdn.com/bootstrap/3.3.6/css/bootstap.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <header class="container ms-5 py-3 px-3 border-bottom border-success row">
        <h1 class="hello col-4"> Hello, <?php echo $_SESSION['name'] ?></h1>
    <div class="col-6 tophead text-center">Jo-Bakery.Dashboard</div>
    <div class="col-1"><a class="col-6" href="Additems.php"> <div class="btn btn-success ">Add</div></a></div>
    <div class="col-1 ps-4"> <a class="btn btn-outline-danger" href="index.php">Logout</a></header>
    </div>



<?php 
}else{
    header("Location: Dashboard.php");
    exit(); 
}
?>
<?php

$product_ids = array();
//session_destroy();

//check if remove to cart button has been submitted
if(filter_input(INPUT_POST, 'remove')){
  echo '<script>alert("Item successfully deleted")</script>';
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







   

<div class="container my-5">
    <!-- <div class="row ">
        <div class="col-4 hello text-center" style="font-size:2rem;">Click Here to add products</div> -->

</div></div>
  <div class="container mt-5 " >
    
          <div class="row ">
          
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
                            <form method="post" action="remove.php?action=remove&id=<?php echo $product_table["ID"]?>">
                            <div class="products" id="bgcol">
                            
                                
                                <h4 class="text asecond1heading" id="neme" name="pname"><?php echo $product_table['ProductName'];?></h4> 
                                <h4 class="asecondheading" id="prece">$ <?php echo $product_table['ProductPrice'];?></h4> 
                                <input type="text asecondheading" name="quantity" class="form-control" value="1"/>
                                <input type="hidden" name="idd" value="<?php echo $product_table['ID'];?>" />
                                <input type="hidden" name="name" value="<?php echo $product_table['ProductName'];?>" />
                                <input type="hidden" name="price" value="<?php echo $product_table['ProductPrice'];?>" />
                                <input type="submit" name="remove" class="btn btn-danger my-3 " OnClick=" location.href='remove.php'" value="Delete"/>
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



            
            
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

    <style>
.hello{
    font: 2rem 'Raleway';
}

.tophead{
    font: 2rem 'Afterglow';
}

.additems{
    margin-top:500px;
    margin-left:1150px;
    font-size: 2rem;
    width: 75px;
    height: 75px;
}
        </style>
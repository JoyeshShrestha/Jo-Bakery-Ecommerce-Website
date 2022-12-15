<?php
// session_start();


$name = $_POST['uname'];
$price = $_POST['uprice'];



    $hosts = "localhost";
    $users = "root";
    $passs = "";
    $dbnames= "cart";


    $conn = mysqli_connect($hosts, $users, $passs, $dbnames) or die();
    if (!$conn){
        echo "failed";
    }


//     $sql = "INSERT INTO userinfo(Name,  Address, PhoneNo, Time) VALUES('$name','$address','$phoneno','$time')";
// $result = mysqli_query($conn, $sql);

// echo $name;
// header('Location:dashboard.php');
// include 'dbproducts.php';

$sql = "INSERT INTO product_tables(ProductName, ProductPrice) VALUES('$name','$price') ";
$result = mysqli_query($conn, $sql);


if($result){
    header('Location:dashboard.php');
}

?>
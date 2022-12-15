<?php
session_start();

$name= $_POST['idd'];


// // $password = $_POST['psw'];
// $address= $_POST['address'];
// // $email=  $_POST['email'];
// $phoneno= $_POST['phn'];

// $time= $_POST['utime'];
// echo "Name ".$name;


include 'dbproducts.php';

$sql = "DELETE FROM product_tables WHERE ID = '$name'";
$result = mysqli_query($conn, $sql);


if($result){
    header('Location:dashboard.php');
}

?>
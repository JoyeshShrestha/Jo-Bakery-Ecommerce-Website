<?php
$name = $_POST['uname'];
// $password = $_POST['psw'];
$address= $_POST['address'];
// $email=  $_POST['email'];
$phoneno= $_POST['phn'];

$time= $_POST['utime'];
echo "Name ".$name;


include 'db.php';

$sql = "INSERT INTO userinfo(Name,  Address, PhoneNo, Time) VALUES('$name','$address','$phoneno','$time')";
$result = mysqli_query($conn, $sql);


if($result){
    header('Location:cart.php');
}
?>
<?php
include "../db.php";
// echo "<script>alert(hi);</script>";
// if(isset($_POST['cart'])&&isset($_POST['quantity']))
// {


$cart=$_POST["cart"];
$newQuantity=$_POST["quantity"];
 $price=$_POST["price"];
// echo "<script>alert($cart)/<script>" ;
// echo "<script>alert('a');</script>";
$sql="UPDATE `cart` SET `stock`='$newQuantity',`price`='$price' WHERE id='$cart'";
$res=mysqli_query($conn,$sql);
// }

?>
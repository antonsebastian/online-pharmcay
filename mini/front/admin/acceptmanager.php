<?php
include '../db.php';
if(!isset($_SESSION['uname'])){
    header('Location:../login.php');
}




if(isset($_GET['accept']))
{
$mname=$_GET['accept'];

$sql="UPDATE `login` SET `usertype`='1' WHERE email = '$mname' ";
$sql2="UPDATE `manager` SET `value`='1' WHERE memail = '$mname' ";
$res=mysqli_query($conn,$sql);
$res2=mysqli_query($conn,$sql2);
if($res)
{
    header('location:managerview.php');
}

}
if(isset($_GET['reject']))
{

    $mname=$_GET['reject'];

$sql="UPDATE `login` SET `usertype`='5' WHERE email = '$mname' ";
$sql2="UPDATE `manager` SET `value`='5' WHERE memail = '$mname' ";
$res=mysqli_query($conn,$sql);
$res=mysqli_query($conn,$sql2);
if($res)
{
    header('location:managerview.php');
}
   
}
else{
    die(mysqli_error($conn));
}

?>
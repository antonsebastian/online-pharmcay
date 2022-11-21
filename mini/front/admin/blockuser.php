<?php
include '../db.php';
if(!isset($_SESSION['uname'])){
    header('Location:login.php');
}




if(isset($_GET['block']))
{
$user=$_GET['block'];

$sql="UPDATE `login` SET `usertype`='8' WHERE email = '$user' ";
$sql2="UPDATE `regst` SET `status`='Blocked' WHERE email = '$user' ";
$res=mysqli_query($conn,$sql);
$res2=mysqli_query($conn,$sql2);
if($res)
{
    header('location:userview.php');
}

}


if(isset($_GET['unblock']))
{
$user=$_GET['unblock'];

$sql="UPDATE `login` SET `usertype`='6' WHERE email = '$user' ";
$sql2="UPDATE `regst` SET `status`='Active' WHERE email = '$user' ";
$res=mysqli_query($conn,$sql);
$res2=mysqli_query($conn,$sql2);
if($res)
{
    header('location:userview.php');
}

}

else{
    die(mysqli_error($conn));
}

?>
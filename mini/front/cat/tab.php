<?php
    session_start();
    $_SESSION['cat']="SELECT * FROM `tbl_product` WHERE `catagory`='Tablet'";
    header("location: ../home.php");
?>
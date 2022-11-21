<?php
    session_start();
    $_SESSION['cat']="SELECT * FROM `tbl_product` WHERE `catagory`='Selfcare'";
    header("location: ../home.php");
?>
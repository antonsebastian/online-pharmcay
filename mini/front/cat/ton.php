<?php
    session_start();
    $_SESSION['cat']="SELECT * FROM `tbl_product` WHERE `catagory`='Tonic'";
    header("location: ../home.php");
?>
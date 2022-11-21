<?php
    session_start();
    $_SESSION['cat']="SELECT * FROM `tbl_product` WHERE `catagory`='Other'";
    header("location: ../home.php");
?>
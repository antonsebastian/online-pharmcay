<?php
    session_start();
    $_SESSION['cat']="SELECT * FROM `tbl_product`";
    header("location: ../home.php");
?>
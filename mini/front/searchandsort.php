<?php
include "db.php";
// echo "<script>alert(hi);</script>";
// if(isset($_POST['cart'])&&isset($_POST['quantity']))
// {


$search = $_POST["search"];

// echo "<script>alert($cart)/<script>" ;
// echo "<script>alert('a');</script>";
$sql = "SELECT * FROM `tbl_product` where pname like '$search%'";
$run = mysqli_query($conn, $sql);
$row=mysqli_num_rows($run);
if($row==0)
{
    
    echo '<div class="d-flex justify-content-center"><img src="images/1.gif" class=" "/></div>';
}
else{
    while ($ru = mysqli_fetch_assoc($run)) {
        $productname = $ru['pname'];
        $pid = $ru['id'];
        $price = $ru['price'];
        $catagory = $ru['catagory'];
        $description = $ru['description'];
        $image = $ru['image'];
        $discount = $ru['discount'];
        $a = ($discount / 100) * $price;
        $actualprice = $price - $a;
    
    
    
        echo ' 
    <div class="row layout_padding2">
    <div class="col-md-8">
    <div class="fruit_detail-box">
    <h3 id="heroname">
    ' . $productname . '
    </h3>
    <h6 id="heroname">
            ' . $description . '
          </h6>
    <p class="mt-4 mb-5">
    
    <h4>Price: ' . number_format($price) . '<br></h4>
    </p>
    <div>
    <form method="post" action="">
    <input type="hidden" name="productid" value="' . $pid . '">
    <button type="sumbit" name="valsub" class="custom_dark-btn" id="viewbtn">
    View
    </button>
    </form>
    </div>
    </div>
    </div>
    <div class="col-md-4 d-flex justify-content-center align-items-center">
    <div class="fruit_img-box d-flex justify-content-center align-items-center">
    <img src="admin/products/' . $image . '" alt="" class="" width="300px" />
    </div>
    </div>
    </div>';
    }
    
    
}
?>

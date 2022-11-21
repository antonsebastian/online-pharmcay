<?php
include "../db.php";
$update=false;
// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location: index.php');
}

$n=$_SESSION['uname'];


if(isset($_POST['submit']))
{

$productname=$_POST['pname'];
$price=$_POST['price'];
$catagory=$_POST['catagory'];
$description=$_POST['description'];
$stock=$_POST['stock'];
$img_name=$_FILES['image']['name'];
$target_dir="products/";
$target_file=$target_dir.basename($_FILES['image']['name']);
$img_type=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$extension_array=array("jpg","jpeg","png");
if(in_array($img_type,$extension_array)){
  
  //$img_bases64= base64_encode(file_get_contents($_FILES['image']['tmp_name']));
  //$image='data:image/'.$img_type.';base64,'.$img_bases64;
  $sql2 = "INSERT INTO `tbl_product`(`pname`, `price`, `catagory`, `description`, `stock`,`image`, `date`) VALUES ('$productname','$price','$catagory','$description','$stock','$img_name',current_timestamp())";

  //INSERT INTO `tbl_product` (`pname`, `price`, `catagory`, `description`, `stock`, `image`, `date`, `discount`) VALUES ('jhg', '5', 'ghh', 'rrr', '9', 'fdf', '2022-11-16', '');


  move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$img_name);
  
  $run=mysqli_query($conn,$sql2);
  echo '<script>var error=0;</script>';
}
else{
  echo '<script>var error=1;</script>';
}
}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  

  <title>Pharmative</title>
  <link rel="icon" type="image/x-icon" href="../images/022.png">

  <!-- slider stylesheet -->
  <!-- JavaScript Bundle with Popper -->
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
    <style>
  .header_section{
    background-color:   #393D47;
    color:#fff;

  }
  .nav-link {
    color:white;
  }
  #shop{
    color:#E2DFD2;
  }
  #shop:hover{
    color:#fff;
  }
</style>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style2.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<script>
         function showerr()
            {
                document.getElementById("time").style.visibility="visible";
    
            }
            setTimeout("showerr()",0);
    
            function hideerr()
            {
                document.getElementById("time").style.visibility="hidden";
    
            }
            setTimeout("hideerr()",3000);
          </script>
<body>
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.php">
          <img src="images/icon/fuel1.png" alt="" width="70px" height="60px">&ensp;
            <span id="shop">
             <marquee> EASYMED</marquee>
            </span>
           
          </a>
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

     

        </nav>
      </div>
      
    </header>


      
   
    <div class="container">
  
  <section class="panel panel-default">
<div class="panel-heading m-5"> 


<h3 class="panel-title">Add products</h3> 
</div> 
<div class="panel-body">
  
<form action="addproduct.php" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">

<!-- form-group // -->

   <div class="form-group">
    <label for="name" class="col-sm-3 control-label">Product Name</label>
    <div class="col-sm-9">
      <input type="text" class="form-control" name="pname" id="name" placeholder="Enter Product Name">
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="name" class="col-sm-3 control-label">Price</label>
    <div class="col-sm-9">
      <input type="Number" class="form-control" name="price" id="name" placeholder="Price">
    </div>
    <div class="form-group">
    <label for="tech" class="col-sm-3 control-label">Catagory</label>
    <div class="col-sm-3">
   <select class="form-control" name="catagory">
  <option value="" required>Select</option>
  <option value="Tonic">Tonic</option>
  <option value="Tablet">Tablet</option>
  <option value="Selfcare">Selfcare</option>
  <option value="Other">Other</option>
   </select>
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="about" class="col-sm-3 control-label" >Description</label>
    <div class="col-sm-9">
      <textarea class="form-control" name="description"></textarea>
    </div>
  </div> <!-- form-group // -->
  <div class="form-group">
    <label for="qty" class="col-sm-3 control-label">Quantity</label>
    <div class="col-sm-3">
   <input type="text" class="form-control" name="stock" id="qty" placeholder="PCS.">
    </div>
  </div> <!-- form-group // -->
   <!-- form-group // -->
  <div class="form-group">
    
    <div class="col-sm-3">
      <label class="control-label small" for="file_img">Picture (jpg/png):</label> <input type="file" name="image">
    </div>
  
   
  </div> <!-- form-group // -->
  
  </div> <!-- form-group // -->
  <hr>
  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
      <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </div>
  </div> <!-- form-group // -->
</form>
  
</div><!-- panel-body // -->
</section><!-- panel// -->

  
</div> <!-- container// -->
<script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
    </body>
  </head>
</html>
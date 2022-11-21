<?php
include "db.php";
$update = false;
$priceq = false;
$success = false;
$productalreadyexist = false;

// Check user login or not
if (!isset($_SESSION['uname'])) {
  header('Location: login.php');
}

// logout
if (isset($_POST['but_logout'])) {
  session_destroy();
  header('Location: index.php');
}
$n = $_SESSION['uname'];
// $q="select useremail from regst where username='".$n."'";

// $result = mysqli_query($conn,$q);
// //echo $result;
// $row = mysqli_fetch_array($result);
// $count = $row['useremail'];

//echo "Your Email is  $count";
$produc = $_SESSION['pid'];
//echo "$produc";

if (isset($_POST['submit'])) {
  $stockof = $_POST['poststock'];
  $priceof = $_POST['postprice'];
  $pname = $_POST['pname'];
  $productid = $_POST['pid'];
  $usr = $_POST['username'];
  $img = $_POST['image'];
  $cat = $_POST['cat'];
  $price = $_POST['realprice'];
  $stock = $_POST['realstock'];
  // echo "$productid";
  //$disc=$_POST['discount'];
  $checkcart = "select count(*) as cnt from `cart` where product_id='$productid' and username='$usr'";
  $query = mysqli_query($conn, $checkcart);
  $ro = mysqli_fetch_array($query);
  $cnt = $ro['cnt'];
  //echo "$cnt";
  if ($cnt == 0) {


    $cart1 = "INSERT INTO `cart`(`username`,`realstock`,`realprice`,`product_id`,`productname`, `stock`, `price`, `image`) VALUES ('$usr','$stock','$price','$productid','$pname','$stockof','$priceof','$img')";
    $execcart = mysqli_query($conn, $cart1);

    $success = true;
  } else {
    $productalreadyexist = true;
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->


  <title>PHARMATIVE</title>
  <link rel="icon" type="image/x-icon" href="./images/022.png">

  <!-- slider stylesheet -->
  <!-- JavaScript Bundle with Popper -->
  <!-- CSS only -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  
  <style>
    section {
      background-color: #fff;
    }

    header {
      background-color: #fc5d35;
    }

    .header_section {
      background-color: #fff;
      color: #fff;

    }

    .nav-link {
      color: white;
    }

    #shop {
      color: #292727;
    }

    #shop:hover {
      color: #fff;
    }

    #btndesign {
      border: none;
      background-color: #292727;
      border-color: #fff;
      color: #fff;
    }

    #btndesign:hover {
      background-color: #fff;
      border-color: #fc5d35;
      color: #fc5d35;
    }

    .crouselcontrol {
      background: red;
    }
  </style>
  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>
<script>
  function showerr() {
    document.getElementById("time").style.visibility = "visible";

  }
  setTimeout("showerr()", 0);

  function hideerr() {
    document.getElementById("time").style.visibility = "hidden";

  }
  setTimeout("hideerr()", 3000);
</script>

<body>
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section" style="background-color: #DB3044;">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="#">
            <span id="shop">
              EASYMED
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active ">
                  <a class="nav-link position-relative" href="home.php"><i class="fa fa-home" style="font-size:18px"></i>HOME</a>
                </li>
                <li class="nav-item active ">


                  <a class="nav-link position-relative" href="admin/viewcart.php"><i class='fas fa-cart-arrow-down' style='font-size:18px'></i> cart</a>
                 
                </li>


              </ul>

            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <form method='post' action="">

                <button type="submit" id="btndesign" class="btn btn-warning" name="but_logout">Logout</button>

              </form>

            </div>
          </div>


        </nav>
      </div>

    </header>



    <div>

      <!-- update profile -->
      <!-- update profile -->
      <!-- update profile -->
      <!-- update profile -->
      <!-- update profile -->
      <div class="displayproducts">
        <section class="fruit_section">

          <div class="container">
            <h2 class="custom_heading">Shop</h2>
            <p class="custom_heading-text">
              Shop now
            </p>
            <?php
            if ($success) {

              echo ' <div class="w-50 "><div class="alert alert-success 
      alert-dismissible fade show" role="alert" id="time" style="visibility:hidden"> 
  <strong>Alert!</strong> Product added to cart </div>

 
 </div> ';
            }
            ?>
            <?php

            if ($productalreadyexist) {

              echo ' <div class="w-50 "><div class="alert alert-warning 
        alert-dismissible fade show" role="alert" id="time" style="visibility:hidden"> 
    <strong>Alert!</strong> Product already exist in cart</div>
  
   
   </div> ';
            }

            ?>

            <?php

            $sql = "select * from tbl_product where id='$produc'";
            $run = mysqli_query($conn, $sql);
            $ru = mysqli_fetch_array($run);
            $pid = $ru['id'];
            $productname = $ru['pname'];
            $price = $ru['price'];
            $stock = $ru['stock'];
            $catagory = $ru['catagory'];
            $description = $ru['description'];
            $image = $ru['image'];





            // $va=$_COOKIE['item'];
            // $prices=$_SESSION['f'];

            ?>
            <script>
              var total = <?php echo "$price"; ?>
            </script>
            <script>
              var stock = <?php echo "$stock"; ?>
            </script>



            <div class="row layout_padding2">
              <div class="col-md-8">
                <div class="fruit_detail-box">
                  <h3 id="heroname">
                    <?php echo "$productname"; ?>
                  </h3>
                  <p class="mt-4 mb-5">

                  <h2>Price: <b><?php $pricee = number_format($price);
                                echo "$pricee"; ?></b>/-<br></h2>


                  </p>
                  <span id="stock" style="color:red"></span><br>
                  quantity:<nav aria-label="Page navigation example" style="color:black" id="counter">
                    <ul class="pagination">
                      <li class="page-item"><button class="page-link" onclick="decrease()">-</button></li>
                      <li class="page-item"><a class="page-link"><span id="count">1</span></a></li>


                      <li class="page-item"><button class="page-link" onclick="increase()">+</button></li>
                    </ul>

                  </nav>
                  Total:<h3 style="color:red"><span id="total"><?php $pricee = number_format($price);
                                                                echo "$pricee"; ?></span></h3>
                  <div>


                    <form action="cart.php" method="post">

                      <input type="hidden" id="poststock" name="poststock" value="">
                      <input type="hidden" id="postprice" name="postprice" value="">
                      <input type="hidden" id="pname" name="pname" value="<?php echo $productname; ?>">
                      <input type="hidden" id="pid" name="pid" value="<?php echo $pid; ?>">
                      <input type="hidden" id="cat" name="cat" value="<?php echo $catagory; ?>">
                      <input type="hidden" id="image" name="image" value="<?php echo $image; ?>">
                      <input type="hidden" id="username" name="username" value="<?php echo $n; ?>">
                      <input type="hidden" id="realprice" name="realprice" value="<?php echo $price; ?>">
                      <input type="hidden" id="realstock" name="realstock" value="<?php echo $stock; ?>">
                      
                      



                      <button id="" name="submit" type="submit" class="btn btn-secondary" id="viewbtn">
                        Add to Cart
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="container" style="width: 300px">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                  <div class="fruit_img-box d-flex justify-content-center align-items-center">
                    <img src="admin/products/<?php echo "$image"; ?>" alt="" class="" width="300px" />
                  </div>
                </div>
              </div>
            </div>
          </div>


      </div>
    </div>


    <!-- Modal -->




    <!-- view profile -->
    </form>
    <!-- Modal -->
    <script>
      total = parseInt(total);
      var tot = total;
      var item = 1;
      if (stock == 0) {
        document.getElementById("counter").style.display = "none"
        document.getElementById("stock").innerHTML = "Out of Stock";
        document.getElementById("viewbtn").innerHTML = "check later";
        //document.getElementById("viewbtn").style.pointer-events="none";
      } else {
        document.getElementById("count").innerHTML = item;
        document.getElementById("poststock").value = item;
        document.getElementById("postprice").value = total;
        document.getElementById("stock").innerHTML = "";
      }


      function decrease() {



        if (item <= 1) {
          window.item = 1;
          // document.cookie='item='+item;
          document.getElementById("count").innerHTML = item;
          document.getElementById("poststock").value = item;
          document.getElementById("postprice").value = total;
          document.getElementById("stock").innerHTML = "";

          // document.cookie='itemcount'=+item;
        } else {
          window.item = item - 1;
          document.cookie = 'item=' + item;

          total = parseInt(total);
          total = total - tot;
          price = total.toLocaleString('en-IN');
          document.getElementById("count").innerHTML = item;
          document.getElementById("poststock").value = item;
          document.getElementById("postprice").value = total;
          document.getElementById("total").innerHTML = price;
          document.getElementById("stock").innerHTML = "";

          // document.write(item);
          // function add();
        }
        // document.cookie='itemcount'=+item;

      }

      function increase()

      {

        if (item >= stock) {
          window.item = stock;
          document.cookie = 'item=' + item;
          document.getElementById("count").innerHTML = item;
          document.getElementById("poststock").value = item;
          document.getElementById("postprice").value = total;
          document.getElementById("stock").innerHTML = "This is the maximum stock u can buy";
          //
        } else {
          document.getElementById("stock").innerHTML = " ";
          window.item = item + 1;
          //document.cookie='item='+item;

          total = parseInt(total);
          //var tot=total;
          total = tot * item;

          price = total.toLocaleString('en-IN');
          document.getElementById("count").innerHTML = item;
          document.getElementById("poststock").value = item;
          document.getElementById("postprice").value = total;
          document.getElementById("total").innerHTML = price;

        }
      }
    </script>

    <script>
      function showerr() {
        document.getElementById("time").style.visibility = "visible";

      }
      setTimeout("showerr()", 0);

      function hideerr() {
        document.getElementById("time").style.visibility = "hidden";

      }
      setTimeout("hideerr()", 3000);
    </script>




    <script>
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    </script>
</body>
<!-- Button trigger modal -->

</html>


<?php
include "../db.php";
$update = false;

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

if(isset($_POST['del']))
{
  $del=$_POST['deleteval'];
  $sql="delete from cart where id='$del'";
  $runn=mysqli_query($conn,$sql);

}
?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->


  <title>EASYMED</title>
  <link rel="icon" type="image/x-icon" href="../images/022.png">
  <!-- slider stylesheet -->
  <!-- JavaScript Bundle with Popper -->
  <!-- CSS only -->
  <!-- <script src="js/jquery2.0.3.min.js"></script> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.js" integrity="sha512-CX7sDOp7UTAq+i1FYIlf9Uo27x4os+kGeoT7rgwvY+4dmjqV0IuE/Bl5hVsjnQPQiTOhAX1O2r2j5bjsFBvv/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <style>
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
      color: #fc5d35;
    }

    #btndesign {
      background-color: #292727;
      border-color: #fff;
      color: #fff;
    }

    #btndesign:hover {
      background-color: #fff;
      border-color: #fc5d35;
      color: #fc5d35;
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

<body style="background-color:#fff">
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section" style="background-color:#ABB0B8;"
      style="position:fixed;width:100%;background-color:red;margin-top:0px;z-index:1;top:0px">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="#">
            <span id="shop">
             EASYMED
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
                <li class="nav-item active ">
                  <a class="nav-link position-relative" href="../home.php">HOME
                    </a>
                </li>
                <li class="nav-item active ">
                  <a class="nav-link position-relative" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">View
                    Profile</a>
                </li>
                <li class="nav-item active ">
                  <!-- <a class="nav-link position-relative" data-bs-toggle="modal" data-bs-target="#staticBackdrop2">Cart</a> -->
                </li>


              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <form method='post' action="">

                <button type="submit" id="btndesign" class="btn btn-warning" name="but_logout">Logout</button>
              </form>
            </div>
          </div>


        </nav>
      </div>
      <div>
        <?php
        $ab = "select sum(stock) as qty,sum(price) as tot from cart";
        $e = mysqli_query($conn, $ab);
        $f = mysqli_fetch_array($e);
        $qty = $f['qty'];
        $tot = $f['tot'];

        ?>


        <h3>
          Total Items: <span id="qty">
            <?php echo $qty; ?>
          </span>
        </h3>
        <h3>
          Payabale total: <span id="amt">
            <?php echo $tot; ?>
            
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout">checkout</button>

        </h3>

      </div>
     
                  

             
              <!-- Modal -->
              <script language=" JavaScript">
             
                  function LoadOnce() {
                    window.location.reload();
                  }
              //-->
              </script>
              <script>
                if (window.history.replaceState) {
                  window.history.replaceState(null, null, window.location.href);
                }
              </script>
            </div>
          </div>
        </div>
      </div>

    </header>




    <!-- <div> <?php
    // echo "<h3>welcome user, {$_SESSION['uname']}</h3>";
    ?></div> -->
    <?php
    if ($update) {

      echo ' <div class="w-50 "><div class="alert alert-success 
                    alert-dismissible fade show" role="alert" id="time" style="visibility:hidden"> 
                  <strong>Success!</strong> Values updated successfully </div>   
                  </div> ';
    }
    ?>
    <!-- update profile -->
    <!-- update profile -->
    <!-- update profile -->
    <!-- update profile -->
    <!-- update profile -->

    <div class="displayproducts" style="margin-top:20px">
      <section class="fruit_section" style="margin-top:200px">
        <div class="container">

          
          <style>
            #heroname:hover {
              color: #fc5d35;
            }

            #viewbutton {
              border-radius: 5px;
            }
          </style>
          <?php
          $sql = "select * from cart where username='$n'";
          $run = mysqli_query($conn, $sql);
          while ($ru = mysqli_fetch_assoc($run)) {
            $productname = $ru['productname'];
            $pid = $ru['id'];
            $stock = $ru['stock'];
            $price = $ru['price'];
            // $description=$ru['description'];
            $image = $ru['image'];
            $originalprice = $ru['realprice'];
            $originalstock = $ru['realstock'];
            //$discount=$ru['discount'];
            // $a=($discount/100)*$price;
            // $actualprice=$price-$a;
          
          ?>




          <div class="row layout_padding2">
            <div class="col-md-8">
              <div class="fruit_detail-box">
                <h3 id="heroname">
                  <?php echo "$productname"; ?>
                </h3>


                Price: <h4 id="priceid-<?php echo $pid; ?>">
                  <?php echo "$price"; ?>
                </h4><br>

                <span id="qnty-<?php echo $pid; ?>" style="color:blue">Quantity</span>
                <nav aria-label="Page navigation example" style="color:black" id="counter">
                  <ul class="pagination">
                    <li class="page-item"><button class="page-link" onclick="dec(<?php echo $pid; ?>)">-</button></li>
                    <li class="page-item"><a class="page-link"><span id="sto-<?php echo $pid; ?>">
                          <?php echo "$stock"; ?>
                        </span></a></li>

                    <input type="hidden" id="stock-<?php echo $pid; ?>" value="<?php echo "$stock"; ?>"></input>
                    <input type="hidden" id="price-<?php echo $pid; ?>" value="<?php echo "$price"; ?>"></input>
                    <input type="hidden" id="originalprice-<?php echo $pid; ?>"
                      value="<?php echo "$originalprice"; ?>"></input>
                    <input type="hidden" id="originalstock-<?php echo $pid; ?>"
                      value="<?php echo "$originalstock"; ?>"></input>
                    <input type="hidden" id="setprice-<?php echo $pid; ?>" value="<?php echo "$price"; ?>"></input>
                    <li class="page-item"><button class="page-link" id="increasebtn"
                        onclick="inc(<?php echo $pid; ?>)">+</button></li>
                  </ul>

                </nav>
                <!-- <input type="hidden" value="<?php echo "$stock"; ?>" id="stock"> -->
                <!-- <li class="page-item"><button class="page-link" id="increasebtn"  onclick="disp()">disp</button></li> -->

                <div>
                  <!-- <form method="post" action=""> -->
                  <input type="hidden" name="productid" value="">
                  <button type="sumbit" name="valsub" class="btn btn-primary" id="viewbtn" onclick=del(<?php echo $pid;
              ?>)>
                    delete
                  </button>
                  <!-- </form> -->
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex justify-content-center align-items-center">
              <div class="fruit_img-box d-flex justify-content-center align-items-center">
                <img src="products/<?php echo "$image"; ?>" alt="" class="" width="150px" />
              </div>
            </div>
          </div>
          <?php
          }
          ?>

          <!-- <?php
          // $sqlll="select price "
          ?> -->
          <script>
            function inc(cart) {

              var input = $("#stock-" + cart);
              var input2 = $("#price-" + cart);
              var originalstock = $("#originalstock-" + cart);
              var originalprice = $("#originalprice-" + cart);
              var ostock = parseInt($(originalstock).val());
              var oprice = parseInt($(originalprice).val());
              var input3 = $("#setprice-" + cart);
              var newQuantity = parseInt($(input).val());
              var pric = parseInt($(input2).val());
              if (newQuantity < ostock) {

                newQuantity = parseInt($(input).val()) + 1;

                var price = parseInt($(input3).val());
                pric = pric + oprice;
                $("#stock-" + cart).val(newQuantity);
                $("#price-" + cart).val(pric);
                $("#sto-" + cart).html(newQuantity);
                $("#priceid-" + cart).html(pric);
                // alert(newQuantity);
                savecart(cart, newQuantity, pric);

              }
              else {
                $("#qnty-" + cart).html("max limit you can buy has reached");
              }

              //var newPrice = parseInt($(input2).val()+$(input2).val());


            }
            function dec(cart) {
              var input = $("#stock-" + cart);
              var input2 = $("#price-" + cart);
              var input3 = $("#setprice-" + cart);
              var pric = parseInt($(input2).val());
              var pric2 = parseInt($(input3).val());
              var originalstock = $("#originalstock-" + cart);
              var originalprice = $("#originalprice-" + cart);
              var ostock = parseInt($(originalstock).val());
              var oprice = parseInt($(originalprice).val());
              var newQuantity = parseInt($(input).val());
              if (newQuantity > 1) {
                //     $("#stock-"+cart).val(1);
                //   $("#price-"+cart).val(oprice);
                // $("#sto-"+cart).html(1);
                // $("#priceid-"+cart).html(oprice);
                // savecart(cart,1,oprice);
                $("#qnty-" + cart).html("Quantity");
                newQuantity = newQuantity - 1;
                pric = pric - oprice;
                $("#stock-" + cart).val(newQuantity);
                $("#price-" + cart).val(pric);
                $("#sto-" + cart).html(newQuantity);
                $("#priceid-" + cart).html(pric);
                savecart(cart, newQuantity, pric);
              }
              //   else{
              //     pric=pric-pric2;
              // // var newQuantity = parseInt($(input).val())-1;

              //   }

              // var newQuantity = parseInt($(input).val())-1;
              //   $("#stock-"+cart).val(newQuantity);
              //   $("#price-"+cart).val(pric);
              // $("#sto-"+cart).html(newQuantity);
              // $("#priceid-"+cart).html(pric);
              //  savecart(cart,newQuantity,pric);
              // alert(newQuantity);
            }



            function savecart(cart, quantity, price) {

              // var input = $("#stock-"+cart);
              $.ajax({

                url: "updatecart.php",
                type: "POST",
                data: {
                  cart: cart,
                  quantity: quantity,
                  price: price
                },



                success: function (response) {
                  // $(input).val(quantity);
                  console.log(response);
                  // alert(response);
                }
              });

            }
// function del(cart){
//   $.ajax({
//         url:"deletecart.php",
//         type="post",
//         data:{name:cart},
//         success:function(resp){
//           console.log(resp);
//         }
//   });
// }
          </script>

        </div>
    </div>

    <!-- view profile -->

    <!-- Modal -->

    <!-- update profile -->


    <!-- Modal -->


    <script>
  //location.reload();
    </script>
    </form>

  </div>

  </div>
  </div>
  </div>



  <!-- Modal -->

  <script language=" JavaScript">

    function LoadOnce() {
      window.location.reload();
    }
//-->
  </script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>
<!-- Button trigger modal -->

</html>



<?php
include "db.php";
$update = false;
$error = false;

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
$pid = $_GET['product'];
// echo "$pid";


if (isset($_POST['submit'])) {
  $catagory = $_POST['catagory'];
  $productname = $_POST['pname'];
  $price = $_POST['price'];
   $discount=$_POST['discount'];
  $stock = $_POST['stock'];
  $description = $_POST['description'];

  $pid = $_GET['product'];

    //$img_bases64= base64_encode(file_get_contents($_FILES['image']['tmp_name']));
    //$image='data:image/'.$img_type.';base64,'.$img_bases64;
    $sql2="UPDATE `tbl_product` SET `pname`='$productname',`price`='$price',`catagory`='$catagory',`description`='$description',`stock`='$stock',`discount`='$discount' WHERE id='$pid'";

    $run = mysqli_query($conn,$sql2);
    if($run)
    {
      
      header('location:viewandedit.php');
    }

   else {
    echo "<script>alert('error');</script>";
  }
}

?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->


  <title>EASYMED</title>
  <link rel="icon" type="image/x-icon" href="images/01.jpg">

  <!-- slider stylesheet -->
  <!-- JavaScript Bundle with Popper -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
  <style>
    .header_section {
      background-color: #393D47;
      color: #fff;

    }

    .nav-link {
      color: white;
    }

    #shop {
      color: #E2DFD2;
    }

    #shop:hover {
      color: #fff;
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

<body>
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section">
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
                  <a class="nav-link position-relative" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop">Notifications</a>
                </li>
                <li class="nav-item active ">
                  <a class="nav-link position-relative" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop2">Users</a>
                </li>


              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
              <form method='post' action="">

                <button type="submit" class="btn btn-primary" name="but_logout">Logout</button>
              </form>
            </div>
          </div>


        </nav>
      </div>

    </header>




    <div class="container">

      <section class="panel panel-default">
        <div class="panel-heading m-5">

          <?php
          if ($error) {
            echo ' <div class="w-50 "><div class="alert alert-success 
        alert-dismissible fade show" role="alert" id="time"> 
    <strong>Success!</strong> Updated successfully </div>

   
 </div> ';


          }
          ?>

          <h3 class="panel-title">Edit products</h3>
        </div>
        <div class="panel-body">
          <?php
          $sq = "select * from tbl_product where id='$pid'";
          $run = mysqli_query($conn, $sq);
          $s = mysqli_fetch_array($run);
          $pname = $s['pname'];
          $stock = $s['stock'];
          $price = $s['price'];
          $desc = $s['description'];
          $cat = $s['catagory'];
          $discount = $s['discount'];

          ?>

          <form action="" method="post" class="form-horizontal">

            <div class="form-group">
              <label for="tech" class="col-sm-3 control-label">Catagory</label>
              <div class="col-sm-3">
                <select class="form-control" name="catagory" value=" <?php echo $cat; ?>">
                  <option value=" <?php echo $cat; ?>" required>
                    <?php echo $cat; ?>
                  </option>
                  <option value="mobile">Mobile</option>
                  <option value="laptop">Laptop</option>
                  <option value="camera">Camera</option>
                  <option value="Other">Other</option>
                </select>
              </div><!-- form-group // -->

              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Product Name</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="pname" id="name" value="<?php echo $pname; ?>"
                    placeholder="Enter Product Name">
                </div>
              </div> <!-- form-group // -->
              <div class="form-group">
                <label for="name" class="col-sm-3 control-label">Price</label>
                <div class="col-sm-9">
                  <input type="Number" class="form-control" name="price" id="name" value="<?php echo $price; ?>"
                    placeholder="Price">
                </div>
              </div> <!-- form-group // -->
              <div class="form-group">
                <label for="about" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-9">
                  <textarea class="form-control" name="description" value="<?php echo $desc; ?>"></textarea>
                </div>
              </div> <!-- form-group // -->
              <div class="form-group">
                <label for="qty" class="col-sm-3 control-label">Quantity</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" name="stock" id="qty" value="<?php echo $stock; ?>"
                    placeholder="PCS.">
                </div>
              </div>
              <div class="form-group">
                <label for="qty" class="col-sm-3 control-label">Discount</label>
                <div class="col-sm-3">
                  <input type="number" class="form-control" name="discount" id="discount" value="<?php echo $discount; ?>"
                    placeholder="Discount">
                </div>
              </div> <!-- form-group // -->
              <!-- form-group // -->
              <!-- form-group // -->

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
</head>

</html>
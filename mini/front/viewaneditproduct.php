<?php
include "db.php";
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
// $q="select useremail from regst where username='".$n."'";

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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />
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
  <link rel="stylesheet" type="text/css" href="css3/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css3/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css3/responsive.css" rel="stylesheet" />
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
    <header class="header_section" style="background-color: skyblue;">
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
                <li class="nav-item">
                  <div class="dropdown">
                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                      Select Catagory
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                      <li><a class="dropdown-item" href="cat/setall.php">All</a></li>
                      <li><a class="dropdown-item" href="cat/ton.php">Tonic</a></li>
                      <li><a class="dropdown-item" href="cat/tab.php">Tablet</a></li>
                      <li><a class="dropdown-item" href="cat/self.php">Selfcare</a></li>
                      <li><a class="dropdown-item" href="cat/other.php">Others</a></li>
                    </ul>
                  </div>

                </li>
                <li class="nav-item active ">
                  <a class="nav-link position-relative" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Update Credentials</a>
                </li>
                <li class="nav-item active ">
                  <a class="nav-link position-relative" data-bs-toggle="modal" data-bs-target="#staticBackdrop2"> View Profile</a>
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
      echo '<script>loadOnce()</script>';
    }
    ?>
    <!-- update profile -->
    <!-- update profile -->
    <!-- update profile -->
    <!-- update profile -->
    <!-- update profile -->
    <div class="displayproducts">
      <section class="fruit_section">
        <div class="container">
          <h2 class="custom_heading">Featured</h2>
          <p class="custom_heading-text">
            Shop now
          </p>
          <style>
            #heroname:hover {
              color: #fc5d35;
            }

            #viewbutton {
              border-radius: 5px;
            }
          </style>
          <?php
          //allen
         
          if (isset($_SESSION['cat'])) {
            $sql = $_SESSION['cat'];
            $run = mysqli_query($conn, $sql);
            while ($ru = mysqli_fetch_assoc($run)) {
                $id= $ru['id'];
              $productname = $ru['pname'];
              $pid = $ru['id'];
              $price = $ru['price'];
              $catagory = $ru['catagory'];
              $description = $ru['description'];
              $image = $ru['image'];
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
          
          
          <a href="editproduct.php?product='.$id.'" class="custom_dark-btn">edit 
            
          </a>
        
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
          } else {
            $sql = "select * from tbl_product order by rand()";
            $run = mysqli_query($conn, $sql);
            while ($ru = mysqli_fetch_assoc($run)) {
              $productname = $ru['pname'];
              $pid = $ru['id'];
              $price = $ru['price'];
              $catagory = $ru['catagory'];
              $description = $ru['description'];
              $image = $ru['image'];
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
          <form method="post" action="home.php">
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
      <img src="admin/products/' . $image . '" alt="" class="card-img-top" width="300px" />
    </div>
  </div>
  </div>
';
            }
          }
          ?>

        </div>
    </div>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">

            <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color:red">Update Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="home.php" onsubmit="return Val();">
              <div class="mb-3">

                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name" value="<?php echo "$n"; ?>" disabled>

              </div>


              <div class="mb-3">

                <input type="text" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Firstname" name="fname" value="<?php echo "$fname"; ?>" onkeyup="return Validate()" required>

              </div>
              <span id="addresser" style="color:red;"></span>
              <div class="mb-3">

                <input type="text" class="form-control" id="phone" aria-describedby="emailHelp" placeholder="Phone" name="phone" value="<?php echo "$phn"; ?>" onkeyup="return Validatephone()" required>

              </div>
              <span id="phoneer" style="color:red;"></span>
              <div class="mb-3">

                <input type="password" class="form-control" id="password" placeholder="New password" name="password" value="<?php echo "$psw"; ?>" onkeyup="return Validatepassword()" required>
              </div>
              <span id="passworder" style="color:red;"></span>
              <div class="mb-3">

                <input type="password" class="form-control" id="cpassword" placeholder="Confirm password" name="cpassword" onkeyup="return Confirmpass()" required>
              </div>
              <span id="cpassworder" style="color:red;"></span>
              <div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
              </div>
              <!-- view profile -->

              <!-- Modal -->

              <!-- update profile -->


              <!-- Modal -->

              <script>
                function Validate() {

                  var fname = document.getElementById('fname').value;

                  if (fname.length < 3 || fname.length > 12) {
                    document.getElementById('addresser').innerHTML = "Invalid Name";
                    document.getElementById('fname').value = address;
                    document.getElementById('fname').style.color = "red";
                    return false;
                  } else {
                    document.getElementById('addresser').innerHTML = " ";
                    document.getElementById('fname').style.color = "green";
                    // return true;s

                  }
                }

                function Validatephone() {

                  var phone = document.getElementById('phone').value;

                  var patt = /^[7-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
                  if (!phone.match(patt)) {
                    document.getElementById('phoneer').innerHTML = "Invalid Phone Number";
                    document.getElementById('phone').value = phone;
                    document.getElementById('phone').style.color = "red";
                    return false;
                  } else {
                    document.getElementById('phoneer').innerHTML = " ";
                    document.getElementById('phone').style.color = "green";
                    // return true;s

                  }
                }

                function Validatepassword() {

                  var pass = document.getElementById('password').value;
                  var patt = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
                  if (pass.length < 8) {
                    document.getElementById('passworder').innerHTML = "Atleast 8 character ";
                    document.getElementById('password').value = pass;
                    document.getElementById('password').style.color = "red";
                    return false;
                  } else {
                    document.getElementById('passworder').innerHTML = " ";
                    document.getElementById('password').style.color = "green";
                    // return true;s

                  }
                }

                function Confirmpass() {

                  var pass1 = document.getElementById('password').value;
                  var pass2 = document.getElementById('cpassword').value;
                  if (pass1 != pass2) {
                    document.getElementById('cpassworder').innerHTML = "Password doesnt match ";
                    document.getElementById('cpassword').value = pass2;
                    document.getElementById('cpassword').style.color = "red";
                    return false;
                  } else {
                    document.getElementById('cpassworder').innerHTML = " ";
                    document.getElementById('cpassword').style.color = "green";
                    // return true;s

                  }
                }

                function Val() {
                  if (Validatephone() === false || Validateaddress() === false || Validatepassword() === false || Confirmpass() === false) {
                    return false;
                  }
                }
              </script>
              <script>
                //location.reload();
              </script>
            </form>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Understood</button> -->
          </div>
        </div>
      </div>
    </div>


    <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel2" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">

            <h1 class="modal-title fs-5" id="staticBackdropLabel" style="color:red">View Profile</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          
            <!-- view profile -->
            </form>
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
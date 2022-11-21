<?php
include "../db.php";
$update = false;
//session_unset();
// Check user login or not
if (!isset($_SESSION['uname'])) {
  header('Location: ../login.php');
}

// logout
if (isset($_POST['but_logout'])) {
  session_destroy();
  header('Location: ../login.php');
}

$n = $_SESSION['uname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Dashboard</title>

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
  <link rel="icon" type="image/x-icon" href="../images/022.png">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">
  <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

</head>

<body class="animsition">
  <div class="page-wrapper">
    HEADER MOBILE
   

    <!-- MENU SIDEBAR-->
    <aside class="menu-sidebar d-none d-lg-block">
      <div class="logo">
        <!-- <a href="#">
          <img src="images/icon/logo.png" alt="Cool Admin" />
        </a> -->
        <img src="images/icon/fuel1.png" alt="" width="40px" height="40px">&ensp;
        <h1>
          EASYMED
        </h1>
      </div>
      <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
            <li class="active has-sub">
              <a class="js-arrow" href="#">
                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="managerview.php">
                <i class="fas fa-users"></i>Delivery agents</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="userview.php">
                <i class="fas fa-users"></i>Users</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="addproduct.php">
              <i class='fas fa-upload' style='font-size:18px'></i></i>Addproduct</a>
            </li>
            <li class="has-sub">
              <a class="js-arrow" href="../viewandedit.php">
              <i class='fas fa-cart-arrow-down' style='font-size:18px'></i>View Products</a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- END MENU SIDEBAR-->

    <!-- PAGE CONTAINER-->
    <div class="page-container">
      <!-- HEADER DESKTOP-->
      <header class="header-desktop">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="header-wrap">
              <div class="header-button">
                <div class="account-wrap">
                  <div class="account-item clearfix js-item-menu">
                    <div class="content" style="margin-left: 1050px;">
                      <a class="js-acc-btn" href="#">ADMIN</a>
                    </div>
                    <div class="account-dropdown js-dropdown">
                      <div class="account-dropdown__footer">
                        <a href="logout.php">
                          <i class="zmdi zmdi-power"></i>Logout</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- HEADER DESKTOP-->

      <!-- MAIN CONTENT-->
      <div class="main-content">
        <div class="section__content section__content--p30">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12">
                <div class="overview-wrap">
                  <h2 class="title-1">overview</h2>
                </div>
              </div>
            </div>
            <div class="row m-t-25" >
              <div class="col-sm-6 col-lg-3" id="activeuser">
                <div class="overview-item overview-item--c1">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-account-o"></i>
                      </div>
                      <?php

                      $count_users = "SELECT count(*) as `count` FROM `login` WHERE `usertype` = '6'";
                      $count_users_run = mysqli_query($conn, $count_users);
                      $count = mysqli_fetch_array($count_users_run);
                      ?>
                      <div class="text">
                        <h2>
                        <?php echo $count['count']; ?>
                        </h2>




                        <span>ACTIVE USERS</span>
                      </div>
                    </div>
                    <div class="overview-chart">

                    </div>
                  </div>
                </div>
              </div>
              <script>
                $('#activeuser').on('click',function(){
                    window.location.href="hi.php";
                });
              </script>
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-shopping-cart"></i>
                      </div>

                      <?php

                      $count_products = "SELECT count(*) as `count` FROM `tbl_product`";
                      $count_products_run = mysqli_query($conn, $count_products);
                      $count = mysqli_fetch_array($count_products_run);
                      ?>
                      <div class="text">
                        <h2>
                          <?php echo $count['count']; ?>
                        </h2>

                        <span> PRODUCTS</span>
                      </div>
                    </div>
                    <div class="overview-chart">

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-calendar-note"></i>
                      </div>
                      <div class="text">
                        <h2>1,086</h2>
                        <span>this week</span>
                      </div>
                    </div>
                    <div class="overview-chart">

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                  <div class="overview__inner">
                    <div class="overview-box clearfix">
                      <div class="icon">
                        <i class="zmdi zmdi-money"></i>
                      </div>
                      <div class="text">
                        <h2>$</h2>
                        <span> earnings</span>
                      </div>
                    </div>
                    <div class="overview-chart">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="au-card recent-report">
                  <div class="au-card-inner">
                    <h3 class="title-2">recent reports</h3>
                    <div class="chart-info">
                      <div class="chart-info__left">
                        <div class="chart-note">
                          <span class="dot dot--blue"></span>
                          <span>products</span>
                        </div>
                        <div class="chart-note mr-0">
                          <span class="dot dot--green"></span>
                          <span>services</span>
                        </div>
                      </div>
                      <div class="chart-info__right">
                        <div class="chart-statis">
                          <span class="index incre">
                            <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                          <span class="label">products</span>
                        </div>
                        <div class="chart-statis mr-0">
                          <span class="index decre">
                            <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                          <span class="label">services</span>
                        </div>
                      </div>
                    </div>
                    <div class="recent-report__chart">
                      <canvas id="recent-rep-chart"></canvas>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="au-card chart-percent-card">
                  <div class="au-card-inner">
                    <h3 class="title-2 tm-b-5">char by %</h3>
                    <div class="row no-gutters">
                      <div class="col-xl-6">
                        <div class="chart-note-wrap">
                          <div class="chart-note mr-0 d-block">
                            <span class="dot dot--blue"></span>
                            <span>products</span>
                          </div>
                          <div class="chart-note mr-0 d-block">
                            <span class="dot dot--red"></span>
                            <span>services</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-6">
                        <div class="percent-chart">
                          <canvas id="percent-chart"></canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- END MAIN CONTENT-->
      <!-- END PAGE CONTAINER-->
    </div>

  </div>

  <!-- Jquery JS-->
  <script src="vendor/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS-->
  <script src="vendor/bootstrap-4.1/popper.min.js"></script>
  <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
  <!-- Vendor JS       -->
  <script src="vendor/slick/slick.min.js">
  </script>
  <script src="vendor/wow/wow.min.js"></script>
  <script src="vendor/animsition/animsition.min.js"></script>
  <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
  </script>
  <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
  <script src="vendor/counter-up/jquery.counterup.min.js">
  </script>
  <script src="vendor/circle-progress/circle-progress.min.js"></script>
  <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="vendor/chartjs/Chart.bundle.min.js"></script>
  <script src="vendor/select2/select2.min.js">
  </script>

  <!-- Main JS-->
  <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
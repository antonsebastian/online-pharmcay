<?php
$n=false;
$managererror=false;
include "db.php";

if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    
 

   // $hash = password_hash($password, 
                               // PASSWORD_DEFAULT);

    if ($uname != "" && $password != ""){
        
       

        $sql_query = "select count(*) as cntUser,usertype as val from login where email='".$uname."' and password='".$password."'";
        $result = mysqli_query($conn,$sql_query);
        $row = mysqli_fetch_array($result);

        $count1 = $row['cntUser'];
        $v=$row['val'];
       
       
        if($count1 > 0){
            if($v=="1")
            {
                $_SESSION['uname'] = $uname;
                header('Location: index.php');
                
            }
            
           elseif($v=="0"){
            $_SESSION['uname'] = $uname;
           header('Location: b.php');
          
           }
          
          
           
           elseif($v=="admin"){
            $_SESSION['uname'] = $uname;
            header('Location: registration.php');
          
           }
        }
        else{
           
           $n = "Invalid username and password";
           
           
        }

    }

}
?>

<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Medion</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- font awesome style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700|Roboto:400,700&display=swap" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
 
    
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.html">
            <img src="images/logo.png" alt="">
            <span>
              Medion
            </span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center w-100 justify-content-between">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="medicine.html"> Medicine </a>
                </li>

               
                <li class="nav-item">
                  <a class="nav-link" href="../registration.php">Registration</a>
                </li>
              </ul>
              
              <div class="login_btn-contanier ml-0 ml-lg-5">
                <a href="#login">
                  <img src="images/user.png" alt="">
                  <span>
                    Login
                  </span>
                </a>
              </div>
            </div>
          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->
    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="img-box">
                    <img src="images/medicine.png" alt="">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="detail-box">
                    <h1>
                      Welcome To Our <br>
                      <span>
                        Online Medicine
                      </span>

                    </h1>
                    <p>
                      There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                      alteration in some form, by injected humour, or randomised words which don't look even slightly
                      believable.
                    </p>
                    <div>
                      <a href="login.php">
                        Buy Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="img-box">
                    <img src="images/medicine.png" alt="">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="detail-box">
                    <h1>
                      Welcome To Our <br>
                      <span>
                        Online Medicine
                      </span>

                    </h1>
                    <p>
                      There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                      alteration in some form, by injected humour, or randomised words which don't look even slightly
                      believable.
                    </p>
                    <div>
                      <a href="login.php">
                        Buy Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="row">
                <div class="col-md-4">
                  <div class="img-box">
                    <img src="images/medicine.png" alt="">
                  </div>
                </div>
                <div class="col-md-8">
                  <div class="detail-box">
                    <h1>
                      Welcome To Our <br>
                      <span>
                        Online Medicine
                      </span>

                    </h1>
                    <p>
                      There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                      alteration in some form, by injected humour, or randomised words which don't look even slightly
                      believable.
                    </p>
                    <div>
                      <a href="login.php">
                        Buy Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="sr-only">Next</span>
        </a>
      </div>


    </section>
    <!-- end slider section -->
  </div>

  <section class="feature_section  layout_padding">
    <div class="container">
      <div class="feature_container">
        <div class="box">
          <div class="img-box">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              x="0px" y="0px" viewBox="0 0 422.518 422.518" style="enable-background:new 0 0 422.518 422.518;"
              xml:space="preserve">
              <path d="M422.512,215.424c0-0.079-0.004-0.158-0.005-0.237c-0.116-5.295-4.368-9.514-9.727-9.514h-2.554l-39.443-76.258
             c-1.664-3.22-4.983-5.225-8.647-5.226l-67.34-0.014l2.569-20.364c0.733-8.138-1.783-15.822-7.086-21.638
             c-5.293-5.804-12.683-9.001-20.81-9.001h-209c-5.255,0-9.719,4.066-10.22,9.308l-2.095,16.778h119.078
             c7.732,0,13.836,6.268,13.634,14c-0.203,7.732-6.635,14-14.367,14H126.78c0.007,0.02,0.014,0.04,0.021,0.059H10.163
             c-5.468,0-10.017,4.432-10.16,9.9c-0.143,5.468,4.173,9.9,9.641,9.9H164.06c7.168,1.104,12.523,7.303,12.326,14.808
             c-0.216,8.242-7.039,14.925-15.267,14.994H54.661c-5.523,0-10.117,4.477-10.262,10c-0.145,5.523,4.215,10,9.738,10h105.204
             c7.273,1.013,12.735,7.262,12.537,14.84c-0.217,8.284-7.109,15-15.393,15H35.792v0.011H25.651c-5.523,0-10.117,4.477-10.262,10
             c-0.145,5.523,4.214,10,9.738,10h8.752l-3.423,35.818c-0.734,8.137,1.782,15.821,7.086,21.637c5.292,5.805,12.683,9.001,20.81,9.001
             h7.55C69.5,333.8,87.3,349.345,109.073,349.345c21.773,0,40.387-15.545,45.06-36.118h94.219c7.618,0,14.83-2.913,20.486-7.682
             c5.172,4.964,12.028,7.682,19.514,7.682h1.55c3.597,20.573,21.397,36.118,43.171,36.118c21.773,0,40.387-15.545,45.06-36.118h6.219
             c16.201,0,30.569-13.171,32.029-29.36l6.094-67.506c0.008-0.091,0.004-0.181,0.01-0.273c0.01-0.139,0.029-0.275,0.033-0.415
             C422.52,215.589,422.512,215.508,422.512,215.424z M109.597,329.345c-13.785,0-24.707-11.214-24.346-24.999
             c0.361-13.786,11.87-25.001,25.655-25.001c13.785,0,24.706,11.215,24.345,25.001C134.89,318.131,123.382,329.345,109.597,329.345z
              M333.597,329.345c-13.785,0-24.706-11.214-24.346-24.999c0.361-13.786,11.87-25.001,25.655-25.001
             c13.785,0,24.707,11.215,24.345,25.001C358.89,318.131,347.382,329.345,333.597,329.345z M396.457,282.588
             c-0.52,5.767-5.823,10.639-11.58,10.639h-6.727c-4.454-19.453-21.744-33.882-42.721-33.882c-20.977,0-39.022,14.429-44.494,33.882
             h-2.059c-2.542,0-4.81-0.953-6.389-2.685c-1.589-1.742-2.337-4.113-2.106-6.676l12.609-139.691l28.959,0.006l-4.59,50.852
             c-0.735,8.137,1.78,15.821,7.083,21.637c5.292,5.806,12.685,9.004,20.813,9.004h56.338L396.457,282.588z" />
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
            </svg>
          </div>
          <div class="detail-box">
            <h5>
              Fast Delivery
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <svg id="Capa_1" enable-background="new 0 0 512 512" height="512" viewBox="0 0 512 512" width="512"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="m471.728 84.718h-431.456c-22.206 0-40.272 18.066-40.272 40.272v243.623 18.395.005c0 22.205 18.064 40.27 40.27 40.27h431.46c22.205 0 40.27-18.065 40.27-40.27v-.005-18.395-243.623c0-22.206-18.066-40.272-40.272-40.272zm-431.456 20h431.455c11.179 0 20.272 9.094 20.272 20.272v233.623h-294.622c-5.522 0-10 4.477-10 10s4.478 10 10 10h294.623v8.395c0 11.178-9.094 20.272-20.272 20.272h-431.456c-11.178 0-20.272-9.094-20.272-20.273v-8.395h89.418c5.522 0 10-4.477 10-10s-4.478-10-10-10h-89.418v-233.622c0-11.178 9.094-20.272 20.272-20.272z" />
              <path
                d="m280.063 167.544h53.989c5.522 0 10-4.477 10-10s-4.478-10-10-10h-53.989c-5.522 0-10 4.477-10 10s4.477 10 10 10z" />
              <path
                d="m377.55 167.544h55.505c5.522 0 10-4.477 10-10s-4.478-10-10-10h-55.505c-5.522 0-10 4.477-10 10s4.477 10 10 10z" />
              <path
                d="m280.063 210.314h152.992c5.522 0 10-4.477 10-10s-4.478-10-10-10h-152.992c-5.522 0-10 4.477-10 10s4.477 10 10 10z" />
              <path
                d="m280.063 254.169h45.989c5.522 0 10-4.477 10-10s-4.478-10-10-10h-45.989c-5.522 0-10 4.477-10 10s4.477 10 10 10z" />
              <path
                d="m422.75 234.169h-38.993c-13.348 0-24.207 10.859-24.207 24.207v37.636c0 13.348 10.859 24.208 24.207 24.208h38.993c13.348 0 24.207-10.859 24.207-24.208v-37.636c0-13.348-10.859-24.207-24.207-24.207zm4.207 61.843c0 2.32-1.888 4.208-4.207 4.208h-38.993c-2.319 0-4.207-1.888-4.207-4.208v-37.636c0-2.32 1.888-4.207 4.207-4.207h38.993c2.319 0 4.207 1.887 4.207 4.207z" />
              <path
                d="m280.063 298.297h45.989c5.522 0 10-4.477 10-10s-4.478-10-10-10h-45.989c-5.522 0-10 4.477-10 10s4.477 10 10 10z" />
              <path
                d="m79.072 319.081h140.993c5.522 0 10-4.477 10-10v-39.955-114.582c0-5.523-4.478-10-10-10h-140.993c-5.522 0-10 4.477-10 10v114.583 39.955c0 5.522 4.478 9.999 10 9.999zm130.993-20h-120.993v-28.724c.03-.113.06-.227.091-.339 4.169-15.41 18.521-26.172 34.902-26.172h51.008c16.38 0 30.732 10.763 34.902 26.169.03.113.061.226.09.339zm-81.794-96.534c0-11.744 9.554-21.298 21.298-21.298s21.298 9.554 21.298 21.298-9.554 21.298-21.298 21.298-21.298-9.554-21.298-21.298zm81.794 33.371c-7.335-5.755-16.118-9.714-25.618-11.298 4.058-6.39 6.42-13.958 6.42-22.073 0-17.041-10.376-31.702-25.14-38.003h44.339v71.374zm-76.653-71.374c-14.765 6.301-25.14 20.963-25.14 38.003 0 8.114 2.362 15.683 6.42 22.073-9.501 1.583-18.285 5.543-25.619 11.298v-71.374z" />
              <path
                d="m159.66 360.3c-7.549-5.03-17.605 2.261-15.18 10.977 1.142 4.104 4.876 7.118 9.141 7.321 4.271.204 8.264-2.408 9.808-6.389 1.66-4.282.096-9.38-3.769-11.909z" />
            </svg>
          </div>
          <div class="detail-box">
            <h5>
              license of government
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by
            </p>
          </div>
        </div>
        <div class="box">
          <div class="img-box">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
              x="0px" y="0px" viewBox="0 0 315.377 315.377" style="enable-background:new 0 0 315.377 315.377;"
              xml:space="preserve">
              <g>
                <g>
                  <path
                    d="M107.712,181.769l-7.938,7.705c-1.121,1.089-1.753,2.584-1.753,4.146v3.288c0,3.191,2.588,5.779,5.78,5.779h47.4
                 c3.196,0,5.782-2.588,5.782-5.779v-4.256c0-3.191-2.586-5.78-5.782-5.78h-26.19l0.722-0.664
                 c17.117-16.491,29.232-29.471,29.232-46.372c0-13.513-8.782-27.148-28.409-27.148c-8.568,0-16.959,2.75-23.629,7.74
                 c-2.166,1.625-2.918,4.537-1.803,7.007l1.458,3.224c0.708,1.568,2.074,2.739,3.735,3.195c1.651,0.456,3.433,0.148,4.842-0.836
                 c4.289-2.995,8.704-4.515,13.127-4.515c8.608,0,12.971,4.28,12.971,12.662C137.142,152.524,127.72,162.721,107.712,181.769z" />
                </g>
                <g>
                  <path d="M194.107,114.096c-0.154-0.014-0.31-0.02-0.464-0.02h-1.765c-1.89,0-3.658,0.923-4.738,2.469l-35.4,50.66
                 c-0.678,0.971-1.041,2.127-1.041,3.311v4.061c0,3.192,2.586,5.78,5.778,5.78h32.322v16.551c0,3.191,2.586,5.779,5.778,5.779h5.519
                 c3.19,0,5.781-2.588,5.781-5.779v-16.551h5.698c3.192,0,5.781-2.588,5.781-5.78v-3.753c0-3.19-2.589-5.779-5.781-5.779h-5.698
                 v-45.189c0-3.19-2.591-5.779-5.781-5.779h-5.519C194.419,114.077,194.261,114.083,194.107,114.096z M188.799,165.045h-17.453
                 c4.434-6.438,12.015-17.487,17.453-25.653V165.045z" />
                </g>
                <g>
                  <path
                    d="M157.906,290.377c-68.023,0-123.365-55.342-123.365-123.365c0-64.412,49.625-117.443,112.647-122.895v19.665
                 c0,1.397,0.771,2.681,2.003,3.337c0.558,0.298,1.169,0.444,1.778,0.444c0.737,0,1.474-0.216,2.108-0.643l44.652-30
                 c1.046-0.702,1.673-1.879,1.673-3.139c0-1.259-0.627-2.437-1.673-3.139l-44.652-30c-1.159-0.779-2.654-0.857-3.887-0.198
                 c-1.232,0.657-2.003,1.941-2.003,3.337v15.254C70.364,24.547,9.54,88.806,9.54,167.011c0,81.809,66.558,148.365,148.365,148.365
                 c37.876,0,73.934-14.271,101.532-40.183l-17.111-18.226C219.38,278.512,189.4,290.377,157.906,290.377z" />
                </g>
                <g>
                  <path d="M284.552,89.689c-5.111-8.359-11.088-16.252-17.759-23.456l-18.344,16.985c5.552,5.995,10.522,12.562,14.776,19.515
                 L284.552,89.689z" />
                </g>
                <g>
                  <path d="M280.146,150.258l24.773-3.363c-1.322-9.74-3.625-19.373-6.846-28.632l-23.612,8.211
                 C277.135,134.163,279.047,142.165,280.146,150.258z" />
                </g>
                <g>
                  <path d="M242.999,45.459c-8.045-5.643-16.678-10.496-25.66-14.427l-10.022,22.903c7.464,3.267,14.64,7.301,21.327,11.991
                 L242.999,45.459z" />
                </g>
                <g>
                  <path d="M253.208,245.353l19.303,15.887c6.244-7.587,11.75-15.817,16.363-24.462l-22.055-11.771
                 C262.983,232.195,258.404,239.041,253.208,245.353z" />
                </g>
                <g>
                  <path d="M280.908,176.552c-0.622,8.157-2.061,16.264-4.273,24.093l24.057,6.802c2.666-9.426,4.396-19.18,5.146-28.99
                 L280.908,176.552z" />
                </g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
              <g>
              </g>
            </svg>

          </div>
          <div class="detail-box">
            <h5>
              support24/7
            </h5>
            <p>
              It is a long established fact that a reader will be distracted by
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end feature section -->

  <!-- discount section -->

  <section class="discount_section">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-5 offset-md-2">
          <div class="detail-box">
            <h2>
              You get <br>
              any medicine <br>
              on
              <span>
                10% discount
              </span>

            </h2>
            <p>
              It is a long established fact that a reader will be distracted by
            </p>
            <div>
              <a href="">
                Buy Now
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-md-5">
          <div class="img-box">
            <img src="images/medicines.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end discount section -->

  <!-- health section -->

  <section class="health_section layout_padding">
    <div class="health_carousel-container">
      <h2 class="text-uppercase">
        Medicine & Health

      </h2>
      <div class="carousel-wrap layout_padding2">
        <div class="owl-carousel">
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-1.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Health
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-5.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Health
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-2.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Health
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-5.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Health
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-3.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Health
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-5.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Health
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-4.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Health
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-5.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Health
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="health_carousel-container">
      <h2 class="text-uppercase">
        Vitamins & Supplements


      </h2>
      <div class="carousel-wrap layout_padding2">
        <div class="owl-carousel owl-2">
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-6.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Medicine
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-6.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Medicine
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-6.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Medicine
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="btn_container">
                <a href="">
                  Buy Now
                </a>
              </div>
              <div class="img-box">
                <img src="images/p-6.jpg" alt="">
              </div>
              <div class="detail-box">
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star-o" aria-hidden="true"></i>

                </div>
                <div class="text">
                  <h6>
                    Medicine
                  </h6>
                  <h6 class="price">
                    <span>
                      $
                    </span>
                    30
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
      <a href="">
        See more
      </a>
    </div>
  </section>

  <!-- end health section -->

  <!-- about section -->
  <section class="about_section layout_padding">
    <div class="container">
      <div class="custom_heading-container ">
        <h2>
          About Us
        </h2>
      </div>

      <div class="img-box">
        <img src="images/about-medicine.png" alt="">
      </div>
      <div class="detail-box">
        <p>
          It is a long established fact that a reader will be distracted by the readable content of a page when looking
          at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
          opposed to using 'Content here, content here', making it
        </p>
        <div class="d-flex justify-content-center">
          <a href="">
            Read More
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- client section -->
  <section class="client_section layout_padding">
    <div class="container">
      <div class="custom_heading-container ">
        <h2>
          What is says our clients
        </h2>
      </div>
      <div id="carouselExample2Indicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExample2Indicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="1"></li>
          <li data-target="#carouselExample2Indicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="client_container layout_padding2">
              <div class="client_detail">
                <p>
                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                  alteration in
                  some form, by injected humour, or randomised words which don't look even slightly believable.
                </p>
              </div>
              <div class="client_box ">
                <div class="img-box">
                  <img src="images/client.png " alt="">
                </div>
                <div class="name">
                  <h5>
                    Randomised
                  </h5>
                  <h6>
                    <span>
                      Client
                    </span>
                    <img src="images/quote.png" alt="">
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding2">
              <div class="client_detail">
                <p>
                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                  alteration in
                  some form, by injected humour, or randomised words which don't look even slightly believable.
                </p>
              </div>
              <div class="client_box ">
                <div class="img-box">
                  <img src="images/client.png " alt="">
                </div>
                <div class="name">
                  <h5>
                    Randomised
                  </h5>
                  <h6>
                    <span>
                      Client
                    </span>
                    <img src="images/quote.png" alt="">
                  </h6>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="client_container layout_padding2">
              <div class="client_detail">
                <p>
                  There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                  alteration in
                  some form, by injected humour, or randomised words which don't look even slightly believable.
                </p>
              </div>
              <div class="client_box ">
                <div class="img-box">
                  <img src="images/client.png " alt="">
                </div>
                <div class="name">
                  <h5>
                    Randomised
                  </h5>
                  <h6>
                    <span>
                      Client
                    </span>
                    <img src="images/quote.png" alt="">
                  </h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>
  <!-- end client section -->

  <!-- contact section -->
  <div id="login">
  <section class="contact_section">
    <div class="container">
      <div class="row">
        <div class="custom_heading-container ">
          <h2>
           Login
          </h2>
        </div>
      </div>
    </div>
    <div class="container layout_padding2">
      <div class="row">
        <div class="col-md-5">
          <div class="form_contaier">
          <form action="index.php" method="POST">
              <div class="form-group">
                <label for="exampleInputEmail1">Email </label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1">
              </div>
              <div class="form-group">
                <label for="exampleInputNumber1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputNumber1">
              </div>

              
              
             
              <button type="submit" name="submit" class="">Login</button>
            </form>
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <h3>
              Get Now Medicines
            </h3>
            <p>
              There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration
              in some form, by injected humour, or randomised words which don't look even slightly believable.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

  <!-- end contact section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h4>
              Contact
            </h4>
            <div class="box">
              <div class="img-box">
                <img src="images/telephone-symbol-button.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  +01 123567894
                </h6>
              </div>
            </div>
            <div class="box">
              <div class="img-box">
                <img src="images/email.png" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  demo@gmail
                </h6>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_menu">
            <h4>
              Menu
            </h4>
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="medicine.html"> Medicine </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="buy.html"> Online Buy </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-6">
          <div class="info_news">
            <h4>
              newsletter
            </h4>
            <form action="">
              <input type="text" placeholder="Enter Your email">
              <div class="d-flex justify-content-center justify-content-end mt-3">
                <button>
                  Subscribe
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end info section -->

  <!-- footer section -->
  <section class="container-fluid footer_section">
    <p>
      &copy; 2019 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </section>
  <!-- footer section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });
  </script>
  <script type="text/javascript">
    $(".owl-2").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,

      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    });
  </script>
</body>

</html>
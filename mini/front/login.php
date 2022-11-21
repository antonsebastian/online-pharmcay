
<?php
$n=false;
$managererror=false;
$block=false;
include "db.php";
// session_start();
session_unset();
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
                header('Location: b.php');
                
            }
            
        
           elseif($v=="0"){
            
           $managererror=true;
          
           }
           elseif($v=="8"){
            
            $block=true;
           
            }
            elseif($v=="6"){
              $_SESSION['uname'] = $uname;
                header('Location: home.php');
            
              $unblock=true;
             
              }
          
          
           
           elseif($v=="10"){
            $_SESSION['uname'] = $uname;
            header('Location: admin/index.php');
          
           }
        }
        else{
           
           $n=true;
           
           
        }

    }

}
?>
<script>
    var mngerr=<?php echo json_encode($v); ?>;
</script>
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
  <link rel="icon" type="image/x-icon" href="./images/022.png">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

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
<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
       
      </div>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
        
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex  flex-column flex-lg-row align-items-center w-100 justify-content-between">
              <ul class="navbar-nav  ">
                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href=""> Jobs </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="registration.php"> Register </a>
                </li>
               
              
              </ul>
           
            </div>
          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>



  <!-- contact section -->
  <div id="login" class="m-5">
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
            <?php
    if($n) {
       
      echo '<div class="alert alert-warning 
      role="alert" id="time"> 
 <strong>Alert!</strong> Incorrect credentials </div>'; 
     
    }
    
    if($managererror) {
       
      echo ' <div class="alert alert-warning 
       role="alert" id="time"> 
  <strong>Alert!</strong> Yet to be verified by admin </div>

 
'; 
     
    }

    if($block) {
       
      echo '<div class="alert alert-warning 
       role="alert" id="time" "> 
  <strong>Alert!</strong> Blocked by admin </div>'; 
     
    }
     ?>
            <form action="login.php" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputNumber1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputNumber1" required>
                </div>
  
                
                
               
                <input type="submit" class="btn btn-primary btn-block btn-lg" name="submit" value="submit" >
                <a href="forgotpass.php">forgot password?</a>
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
    <script>
  if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>
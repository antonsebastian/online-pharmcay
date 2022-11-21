
<?php
include "db.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location:login.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location:index.php');
}
$n=$_SESSION['uname'];
$q="select count(*) as c from login where usertype=0  ";

$result = mysqli_query($conn,$q);
//echo $result;
$row = mysqli_fetch_array($result);
$count = $row['c'];
$qur="select count(*) as c2 from regst";

$result2 = mysqli_query($conn,$qur);
//echo $result;
$row4 = mysqli_fetch_array($result2);
$countuser = $row4['c2'];
//


?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  

  <title>Admin</title>
  <link rel="icon" type="image/x-icon" href="./images/022.png">

  <!-- slider stylesheet -->
  <!-- JavaScript Bundle with Popper -->
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css2/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css2/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css2/responsive.css" rel="stylesheet" />
</head>

<body>
  <div class="hero_area sub_pages">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand" href="index.php">
            <span>
              Pharmative
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
                  <a class="nav-link position-relative" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Notification <span class="position-absolute top-0  start-90 translate-middle badge rounded-pill bg-danger">
                  <?php echo "$count" ?>
    <span class="visually-hidden">unread messages</span></a>
                </li>
                <li class="nav-item active ">
                  <a class="nav-link position-relative" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">Users <span class="position-absolute top-0  start-90 translate-middle badge rounded-pill bg-danger">
                  <?php echo "$countuser" ?>
    <span class="visually-hidden">unread messages</span></a>
                </li>
                <li class="nav-item active ">
                  <a  class="nav-link position-relative" data-bs-toggle="collapse" href="#collapseExample3"  role="button" aria-expanded="false" aria-controls="collapseExample3">ADD <span class="position-absolute top-0  start-90 translate-middle badge rounded-pill bg-danger">
                
    <span class="visually-hidden">unread messages</span></a>
                </li>
               
            
          
              </ul>
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
            <div class="quote_btn-container ml-0 ml-lg-4 d-flex justify-content-center">
            <form method='post' action="">
        
        <button type="submit"  class="btn btn-warning"  name="but_logout">Logout</button>
        </form>
            </div>
          </div>


        </nav>
      </div>
      
    </header>



    <div class="collapse" id="collapseExample">
  <div class="card card-body">
  <h4>Delivery</h4>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

  <?php
$qu="select * from manager where value = 0 ";
$res= mysqli_query($conn,$qu);
if($res)
{
  while($row1=mysqli_fetch_assoc($res))
  {
    $m_id=$row1['id'];
    $mname=$row1['mname'];
    $memail=$row1['memail'];
   echo ' <tr>
   <th scope="row">'.$m_id.'</th>
   <td>'.$mname.'</td>
   <td>'.$memail.'</td> 
   <td>
 <a href="acceptmanager.php?accept='.$memail.'" type="button" class="btn btn-outline-success">Accept</a>
 <a href="acceptmanager.php?reject='.$memail.'" type="button" class="btn btn-outline-danger">Reject</a>

</td>
 </tr>';
  }
}
?>



 
   
  
  </tbody>
</table>
  </div>
</div>


<div class="collapse" id="collapseExample2">
  <div class="card card-body">
    <h4>Users</h4>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Firstname</th>
      <th scope="col">Last name</th>
      <th scope="col">email</th>
      <th scope="col">Phone</th>
      <th scope="col">Status</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody>

  <?php
$qu1="select * from regst";
$res1= mysqli_query($conn,$qu1);
if($res1)
{
  while($row2=mysqli_fetch_assoc($res1))
  {
    $id=$row2['id'];
    $fname=$row2['fname'];
    $lname=$row2['lname'];
    $email=$row2['email'];
    $phone=$row2['phone'];
    $status=$row2['status'];
   echo ' <tr>
   <th scope="row">'.$id.'</th>
   <td>'.$fname.'</td>
   <td>'.$lname.'</td>
   <td>'.$email.'</td>
   <td>'.$phone.'</td>
   <td>'.$status.'</td> 
   <td><div style="font-weight:bold;color:red">'.$status.'</div></td> 
   <td>
   
   <a href="blockuser.php?block='.$email.'" type="button" class="btn btn-outline-danger">Block User</a>
   <a href="blockuser.php?unblock='.$email.'" type="button" class="btn btn-outline-primary">Unblock User</a>
</td>
 </tr>';
  }
}
?>
</tbody>
</table>
  </div>
</div>
<div class="collapse" id="collapseExample3">
<div class="row">

<form action="product.php" method="post"  enctype="multipart/form-data">


<input type="text"  placeholder="Name" name="cname" required><br>

 <lablel>Choose image...</label>
<input type="file" class="form-control" placeholder="Image" name="image" required><br>
<input type="int"  placeholder="quantity" name="quantity" required><br>
 <input type="int"  placeholder="description" name="description" required><br>
<input type="int"  placeholder="price" name="price" required><br>


<input type="submit"  value="submit" name="submit">

</form>
</div>
 </div>

 
 
 


    <!-- end header section -->
  <!-- end google map js -->
</body>

</html>
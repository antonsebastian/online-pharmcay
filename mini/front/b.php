<?php
include "db.php";

// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location:index.php');
}

// logout
if(isset($_POST['but_logout'])){
    session_destroy();
    header('Location:index.php');
}
$n=$_SESSION['uname'];
$q="select mname from manager where memail='".$n."'";

$result = mysqli_query($conn,$q);
//echo $result;
$row = mysqli_fetch_array($result);
$count = $row['mname'];
//echo "$count";
?>
<!doctype html>
<html>
    <head>
    <script language="javascript" type="text/javascript">
    window.history.forward();
  </script>
    <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
</style>
    <link rel="stylesheet" href="new/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        
        <?php
        echo "<h1>welcome Agent, $count</h1>";
        ?>
        <form method='post' action="">
        
         <button type="submit"  class="btn btn-warning" name="but_logout">Logout</button>
        </form>
    </body>
</html>
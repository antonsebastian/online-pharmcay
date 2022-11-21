
<?php
include "db.php";
$message=false;
$token=false;
$useremail=false;
if(!isset($_GET['token']))
{
  session_destroy();
  header('location:index.php');
}
 
if(isset($_GET['token']) && isset($_GET['useremail'])) {
  
    $token=$_GET['token'];
    $useremail=$_GET['useremail'];
   // $pass=$_POST["password"];
   $check=mysqli_query($conn,"SELECT * FROM login WHERE email='$useremail' and token='$token'");

   if (mysqli_num_rows($check)!=1) {
    echo '<script>alert("This url is invalid or already been used. Please verify and try again.")</script>';
    $_SESSION['token']="Token Expired";
     header('location:index.php');
   }

$_SESSION['mail']=$useremail;
$_SESSION['token']=$token;

//$q3="UPDATE `b` SET `password`='$pass' WHERE `username`='$count'";
//$res3=mysqli_query($conn,$q3);
}
// else{
//   session_destroy();
//   header('location:index.php');
// }
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $password1=mysqli_real_escape_string($conn,$_POST['password']);
    $password2=mysqli_real_escape_string($conn,$_POST['cpassword']);
    if ($password2==$password1) {
      $lol=$_SESSION['mail'];
      $tok=$_SESSION['token'];
      
        
       // mysqli_query($conn,"DELETE  from b where token='$tok'");
      
        mysqli_query($conn,"UPDATE login set `password`='$password1' where `email`='$lol'");
        mysqli_query($conn,"UPDATE login set token='0' where email='$lol'");
        $manageroruser="select * from manager where memail='$lol'";
        $manageroruser2="select * from regst where email='$lol'";
        $row=mysqli_query($conn,$manageroruser);
        $row2=mysqli_query($conn,$manageroruser2);
        $count=mysqli_fetch_array($row);
        $count2=mysqli_fetch_array($row2);
        if($count!=0){
            mysqli_query($conn,"UPDATE manager set `password`='$password1' where `memail`='$lol'");

        }
        if($count2!=0 && $count==0){
            mysqli_query($conn,"UPDATE  regst set `password`='$password1' where `email`='$lol'");
        }
     
        
        
       
        header('location:login.php');
    }
    else{
        $message="Verify your password";
    }
       
          
           
         
        
        
        
}
else{
  //  echo "error";
}
    
?>
<?php
   $lol=$_SESSION['mail'];
$nam= mysqli_query($conn,"select username from login where email='$lol'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/x-icon" href="./images/022.png">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Bootstrap Simple Login Form with Blue Background</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
	body {
		color: #fff;
		background: #3598dc;
		font-family: 'Roboto', sans-serif;
	}
    .form-control{
		height: 41px;
		background: #f2f2f2;
		box-shadow: none !important;
		border: none;
	}
	.form-control:focus{
		background: #e2e2e2;
	}
    .form-control, .btn{        
        border-radius: 3px;
    }
	.signup-form{
		width: 390px;
		margin: 30px auto;
	}
	.signup-form form{
		color: #999;
		border-radius: 3px;
    	margin-bottom: 15px;
        background: #fff;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
	.signup-form h2 {
		color: #333;
		font-weight: bold;
        margin-top: 0;
    }
    .signup-form hr {
        margin: 0 -30px 20px;
    }    
	.signup-form .form-group{
		margin-bottom: 20px;
	}
	.signup-form input[type="checkbox"]{
		margin-top: 3px;
	}
	.signup-form .row div:first-child{
		padding-right: 10px;
	}
	.signup-form .row div:last-child{
		padding-left: 10px;
	}
    .signup-form .btn{        
        font-size: 16px;
        font-weight: bold;
		background: #3598dc;
		border: none;
		min-width: 140px;
    }
	.signup-form .btn:hover, .signup-form .btn:focus{
		background: #2389cd !important;
        outline: none;
	}
    .signup-form a{
		color: #fff;
		text-decoration: underline;
	}
	.signup-form a:hover{
		text-decoration: none;
	}
	.signup-form form a{
		color: #3598dc;
		text-decoration: none;
	}	
	.signup-form form a:hover{
		text-decoration: underline;
	}
    .signup-form .hint-text {
		padding-bottom: 15px;
		text-align: center;
    }
</style>
</head>
<body>
	<script>
function Validatepassword()
				   {
				
					var pass=document.getElementById('pass').value;
					var patt="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
					 if (pass.length<8)
							  {
					  document.getElementById('passworder').innerHTML="Atleast 8 character ";  
					  document.getElementById('pass').value = pass;
						  document.getElementById('pass').style.color = "red";
					return false;  
					}
				 
					else{
					document.getElementById('passworder').innerHTML=" ";
					document.getElementById('pass').style.color = "green";
				  // return true;s
					
				  }
				}
				function Confirmpass()
				   {
				
					var pass1=document.getElementById('pass').value;
					var pass2=document.getElementById('cpass').value;
					 if (pass1!=pass2)
							  {
					  document.getElementById('cpassworder').innerHTML="Password doesnt match ";  
					  document.getElementById('cpass').value = pass2;
						  document.getElementById('cpass').style.color = "red";
					return false;  
					}
				 
					else{
					document.getElementById('cpassworder').innerHTML=" ";
					document.getElementById('cpass').style.color = "green";
				  // return true;s
					
				  }
				}
				  function Val()
				  {
					if( Validatepassword()===false || Confirmpass()===false )
					{
					  return false;
					}
				  }

				  
			 </script>  
 
<div class="signup-form">
    <form action="passreset.php" method="post"  onsubmit="return Val()">
		<h2>Reset your Password</h2>
		<p>Please enter the details</p>
		<hr>
       
        <div class="form-group">
        	<input type="email" class="form-control" name="email" id="email" placeholder="email" value="<?php echo"$lol";?>" disabled required="required">
			
		</div> 
        <div class="form-group">
        	<input type="password" class="form-control" name="password" id="pass" placeholder="password"  onkeyup="return  Validatepassword()" required="required">
			<span id="passworder" style="color:red"></span> 
		</div> 
        <div class="form-group">
        	<input type="password" class="form-control" name="cpassword" id="cpass" placeholder="confirmpassword" onkeyup="return  Confirmpass()" required="required">
			<span id="cpassworder" style="color:red"></span> 
		</div> 
		
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit" value="submit" >Reset</button>
        </div>
    </form>
	
</div>
</div>
</body>
</html>
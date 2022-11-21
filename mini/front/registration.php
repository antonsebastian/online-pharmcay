<?php
include 'db.php';
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $password=$_POST['password'];
  
  $checkemail="select * from login where email='$email'";
  $run=mysqli_query($conn,$checkemail);
  $coun=mysqli_fetch_array($run);
  if($coun==0)
  {
  
  $sql="insert into `regst` (`fname`,`lname`,`email`,`phone`,`password`)
  values('$fname','$lname','$email','$phone','$password')";
  $sql2="insert into `login` (`email`,`password`,`usertype`)
  values('$email','$password','6')";
  

  $result=mysqli_query($conn,$sql);
  $result2=mysqli_query($conn,$sql2);
  if($result)
  {
    header('location:index.php');
 
  }
}
else{
	echo '<script>alert("Email Exist")</script>';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>PHARMATIVE</title>

<link rel="icon" type="image/x-icon" href="./images/022.png">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
</svg>
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
		color: #3598dc;
		background: #F3F2EF;
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
		color: #3598dc;
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
                  
				  function Validate() 
				  {
				  var val = document.getElementById('name').value;
				 
				  if(val.length<3||val.length>10){
					document.getElementById('msg1').innerHTML="Between 3 to 10 characters";
						  document.getElementById('name').value = val;


					  document.getElementById('name').style.color = "red";
							return false;
							
				  }
				  if (val.match(/^[A-Za-z]*$/)) 
				  {

					
					document.getElementById('msg1').innerHTML=" ";
					document.getElementById('name').style.color = "green";
					
						   
				  }
				  else{

					document.getElementById('msg1').innerHTML="only alphabets are allowed";
						  document.getElementById('name').value = val;
						  document.getElementById('name').style.color = "red";
						 // document.getElementById('contact_section input').style.border = "red";
							return false;
				   //return true;
				  }
				}
				  
				  function ValidateEmail()
				  {
			   
					var email=document.getElementById('email').value;  
			
				   if(email.match(/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/)){  
					document.getElementById('emailer').innerHTML=" ";
					document.getElementById('email').style.color = "green";
					}
					else{
					
					document.getElementById('emailer').innerHTML="Please enter a valid Email";  
					  document.getElementById('email').value = email;
						  document.getElementById('email').style.color = "red";
					return false;  
				   //return true;

					}}
					
					function Validatephone()
					{
						var ph = document.getElementById("phone").value;
                        var expr = /^[6-9]\d{9}$/;
                        if(ph.match(/^[6-9]\d{9}$/)){
              
							document.getElementById('phoner').innerHTML="";  
					  document.getElementById('phone').value = ph;
						  document.getElementById('phone').style.color = "green";
						}
					  
						
						else{
							document.getElementById('phoner').innerHTML="Invalid Mobile number";  
					  document.getElementById('phone').value = ph;
						  document.getElementById('phone').style.color = "red";
						  return false;
						}
					}
				  
				   function Validatepassword()
				   {
				
					var pass=document.getElementById('password').value;
					var patt="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
					 if (pass.length<8)
							  {
					  document.getElementById('passworder').innerHTML="Atleast 8 character ";  
					  document.getElementById('password').value = pass;
						  document.getElementById('password').style.color = "red";
					return false;  
					}
				 
					else{
					document.getElementById('passworder').innerHTML=" ";
					document.getElementById('password').style.color = "green";
				  // return true;s
					
				  }
				}
				function Confirmpass()
				   {
				
					var pass1=document.getElementById('password').value;
					var pass2=document.getElementById('cpassword').value;
					 if (pass1!=pass2)
							  {
					  document.getElementById('cpassworder').innerHTML="Password doesnt match ";  
					  document.getElementById('cpassword').value = pass2;
						  document.getElementById('cpassword').style.color = "red";
					return false;  
					}
				 
					else{
					document.getElementById('cpassworder').innerHTML=" ";
					document.getElementById('cpassword').style.color = "green";
				  // return true;s
					
				  }
				}
				  function Val()
				  {
					if(Validate()===false || ValidateEmail()===false || Validatepassword()===false || Confirmpass()===false || Validatephone()===false)
					{
					  return false;
					}
				  }

				  
			 </script>   
			 
<div class="signup-form">
    <form action="registration.php" method="post"  name="rentform" onsubmit="return Val()">
		<div class="col-12">
			<div class="row">
				<div class="col-md-6">
				<h2>User</h2>
		
				</div>
				<div class="col-md-6">
				<div class="mylogo"><a href="index.php"><img src="../front/images/logo.jpg" class="img-fluid" width="80px" height="70px"></a></div>
				</div>
			</div>
		</div>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" id="name" class="form-control" name="fname" placeholder="First Name" onkeyup="return Validate()"><br></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="lname" placeholder="Last Name" required pattern="[A-Za-z_]+"></div>
			</div>  
			<span id="msg1" style="color:red"></span>      	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" id="email" placeholder="email" onkeyup="return ValidateEmail()" required="required">
			
			<span id="emailer" style="color:red"></span> 
			
		</div> 
		<div class="form-group">
            <input type="phone" class="form-control" name="phone" id="phone" placeholder="phone" onkeyup="return Validatephone()">
			<span id="phoner" style="color:red"></span> 
		</div>  
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password"  onkeyup="return  Validatepassword()" required="required">
			<span id="passworder" style="color:red"></span> 
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm Password" onkeyup="return  Confirmpass()" required="required">
			<span id="cpassworder" style="color:red"></span> 
		</div>
		      
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit" value="submit" ><i class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-capsule" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M1.828 8.9 8.9 1.827a4 4 0 1 1 5.657 5.657l-7.07 7.071A4 4 0 1 1 1.827 8.9Zm9.128.771 2.893-2.893a3 3 0 1 0-4.243-4.242L6.713 5.429l4.243 4.242Z"/>
</svg></i>Sign Up</button>
        </div>
    </form>
	<div>
	 <div class="hint-text ">Already have an account? <a href="index.php">Login here</a></div> 
	 <div class="hint-text">Agent registration<a href="a.php"><br>click here</a></div> 
	
</div>
</div>
</body>
</html>
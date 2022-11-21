<?php
include 'db.php';
if(isset($_POST['submit']))
{
  $fname=$_POST['fname'];
  $lname=$_POST['lname'];
  $email=$_POST['email'];
  $password=$_POST['password'];
  
  $chekemail="select * from login where email='$email'";
  $run=mysqli_query($conn,$chekemail);
  $coun=mysqli_fetch_array($run);
  if($coun==0)
  {
  
  $sql="insert into `manager` (`mname`,`memail`,`password`,`value`)
  values('$fname','$email','$password','0')";
  $sql2="insert into `login` (`email`,`password`,`usertype`)
  values('$email','$password','0')";
  

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
<meta charset="utf-8">
<link rel="icon" type="image/x-icon" href="./images/022.png">
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
<body>
<script>
                  
				  function Validate1() 
				  {
				  var val = document.getElementById('fname').value;
				 
				  if(val.length<3||val.length>10){
					document.getElementById('msg2').innerHTML="Between 3 to 10 characters";
						  document.getElementById('fname').value = val;


					  document.getElementById('fname').style.color = "red";
							return false;
							
				  }
				  if (val.match(/^[A-Za-z]*$/)) 
				  {

					
					document.getElementById('msg2').innerHTML=" ";
					document.getElementById('fname').style.color = "green";
					
						   
				  }
				  else{

					document.getElementById('msg2').innerHTML="Only alphabets are allowed";
						  document.getElementById('fname').value = val;
						  document.getElementById('fname').style.color = "red";
						 // document.getElementById('contact_section input').style.border = "red";
							return false;
				   //return true;
				  }
				}
				  
				function Validate2() 
				  {
				  var val = document.getElementById('lname').value;
				 
				  if(val.length<3||val.length>10){
					document.getElementById('msg3').innerHTML="Between 3 to 10 characters";
						  document.getElementById('lname').value = val;


					  document.getElementById('lname').style.color = "red";
							return false;
							
				  }
				  if (val.match(/^[A-Za-z]*$/)) 
				  {

					
					document.getElementById('msg3').innerHTML=" ";
					document.getElementById('lname').style.color = "green";
					
						   
				  }
				  else{

					document.getElementById('msg3').innerHTML="Only alphabets are allowed";
						  document.getElementById('lname').value = val;
						  document.getElementById('lname').style.color = "red";
						 // document.getElementById('contact_section input').style.border = "red";
							return false;
				   //return true;
				  }
				}
				  
				  function Validatemail()
				  {
			   
					var email=document.getElementById('email').value;  
			
				   if(email.match(/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/)){  
					document.getElementById('emailer1').innerHTML=" ";
					document.getElementById('email').style.color = "green";
					}
					else{
					
					document.getElementById('emailer1').innerHTML="Please enter a valid Email";  
					  document.getElementById('email').value = email;
						  document.getElementById('email').style.color = "red";
					return false;  
				   //return true;

					}}
					
				  
				   function ValidatePassword1()
				   {
				
					var pass=document.getElementById('password').value;
					var patt="/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/";
					 if (pass.length<8)
							  {
					  document.getElementById('passworder1').innerHTML="Atleast 8 character ";  
					  document.getElementById('password').value = pass;
						  document.getElementById('password').style.color = "red";
					return false;  
					}
				 
					else{
					document.getElementById('passworder1').innerHTML=" ";
					document.getElementById('password').style.color = "green";
				  // return true;s
					
				  }
				}
				function Confirmpass1()
				   {
				
					var pass1=document.getElementById('password').value;
					var pass2=document.getElementById('cpassword').value;
					 if (pass1!=pass2)
							  {
					  document.getElementById('cpassworder1').innerHTML="Password doesnt match ";  
					  document.getElementById('cpassword').value = pass2;
						  document.getElementById('cpassword').style.color = "red";
					return false;  
					}
				 
					else{
					document.getElementById('cpassworder1').innerHTML=" ";
					document.getElementById('cpassword').style.color = "green";
				  // return true;s
					
				  }
				}
				  function Val1()
				  {
					if(Validate1()===false || Validate2()===false || Validatemail()===false || ValidatePassword1()===false || Confirmpass1()===false )
					{
					  return false;
					}
				  }

				  
			 </script>   
<div class="signup-form">
    <form action="a.php" method="post" onsubmit="return Val1()">
		<h2>Agent Sign Up</h2>
		<p>Please fill in this form to create an account!</p>
		<hr>
        <div class="form-group">
				<input type="text" class="form-control" name="fname" placeholder="First Name" id="fname" onkeyup="return  Validate1()"  required >
				<span id="msg2" style="color:red"></span> 
				</div>   
				<div class="form-group">
				<input type="text" class="form-control" name="lname" placeholder="Last Name"  id="lname" onkeyup="return  Validate2()" required >
				<span id="msg3" style="color:red"></span>  
			      	
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="email"  id="email" onkeyup="return Validatemail()" required>
			<span id="emailer1" style="color:red"></span>  
        </div>
		 
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password"  id="password" onkeyup="return  ValidatePassword1()" required="required">
			<span id="passworder1" style="color:red"></span>  
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="cpassword" placeholder="confirmpassword" id="cpassword" onkeyup="return Confirmpass1()" required="required">
			<span id="cpassworder1" style="color:red"></span>  
        </div>
		      
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg" name="submit" value="submit" >sign Up</button>
        </div>
    </form>
	<div>
	 <div class="hint-text">Already have an account? <a href="index.php">Login here</a></div> 
	
</div>
</div>
</body>
</html>
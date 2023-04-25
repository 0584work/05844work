<!DOCTYPE html>
<?php 
//starting the session
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
  }
  if (!ISSET($_SESSION['unsucess'])) {
	$_SESSION['unsucess'] = 'temp';
  }
?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	</head>
	<Title>Register</Title>
<body>
	<div class="col-md-6 well" style="margin:auto;width:80%;">
		<!-- Link for redirecting to Login Page -->
		<br>
		<div class="col-md-6" style="margin:auto;">
			<!-- Registration Form start -->
			<form method="POST" action="save_member.php" style="width:100%;">	
				<div class="alert alert-info" style="text-align:center;">ลงทะเบียน</div>
				<div class="form-group">
					<label>Firstname</label>
					<input type="text" name="firstname" class="form-control" required="required"/>
				</div>
				<div class="form-group" style="margin-top:0.75rem;">
					<label>Lastname</label>
					<input type="text" name="lastname" class="form-control" required="required"/>
				</div>
				<div class="form-group" style="margin-top:0.75rem;">
					<label>Phone number</label>
					<input type="num" name="phone" class="form-control" required="required"/>
				</div>
				<div class="form-group" style="margin-top:0.75rem;">
					<label>Username</label>
					<input type="text" name="username" class="form-control" required="required"/>
				</div>
				<div class="form-group" style="margin-top:0.75rem;">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required="required" aria-labelledby="passwordHelpInline"/>
				</div>

				<?php
					//checking if the session 'success' is set. Success session is the message that the credetials are successfully saved.
					if(ISSET($_SESSION['success'])){
				?>
				<!-- Display registration success message -->
				<br><br>
				<div class="alert alert-success"><?php echo $_SESSION['success']?></div>
				<br><br>
				<?php
					//Unsetting the 'success' session after displaying the message. 
					unset($_SESSION['success']);
					}
				?>
				<?php
					$temp = $_SESSION['unsucess'];
					//checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
					if($temp == "Invalid phone number"){
				?>
				<!-- Display Login Error message -->
					<br><br>
					<div class="alert alert-danger"><?php echo $temp?></div>
					<br><br>
				<?php
					}
				?>
				<br>
				<button class="btn btn-primary btn-block" name="register" style="width:20%;margin:0 40% 0 40%;"><span class="glyphicon glyphicon-save"></span> Register</button>
			</form>	
			<!-- Registration Form end -->
			<br>
			<div class="sth center01">
				<p>เป็นสมาชิกแล้ว?</p>
			<a href="login.php" style="text-align:center; margin-left:0.5rem;"> เข้าสู่ระบบที่นี่ </a>
			</div>
		</div>
	</div>
</body>
</html>
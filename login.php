<!DOCTYPE html>
<?php 
if (session_status() !== PHP_SESSION_ACTIVE) {
	session_start();
  }
if (!ISSET($_SESSION['error'])) {
	$_SESSION['error'] = 'temp';
  }
//starting the session

?>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	</head>
<body>
	<div class="col-md-6 well" style="margin:auto;width:80%;">
		<hr style="border-top:1px dotted #ccc;"/>
		<!-- Link for redirecting page to Registration page -->

		<br style="clear:both;"/><br/>
		<div class="col-md-6" style="margin:auto;">
			<!-- Login Form Starts -->
			<form method="POST" action="login_query.php" style="width:100%;">	
				<div class="alert alert-info" style="text-align:center;">เข้าสู่ระบบ</div>
				<div class="form-group">
					<label>Username</label>
					<input type="text" name="username" class="form-control" required="required"/>
				</div>
				<div class="form-group" style="margin-top:0.75rem;">
					<label>Password</label>
					<input type="password" name="password" class="form-control" required="required"/>
				</div>
				<?php
					$errmas = $_SESSION['error'];
					//checking if the session 'error' is set. Erro session is the message if the 'Username' and 'Password' is not valid.
					if($errmas == "Invalid username or password"){
				?>
				<!-- Display Login Error message -->
					<br><br>
					<div class="alert alert-danger"><?php echo $errmas?></div>
					<br><br>
				<?php
					}
				?>
				<br>
				<button class="btn btn-primary btn-block" name="login" style="width:20%;margin:0 40% 0 40%;"><span class="glyphicon glyphicon-log-in"></span> Login</button>
			</form>	
			<!-- Login Form Ends -->
			<br>
			<div class="sth center01">
				<p>ยังไม่ได้เป็นสมาชิก?</p>
			<a href="index.php" style="text-align:center; margin-left:0.5rem;"> ลงทะเบียนที่นี่ </a>
			</div>
		</div>
	</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
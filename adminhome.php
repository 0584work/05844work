<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	<title>Admin Home</title>
	<style>
		.circle{
			margin-top:2rem;
			width: 20rem !important;
			height: 20rem !important;
		}
		.pic{
			box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
		}
		.center01 {
		display: flex;
		justify-content: center;
		}
		.margin01{
			margin: 0.2rem!important;
		}
		.width01{
			width: 40rem;
		}
	</style>
</head>
<body>
	<div class="center01">
		<div class = "circle">
			<img src="photo/admin.png" class="rounded mx-auto d-block pic img-thumbnail img-fluid" alt="...">
		</div>
	</div>
<h3 style="margin=2rem;" class="center01">Welcome,</h3>


<div class="container text-center center01">
	<div class="row row-cols-3 center01" style="width: 35rem;">

	<a href="customerdetail.php" role="button" class="btn btn-primary margin01 col " style="width: 10rem; margin-bottom:10px;">customerdetail</a>
	<a href="admindateedit.php" role="button" class="btn btn-primary margin01 col " style="width: 10rem; margin-bottom:10px;">admindateedit</a>
	<a href="login.php" role="button" class="btn btn-primary margin01 col " style="width: 10rem; margin-bottom:10px;">login</a>
	
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
<?php session_start();?>

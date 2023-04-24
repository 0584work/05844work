<?php session_start();?>
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
	<title>Home</title>
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
<?php
   class MyDB2 extends SQLite3 {
      function __construct() {
         $this->open('db/masterdata.db');
      }
   }
   
   
   // Open Database 
   $db2 = new MyDB2();
   if(!$db2) {
      echo $db->lastErrorMsg();
   }
   $temp = $_SESSION['user'];
   $sql ="SELECT * from member where mem_id=$temp";
   $ret = $db2->query($sql);
   $row = $ret->fetchArray(SQLITE3_ASSOC);
   ?>
<body>
	<div class="center01">
		<div class = "circle">
			<img src="photo/seller.png" class="rounded mx-auto d-block pic img-thumbnail img-fluid" alt="...">
		</div>
	</div>
<h3 class="center01 m-3">Welcome , <?php echo $row['username'];?></h3>


<div class="container text-center center01">
	<div class="row row-cols-2 center01" style="width: 30rem;">
	<a href="customerdetail_se.php" role="button" class="btn btn-primary margin01 col " style="width: 12rem; margin-bottom:10px;">ข้อมูลลูกค้า</a>
	<a href="caredit.php" role="button" class="btn btn-primary margin01 col " style="width: 12rem; margin-bottom:10px;">จัดการรายละเอียดรถยนต์</a>
	<a href="sellcar.php" role="button" class="btn btn-primary margin01 col " style="width: 12rem; margin-bottom:10px;">ดูรายการรถยนต์</a>
	</div>
</div>
<div class="container text-center center01">
	<hr style="width: 12rem;">
</div>
<div class="container text-center center01">
	<div class="row row-cols-2 center01" style="width: 30rem;">
	<a href="login.php" role="button" class="btn btn-primary margin01 col " style="width: 12rem; margin-bottom:10px;">logout</a>
	</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>

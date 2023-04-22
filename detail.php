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
	<title>Detail</title>
</head>
<body>
<?php require_once("navuser.php"); ?>
<?php
session_start();
    class MyDB extends SQLite3 {
        function __construct() {
          $this->open('db/product.db');
        }
        }

        $db = new MyDB();
        if($_GET["action"]){
            switch($_GET["action"]){
                case "add":
                    $ret = $db->query("SELECT * FROM tblproduct WHERE carid='".$_GET['code']."'");
                    $productbycode = $ret->fetchArray(SQLITE3_ASSOC);
            }}
		?>
	<div class="product_item" style="margin:0 10% 0 10%;">
		<form action="appointmentinfo.php?action=add&code=<?php echo $productbycode['carid'];?>" method="post" style="display:flex;">
			<div class="product_image" style="width:50%;margin:0 2rem 0 0;"><!--imageproduct-->
				<img src="<?php echo $productbycode['image'];?>" alt="image" style="width:100%;">
			</div>
			<div class="product-title-footer" style="width:50%;"><!--detail of car that set in database-->
				<div class='product-price' style="font-weight:600; font-size:1.75rem;">
					<?php echo $productbycode["year"]. " " . $productbycode["name"];?>
				</div>
				<div class='product-price'>
					<?php echo $productbycode["car_mileage"] . " กิโลเมตร " . " | " . " สี : " . $productbycode["color"];?>
				</div>
				<div class='product-price'>
					<?php echo $productbycode["car_defect"];?>
				</div>
				<div class='product-price'>
					<?php echo $productbycode["price"] . " บาท";?>
				</div>
				<div class='product-price'>
					<?php echo "รายละเอียดเพิ่มเติม : " . $productbycode["desc"];?>
				</div>
				<div class='card_action'>
					<input type="submit" class="btn btn-primary" value="booking">
				</div>
			</div>
		</form>	
	</div>
<?php
  $db->close();      
?>
</body>
</html>


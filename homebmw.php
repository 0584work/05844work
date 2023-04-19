<?php
    session_start();
    class MyDB extends SQLite3 {
        function __construct() {
          $this->open('db/product.db');
        }
        }

        $db = new MyDB();
		?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Bootstrap -->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com" target="_blank">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Login And Registration To Sqlite Using PDO</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<a href="login.php">Logout</a>
		<h1>Welcome User!</h1>
	</div>
    <form action="home.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="home">
	</form>
	<!--button to go to customer appointment edit-->
	<form action="customereditdate.php?" method="post">
		<input type="submit" class="btnadd" value="edit">
	</form>
	<form action="customercheckdate.php?" method="post">
		<input type="submit" class="btnadd" value="check">
	</form>

<?php 
//start of loop card to display simple data of car
	$ret = $db->query("SELECT * FROM tblproduct where series='bmw' ORDER BY carid ASC");
	while($product_array = $ret->fetchArray(SQLITE3_ASSOC)){
?>
	<div class='card'>
		<form action="detail.php?action=add&code=<?php echo $product_array['carid'];?>" method="post">
			<div class = "product_image">
				<img src="<?php echo $product_array['image'];?>" alt="image"><!--image-->
			</div>
			<div class="product-title-footer">
				<div class='product-title'><?php echo $product_array["series"];?></div><!--name-->
				<div class='product-title'><?php echo $product_array["carid"];?></div><!--carid-->
				<div class='product-price'><?php echo $product_array["price"] . " bath";?></div><!--price-->
				<div class='card_action'>
					<input type="submit" class="btnadd" value="detail"><!--button to go to detail page-->
				</div>
			</div>
		</form>
	</div>
<?php
			}
  $db->close();      
?>
</div>
</body>
</html>
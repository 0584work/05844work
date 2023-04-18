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
	<div id="product-grid">

<?php 
//start of loop card
	$ret = $db->query("SELECT * FROM tblproduct ORDER BY carid ASC");
	while($product_array = $ret->fetchArray(SQLITE3_ASSOC)){
?>
	<div class='product_item'>
		<form action="detail.php?action=add&code=<?php echo $product_array['carid'];?>" method="post">
			<div class = "product_image">
				<img src="<?php echo $product_array['image'];?>" alt="image">
			</div>
			<div class="product-title-footer">
				<div class='product-title'><?php echo $product_array["series"];?></div>
				<div class='product-title'><?php echo $product_array["carid"];?></div>
				<div class='product-price'><?php echo $product_array["price"] . " bath";?></div>
				<div class='card_action'>
					<<input type="submit" class="btnadd" value="detail">
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
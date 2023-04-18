<?php
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
	<form action="home.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="home">
	</form>
	<div class='product_item'>
		<form action="appointmentinfo.php?action=add&code=<?php echo $productbycode['carid'];?>" method="post">
			<div class = "product_image"><!--imageproduct-->
				<img src="<?php echo $productbycode['image'];?>" alt="image">
				<img src="<?php echo $productbycode['image2'];?>" alt="image">
				<img src="<?php echo $productbycode['image3'];?>" alt="image">
			</div>
			<div class="product-title-footer"><!--detail of car that set in database-->
				<div class='product-title'><?php echo $productbycode["series"];?></div>
				<div class='product-price'><?php echo $productbycode["license_palate"];?></div>
				<div class='product-price'><?php echo $productbycode["year"];?></div>
				<div class='product-price'><?php echo $productbycode["color"];?></div>
				<div class='product-price'><?php echo $productbycode["car_mileage"] . " kilo";?></div>
				<div class='product-price'><?php echo $productbycode["car_defect"];?></div>
				<div class='product-price'><?php echo $productbycode["price"] . " bath";?></div>
				<div class='product-price'><?php echo $productbycode["desc"];?></div>
				<div class='card_action'>
					<input type="submit" class="btnadd" value="booking">
				</div>
			</div>
		</form>	
	</div>
<?php
  $db->close();      
?>
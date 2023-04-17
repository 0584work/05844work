<?php
    session_start();
    class MyDB extends SQLite3 {
        function __construct() {
          $this->open('db/product.db');
        }
        }

        $db = new MyDB();
        if(($_GET["action"])){
            switch($_GET["action"]){
                case "add":
                    $ret = $db->query("SELECT * FROM tblproduct WHERE code='".$_GET["code"]."'");
                    $productbycode = $ret->fetchArray(SQLITE3_ASSOC);
            }}
		?>
	<div class='product_item'>
		<form action="appointmentuser.php?action=add&code=<?php echo $productbycode['code'];?>">
			<div class = "product_image">
				<img src="<?php echo $productbycode['image'];?>" alt="image">
			</div>
			<div class="product-title-footer">
				<div class='product-title'><?php echo $productbycode["name"];?></div>
				<div class='product-price'><?php echo $productbycode["price"] . " bath";?></div>
				<div class='card_action'>
					<<input type="submit" class="btnadd" value="detail">
				</div>
			</div>
		</form>
		
	</div>
<?php
  $db->close();      
?>
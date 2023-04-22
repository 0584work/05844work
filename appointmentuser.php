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
                    $ret = $db->query("SELECT * FROM tblproduct WHERE carid='".$_GET["code"]."'");
                    $productbycode = $ret->fetchArray(SQLITE3_ASSOC);
            }}
        $cusid = $_SESSION['user'];
        $date = $_SESSION['bookingdate'];
        class MyDB2 extends SQLite3 {
            function __construct() {
              $this->open('db/db_member.sqlite3');
            }
            }
    
            $db2 = new MyDB2();
            $ret = $db2->query("SELECT * FROM member WHERE mem_id=$cusid");
            $usser = $ret->fetchArray(SQLITE3_ASSOC);
		?>
  <form action="home.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="home">
	</form>
    <?php
        $price = ceil(($productbycode['price'] * 0.01));
    ?>
  <!--form to add database and go to payment-->
  <form class="d-flex flex-column w-50 align-items-center justify-content-center" 
  action="beforepayment.php?action=add&code=<?php echo $productbycode['carid'];?>" method="POST">
        <label for="">name</label>
        <input class="w-50" type="text" name="cusid" id="cusid" value="<?php echo $usser['firstname'];?> <?php echo $usser['lastname'];?>" readonly>
        <label for="">license_palate</label>
        <input class="w-50" type="text" name="carid" id="carid" value="<?php echo $productbycode['license_palate'];?>" readonly>
        <label for="">date</label>
        <input class="w-50" type="text" name="date" id="date" value="<?php echo $date;?>" readonly>
        <label for="">price</label>
        <input class="w-50" type="text" name="price" id="price" value="<?php echo $price;?>" readonly>
        <div class="d-flex justify-content-between w-50">
            <button class="btn btn-primary" type="submit" name="send">book</button>
        </div>
    </form> 

    <?php  
    $db->close();   

?>
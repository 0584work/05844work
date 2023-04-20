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
            $cid=$_SESSION['user'];
		?>
  <form action="home.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="home">
	</form>
    <!--form to add payment-->
<div>uipayment wait</div>
<form class="d-flex flex-column w-50 align-items-center justify-content-center" method="POST">
        <label for="">cusid</label>
        <input class="w-50" type="text" name="cusid" id="cusid" value="<?php echo $cid;?>" readonly>
        <label for="">license_palate</label>
        <input class="w-50" type="text" name="carid" id="carid" value="<?php echo $productbycode['license_palate'];?>" readonly>
        <label for="">รหัสอ้างอิง</label>
        <input class="w-50" type="text" name="accn" id="accn" value="รหัสอ้างอิง" required="required">
        <label for="">total</label>
        <input class="w-50" type="text" name="val" id="val" required="required">
        <div class="d-flex justify-content-between w-50">
            <button class="btn btn-primary" type="submit" name="pay">pay</button>
        </div>
</form>

    <?php   
    if(array_key_exists('pay', $_POST)) {
      button1();
      }
      //function to add payment
    function button1() {
      class MyDB2 extends SQLite3 {
      function __construct() {
       $this->open('db/payment.db');
      }}
      $db2 = new MyDB2();
      ?>
  
      <?php
        $cusid = $_POST['cusid'];
        $carid = $_POST['carid'];
        $acc = $_POST['accn'];
        $total = $_POST['val'];

        $sql =<<<EOF
           INSERT INTO tblpay (cusid,carid,accountnumber,total)
           VALUES ('$cusid','$carid','$acc','$total');
        EOF;
        $ret = $db2->exec($sql);  
        if(!$ret) {
          echo $db2->lastErrorMsg();
        } else {
          echo "Records created successfully<br>";
          header( "refresh:5;url=afterpayment.php" );
        }      
        $db2->close();
     }
      ?>  


<!--form+qr-->
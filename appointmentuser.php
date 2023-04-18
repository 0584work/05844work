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
		?>
  <form action="home.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="home">
	</form>
  <!--form to add database and go to payment-->
  <form class="d-flex flex-column w-50 align-items-center justify-content-center" 
  action="payment.php?action=add&code=<?php echo $productbycode['carid'];?>" method="POST">
        <input class="w-50" type="text" name="cusid" id="cusid">
        <label for="">cusid</label>
        <input class="w-50" type="text" name="carid" id="carid" value="<?php echo $productbycode['carid'];?>">
        <label for="">carid</label>
        <input class="w-50" type="text" name="date" id="date" value="">
        <label for="">date</label>
        <div class="d-flex justify-content-between w-50">
            <button class="btn btn-primary" type="submit" name="send">book</button>
        </div>
    </form>  

    <?php  
    $db->close();   
    if(array_key_exists('send', $_POST)) {
      button1();
      }
    function button1() {
      class MyDB2 extends SQLite3 {
      function __construct() {
       $this->open('db/appointment.db');
      }}
      $db2 = new MyDB2();
      ?>
  
      <?php
        $cusid = $_POST['cusid'];
        $carid = $_POST['carid'];
        $date = $_POST['date'];
        $status = "pending";
        if($db2->query("select * from `booking` where car_id=$carid and customer_apointment_date=$date") == FALSE){
        $sql =<<<EOF
           INSERT INTO booking (cus_id,car_id ,status,customer_apointment_date)
           VALUES ('$cusid','$carid','$status','$date');
        EOF;
        $ret = $db2->exec($sql);        
        if(!$ret) {
          echo $db2->lastErrorMsg();
        } else {
          echo "Records created successfully<br>";
        }
        $db2->close();
      }
      else{
        echo "error duplicate";
      }
    }
        

?>
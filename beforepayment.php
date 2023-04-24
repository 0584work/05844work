<?php
    session_start();
    class MyDB extends SQLite3 {
        function __construct() {
          $this->open('db/masterdata.db');
        }
        }

        $db = new MyDB();
        if(($_GET["action"])){
            switch($_GET["action"]){
                case "add":
                    $ret = $db->query("SELECT * FROM tblproduct WHERE license_palate='".$_GET["code"]."'");
                    $productbycode = $ret->fetchArray(SQLITE3_ASSOC);
            }}
        $cusid = $_SESSION['user'];
        $date = $_SESSION['bookingdate'];
		?>
  <form action="home.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="home">
	</form>
  <!--form to add database and go to payment-->
  <form class="d-flex flex-column w-50 align-items-center justify-content-center" 
  action="payment.php?action=add&code=<?php echo $productbycode['license_palate'];?>" method="POST">
       <h1>Booking complete</h1>
        <div class="d-flex justify-content-between w-50">
            <button class="btn btn-primary" type="submit" name="send">book</button>
        </div>
    </form> 

    <?php  
    $db->close();   

?>
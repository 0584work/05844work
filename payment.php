<?php
    session_start();
    class MyDB extends SQLite3 {
        function __construct() {
          $this->open('db/payment.db');
        }
        }

        $db = new MyDB();
		?>
        <!--form add modify delete-->
<div>uipayment wait</div>
<form action="/action_page.php">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="John"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="Doe"><br><br>
  <input type="submit" value="Submit">
</form> 
<?php
  $db->close();      
?>
<!--form+qr-->
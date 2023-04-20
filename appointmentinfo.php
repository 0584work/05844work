<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>th, td {
  border-bottom: 3px solid #ddd;
}</style>
</head>
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
<body>
<form action="home.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="home">
	</form>
    <!--form to check day that selected car has been appointment(not sent data to next page)-->
   <form method='post'>
      <label for='nam'>date : </label>
      <input type='datetime-local' name ='cardate' required="required"><br><br>
      <input type='hidden' name ='carid' value="<?php echo $productbycode['license_palate'];?>">
      <input type='submit' name='button1'value='Submit'/>
   </form>
   <form action="appointmentuser.php?action=add&code=<?php echo $productbycode['carid'];?>" method="post"><!--go nextbutton-->
		<input type="submit" class="btnadd" value="next">
	</form>

<?php
   $db->close();
   // Connect to Database 
  
   // Open Database 
   
   if(array_key_exists('button1', $_POST)) {
     button1();
     }
   
    class MyDB2 extends SQLite3 {
      function __construct() {
         $this->open('db/appointment.db');
      }
   }
    $db2 = new MyDB2();
    $id = $_SESSION['user'];
    $sql ="SELECT * from booking where cus_id = $id";
    echo "<table id='table1'><tr><th>cus_id</th><th>car_id</th><th>status</th><th>appointment_date</th></tr>";
    $ret = $db2->query($sql);
   //table to display date that has been appoint by selected car
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
        echo "<tr>";
        echo "<td>". $row['cus_id'] . "</td>";
        echo "<td>". $row['car_id']."</td>";
        echo "<td>". $row['status'] ."</td>";
        echo "<td>". $row['customer_apointment_date'] ."</td>";
        echo "</tr>";
     }
    // Close database
    echo "</table>";
   
        function button1() { 
          class MyDB3 extends SQLite3 {
            function __construct() {
               $this->open('db/appointment.db');
            }
         }
        $db3 = new MyDB3();
        $cusid = $_SESSION['user'];
        $carid = $_POST['carid'];
        $date = $_POST['cardate'];
        strval($date);
        $_SESSION['bookingdate'] = $date;
        $status = "pending";
        $sql ="SELECT * from booking where car_id = $carid";
        $ret = $db3->query($sql);
        $check = 0;
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
        if ($date == $row['customer_apointment_date']){
          $check = 1;
          break;
        }
        }//check duplicate and add to database
        if ($check == 0){$sql =<<<EOF
           INSERT INTO booking (cus_id,car_id ,status,customer_apointment_date)
           VALUES ($cusid,$carid,'$status','$date');
        EOF;
        $ret = $db3->exec($sql);        
        if(!$ret) {
          echo $db3->lastErrorMsg();
        } else {
          echo "Records created successfully<br>";
          header( "refresh:5;url=appointmentuser.php");
        }
      }
      else{
        echo "data duplicate<br>";
      }
        $db3->close();
      }
      
    $db2->close();
    
    ?>   
</body>
</html>
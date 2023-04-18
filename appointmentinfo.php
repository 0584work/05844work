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
      <label for='idd'>car ID : </label>
      <input type='num' name ='id' value='<?php echo $productbycode['carid'];?>'><br><br>
      <label for='nam'>date : </label>
      <input type='text' name ='cardate'><br><br>
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
   function button1() { 
    class MyDB2 extends SQLite3 {
      function __construct() {
         $this->open('db/appointment.db');
      }
   }
    $db2 = new MyDB2();
    $id = $_POST['id'];
    $date = $_POST['cardate'];
    $sql ="SELECT * from booking where car_id = $id";
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

      $db2->close();
    }
    ?>   
</body>
</html>
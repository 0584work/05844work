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
<body>
<form action="adminhome.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="adminhome">
	</form>
   <form action="sellerhome.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="sellerhome">
	</form>
<?php
   // Connect to Database 
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('db/db_member.sqlite3');
      }
   }

   // Open Database 
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   }
   $sql ="SELECT * from member where role='cus'";
   echo "<table id='table1'><tr><th>CUSTOMER</th></tr><tr><th>cusid</th><th>userneme</th><th>password</th><th>firstname</th><th>lastname</th>
   <th>role</th><th>phonenumber</th></tr>";
   $ret = $db->query($sql);
   //table to display all customer in database
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<tr>";
      echo "<td>". $row['mem_id'] . "</td>";
      echo "<td>". $row['username']."</td>";
      echo "<td>". $row['password'] ."</td>";
      echo "<td>".$row['firstname'] ."</td>";
      echo "<td>".$row['lastname'] ."</td>";
      echo "<td>".$row['role'] ."</td>";
      echo "<td>".$row['phonenumber'] ."</td>";
      echo "</tr>";
   }
   echo "</table>";
   //table data info
   
    ?>
    <?php
   // Connect to Database 
   class MyDB2 extends SQLite3 {
      function __construct() {
         $this->open('db/appointment.db');
      }
   }
    $db2 = new MyDB2();
    $sql ="SELECT * from booking";
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
   
    ?>
<?php
   // Connect to Database 
   class MyDB5 extends SQLite3 {
      function __construct() {
         $this->open('db/payment.db');
      }
   }

   // Open Database 
   $db5 = new MyDB5();
   if(!$db5) {
      echo $db5->lastErrorMsg();
   }
   $sql ="SELECT * from tblpay";
   echo "<table id='table1'><tr><th>PAYMENT</th></tr><tr><th>cusid</th><th>carid</th><th>รหัสอ้างอิง</th><th>total</th></tr>";
   $ret = $db5->query($sql);
   //table to display all payment in database
   while($row = $ret->fetchArray(SQLITE3_ASSOC)) {
      echo "<tr>";
      echo "<td>". $row['cusid'] . "</td>";
      echo "<td>". $row['carid']."</td>";
      echo "<td>".$row['accountnumber'] ."</td>";
      echo "<td>".$row['total'] ."</td>";
      echo "</tr>";
   }
   echo "</table>";
    ?>   
</body>
</html>   
<?php session_start();?>
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
<form action="home.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="home">
	</form>
<?php
   // Connect to Database 
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('db/appointment.db');
      }
   }

   // Open Database 
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   }
   $temp = $_SESSION['user'];
   $sql ="SELECT * from booking where cus_id=$temp";
   echo "<table id='table1'><tr><th>cusid</th><th>carid</th><th>staffid</th><th>status</th><th>date</th><th>appointmentid</th></tr>";
   $ret = $db->query($sql);
   //table to display all date
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<tr>";
      echo "<td>". $row['cus_id'] . "</td>";
      echo "<td>". $row['car_id']."</td>";
      echo "<td>". $row['appointment_staff_id'] ."</td>";
      echo "<td>".$row['status'] ."</td>";
      echo "<td>".$row['customer_apointment_date'] ."</td>";
      echo "</tr>";
   }
   echo "</table>";
   //table data info
    ?>   
</body>
</html>
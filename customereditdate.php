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
   <form method='post'><!--form info-->
      <label>cusid : </label>
      <input type='num' name ='cusid'><br><br>
      <label>carid : </label>
      <input type='text' name ='car'><br><br>
	  <label>old date : </label>
      <input type='text' name ='dat'><br><br>
      <label>new date : </label>
      <input type='text' name ='dat2'><br><br>
      <input type='submit' name='button2'value='modify'/>
      <input type='submit' name='button3'value='delete'/>
      <input type='submit' name='button4'value='end process'/>
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
   $sql ="SELECT * from booking";
   echo "<table id='table1'><tr><th>cusid</th><th>carid</th><th>staffid</th><th>status</th><th>date</th></tr>";
   $ret = $db->query($sql);
   
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
   if(array_key_exists('button2', $_POST)) {
    button2();
  }
    function button2() {
       class MyDB3 extends SQLite3 {
          function __construct() {
             $this->open('db/appointment.db');
          }
       }
    
       // Open Database 
       $db3 = new MyDB3();
       if(!$db3) {
          echo $db3->lastErrorMsg();
       }
       $cusid = $_POST['cusid'];
       $carid = $_POST['car'];
       $dat = $_POST['dat'];
	   $dat2 = $_POST['dat2'];

       $sql =<<<EOF
          UPDATE booking set 
          customer_apointment_date=$dat2
          WHERE cus_id=$cusid and car_id=$carid and customer_apointment_date=$dat;
          EOF;
    
       $ret = $db3->exec($sql);
       if(!$ret) {
          echo $db3->lastErrorMsg();
       } else {
          echo "Records modify successfully<br>";
       }
 }
 if(array_key_exists('button3', $_POST)) {
  button3();
}
  function button3() {
     class MyDB4 extends SQLite3 {
        function __construct() {
           $this->open('db/appointment.db');
        }
     }
  
     // Open Database 
     $db4 = new MyDB4();
     if(!$db4) {
        echo $db4->lastErrorMsg();
     }
     $cusid = $_POST['cusid'];
     $carid = $_POST['car'];
     $dat = $_POST['dat'];

     $sql =<<<EOF
        DELETE FROM booking WHERE cus_id=$cusid and car_id=$carid and customer_apointment_date=$dat;
        EOF;
  
     $ret = $db4->exec($sql);
     if(!$ret) {
        echo $db4->lastErrorMsg();
     } else {
        echo "Records delete successfully<br>";
     }
  }
  if(array_key_exists('button4', $_POST)) {
    button4();
  }
  function button4() {
    $db3->close();
    $db4->close();
  }
    ?>   
</body>
</html>
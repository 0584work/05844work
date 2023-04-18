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
   <form method='post'><!--form info-->
      <label>cusid : </label>
      <input type='num' name ='cusid'><br><br>
      <label>carid : </label>
      <input type='text' name ='car'><br><br>
      <label>staffid : </label>
      <input type='text' name ='staf'><br><br>
      <label>status : </label>
      <input type='text' name ='sta'><br><br>
      <label>old date(not require when add) : </label>
      <input type='text' name ='dat'><br><br>
      <label>new date(not require when delete) : </label>
      <input type='text' name ='dat2'><br><br>
      <input type='submit' name='button1'value='add'/>
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
   if(array_key_exists('button1', $_POST)) {
      button1();
    }
      function button1() {
         class MyDB2 extends SQLite3 {
            function __construct() {
               $this->open('db/appointment.db');
            }
         }
      
         // Open Database 
         $db2 = new MyDB2();
         if(!$db2) {
            echo $db2->lastErrorMsg();
         }
         $cusid = $_POST['cusid'];
         $carid = $_POST['car'];
         $staff = $_POST['staf'];
         $stat = $_POST['sta'];
         $dat2 = $_POST['dat2'];
      
         $sql =<<<EOF
            INSERT INTO booking (cus_id,car_id,appointment_staff_id,status,customer_apointment_date)
            VALUES ($cusid,$carid, $staff, $stat ,$dat2);
            EOF;
      
         $ret = $db2->exec($sql);
         if(!$ret) {
            echo $db2->lastErrorMsg();
         } else {
            echo "Records created successfully<br>";
         }
   }
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
       $staff = $_POST['staf'];
       $stat = $_POST['sta'];
       $dat = $_POST['dat'];
       $dat2 = $_POST['dat2'];

       $sql =<<<EOF
          UPDATE booking set 
          aappointment_staff_id=$staff,
          status=$stat,
          customer_apointment_date=$dat2
          WHERE cus_id=$cusid and car_id=$cari and customer_apointment_date=$dat;
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
     $staff = $_POST['staf'];
     $stat = $_POST['sta'];
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
    $db2->close();
    $db3->close();
    $db4->close();
  }
    ?>   
</body>
</html>
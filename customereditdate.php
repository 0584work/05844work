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
   <form method='post'><!--form to insert data to edit date-->
	   <label>new date : </label>
      <input type='datetime-local' name ='dat' required="required"><br><br>
      <label>id : </label>
      <input type='text' name ='cid' required="required"><br><br>
      <input type='submit' name='button2'value='modify'/><!--to modify date-->
      <input type='submit' name='button3'value='delete'/><!--to delete date-->
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
      echo "<td>".$row['appointmentid'] ."</td>";
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
       $cusid = $_SESSION['user'];
       $appid = $_POST['dat'];
       $dat = $_POST['dat'];

       $sql =<<<EOF
          UPDATE booking set 
          customer_apointment_date=$dat
          WHERE appointmentid=$appid AND cus_id = $cusid;
          EOF;
          //query modify data to database
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
     $appid = $_POST['dat'];
     $dat = $_POST['dat'];

     $sql =<<<EOF
        DELETE FROM booking WHERE appointmentid=$appid AND cus_id = $cusid;
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
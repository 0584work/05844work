<?php session_start();?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>เช็คสถานะการจองนัด</title>
    <style>
      body {
  font-family: "Kanit", sans-serif!important;
}
      th, td {
         border-bottom: 3px solid #ddd;
      }  
      .ta{
               width:60%!important;
               margin: 2rem 0;
      }
      .center01 {
               display: flex;
               justify-content: center;
      }
   </style>
  
</head>
<body>
<?php require_once("navuser.php"); ?>

<?php

   // Connect to Database 
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('db/masterdata.db');
      }
   }
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   }
   $temp = $_SESSION['user'];
   $sql ="SELECT * from member where mem_id=$temp";
   $ret = $db->query($sql);
   //table to display all customer in database
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<div class=\"center01\" style=\"text-align:center;margin:1rem;\" id=\"ses1\"><h3>
      "
      ."สถานะการจองนัดของ"."<br>"
      .$row['firstname']." ".$row['lastname'] .
      "</h3></td></div>";
   }
   // Open Database 
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   }
   
   $sql ="SELECT * from booking where cus_id=$temp";
   
   echo "
   <div class=\"center01\" id=\"ses1\">
   <table  class=\"table ta\">
   <thead>
   <tr>
   <th>ทะเบียนรถยนต์</th>
   <th>status</th>
   <th>วันที่</th>
   <th>หมายเลขการจองนัด</th>
   </tr></thead><tbody>";
   $ret = $db->query($sql);
   //table to display all date
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      
      echo "<tr>";
      echo "<td>". $row['car_id']."</td>";
      echo "<td>".$row['status'] ."</td>";
      echo "<td>".$row['customer_apointment_date'] ."</td>";
      echo "<td>".$row['appointmentid'] ."</td>";
      echo "</tr>";
   }
   echo "</table></div>";
   //table data info
    ?>   
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
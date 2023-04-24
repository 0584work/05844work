<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <link rel="stylesheet" href="css/home.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
   <title>จัดการรายละเอียดรถยนต์</title>
   <style>th, td {
               border-bottom: 3px solid #ddd;
            }
            .center01 {
               display: flex;
               justify-content: center;
            }
            .ta{
               width:95%!important;
            }
   </style>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
</head>
<body>
<br><br><a href="home.php" role="button" style="margin-left:5rem;"> &#9754; &nbsp; กลับเข้าสู่หน้าหลัก</a>
   
<?php session_start();?>
<?php
   // Connect to Database 
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('db/masterdata.db');
      }
   }

   // Open Database 
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   }
    $sql ="SELECT * from booking";
    echo "<br><br>
    <h3 style=\"text-align:center;font-weight:600;\"> รายละเอียดสถานะการจองทั้งหมด </h3>
    <br>
    <div class=\"center01\" id=\"ses1\">
    <table  class=\"table ta\">
    <thead><tr><th>cus_id</th><th>license_plate</th><th>status</th><th>appointment_date</th>
    </tr></thead><tbody>";
    $ret = $db->query($sql);
   //table to display all appointment in database
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
        echo "<tr>";
        echo "<td>". $row['cus_id'] . "</td>";
        echo "<td>". $row['car_id']."</td>";
        echo "<td>". $row['status'] ."</td>";
        echo "<td>". $row['customer_apointment_date'] ."</td>";
        echo "</tr>";
     }
    // Close database
   echo "</tbody></table></div>";
   
    ?>   
</body>
</html>
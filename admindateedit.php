<?php session_start(); ?>
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
   <title>จัดการสถานะการจองนัดของลูกค้า</title>
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
<br><br><a href="adminhome.php" role="button" style="margin-left:5rem;"> &#9754; &nbsp; กลับเข้าสู่หน้าหลัก</a><br><br>
   <h3 style="text-align:center;font-weight:600;"> จัดการสถานะการจองนัดของลูกค้า </h3>

<div class="center01 mt-4">
<div class="center01" style="width:60%;padding :3% 7%;background-color:#E8e8e8;border-radius:2rem;" >
<form class="row g-3 center01" method="post" style="padding:5% 0 0 0;">
      <div class="col-md-4">
         <label for="inputEmail4" class="form-label">สถานะลูกค้า : </label>
         <select name="sta" class="form-select" aria-label="Default select example">
            <option value="0000">-----</option>
            <option value="complete">สิ้นสุดการนัด</option>
            <option value="booking">ยืนยันการนัด</option>
            <option value="pending">รอการยืนยัน</option>
         </select>
      </div>
      <div class="col-md-4">
         <label for="inputEmail4" class="form-label">หมายเลขการจองนัด : </label>
         <input type='int' name ='appid' class="form-control" id="inputEmail4">
      </div>
      <div class="center01" style="width:100%; margin:1rem 0 0 0;">
            <input type='submit' style="width:20%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;" class="btn" name='button2'value='แก้ไขข้อมูล'/><!--modify car data-->
      </div>
   </form>
   </div>
   </div>

   <br><br>
   <div class="center01">
   <hr style="width: 60rem;">
   </div>

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
   $sql ="SELECT tblpay.*,booking.* from booking left join tblpay on tblpay.appointmentid = booking.appointmentid";
   echo "
   <br><br>
   <h3 style=\"text-align:center;font-weight:600;\"> ตารางสถานะการจองนัด </h3>
   <br>
   <div class=\"center01\" id=\"ses1\">
   <table  class=\"table ta\">
   <thead>
   <tr><th>ทะเบียนรถยนต์</th>
      <th>สถานะของการนัด</th>
      <th>วันที่ทำการนัด</th>
      <th>เวลาที่ทำการนัด</th>
      <th>หมายเลขการจองนัด</th>
      <th>หลักฐานการจองนัด</th>
   </tr></thead><tbody>";
   $ret = $db->query($sql);
   //table to display database
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<tr>";
      echo "<td>". $row['car_id']."</td>";
      echo "<td>".$row['status'] ."</td>";
      echo "<td>".$row['apointment_date'] ."</td>";
      echo "<td>".$row['apointment_time'] ."</td>";
      echo "<td>".$row['appointmentid'] ."</td>";
      echo "<td>".$row['accountnumber'] ."</td>";
      echo "</tr>";
   }
   echo "</tbody></table></div>";
  //funcion to modify data to database
   if(array_key_exists('button2', $_POST)) {
    button2();
  }
    function button2() {
       class MyDB3 extends SQLite3 {
          function __construct() {
             $this->open('db/masterdata.db');
          }
       }
       // Open Database 
       $db3 = new MyDB3();
       if(!$db3) {
          echo $db3->lastErrorMsg();
       }
       $stat = $_POST['sta'];
       $appid = $_POST['appid'];
       //query modify data to database
       $sql =<<<EOF
          UPDATE booking set
          status = '$stat'
          WHERE appointmentid ='$appid';
       EOF;
    
       $ret = $db3->exec($sql);
       if(!$ret) {
          echo $db3->lastErrorMsg();
       } else {
          echo "Records modify successfully<br>";
       }
      }
      
    ?>  
</body>
</html>
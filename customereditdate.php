<?php session_start();?>
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
    <title>จัดการนัดทดลองขับรถยนต์</title>
    <style>th, td {
               border-bottom: 3px solid #ddd;
            }
            .center01 {
               display: flex;
               justify-content: center;
            }
            .ta{
               width:60%!important;
            }
</style>
</head>
<body>
<br><br><a href="home.php" role="button" style="margin-left:5rem;"> &#9754; &nbsp; กลับเข้าสู่หน้าหลัก</a><br><br>
   <h3 style="text-align:center;font-weight:600;"> จัดการนัดทดลองขับรถยนต์ </h3>
   <br>
   <div class="center01">
   <div class="center01 " style="width:40%;padding :3% 7%;background-color:#E8e8e8;border-radius:2rem;">
   <form method='post'><!--form to insert data to edit date-->
	   <label class="form-label">วันนัดใหม่ : </label>
      <input type='date' name ='dat' required="required" class="form-control"><br>
      <label class="form-label">เวลานัดใหม่ : </label>
      <input type='time' name ='dat2' required="required" class="form-control"><br>
      <label class="form-label">หมายเลขการจองนัด : </label>
      <input type='text' name ='cid' required="required" class="form-control"><br>
   <div class="center01" style="width:100%; margin:1rem 0 0 0;">
      <input type='submit' name='button2'value='แก้ไขนัด' class="btn" style="width:50%;margin:0 0.5rem 0 0.5rem;background-color:#B0b8ff;"/><!--to modify date-->
      <input type='submit' name='button3'value='ยกเลิกนัด' class="btn" style="width:50%;margin:0 0.5rem 0 0.5rem;background-color:#B0b8ff;"/><!--to delete date-->
   </div>
   </form>
   </div>
   </div>
   <br><br>
   <div class="center01">
   <hr style="width: 50rem;">
   </div>

<?php
   
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
       $cusid = $_SESSION['user'];
       $appid = $_POST['cid'];
       strval($appid);
       $dat = $_POST['dat'];
       $dat2 = $_POST['dat2'];
       strval($dat);
       strval($dat2);
       $sql =<<<EOF
          UPDATE booking set 
          apointment_date='$dat',
          apointment_time='$dat2'
          WHERE appointmentid='$appid' AND cus_id = $cusid;
         EOF;
          //query modify data to database
       $ret = $db3->exec($sql);
       if(!$ret) {
          echo $db3->lastErrorMsg();
       } else {
         echo "<div class='center01 mt-3'>
         <div class='center01' style='width:60%;background-color:#E8e8e8;border-radius:2rem;' >
           <form class='col-md-4' style='padding:5% 0 0 0;' >
         <div class='alert alert-success' style='text-align: center;'>แก้ไขการจองนัดสำเร็จ<br></div></form></div></div>";
       }
      }
 if(array_key_exists('button3', $_POST)) {
  button3();
}
  function button3() {
     class MyDB4 extends SQLite3 {
        function __construct() {
           $this->open('db/masterdata.db');
        }
     }
  
     // Open Database 
     $db4 = new MyDB4();
     if(!$db4) {
        echo $db4->lastErrorMsg();
     }
     $cusid = $_SESSION['user'];
     $appid = $_POST['cid'];  
     strval($appid);
     $status='ยกเลิกการจองนัด';

     $sql =<<<EOF
     UPDATE booking set 
     status='$status'
     WHERE appointmentid='$appid' AND cus_id = $cusid;
     EOF;
  
     $ret = $db4->exec($sql);
     if(!$ret) {
        echo $db4->lastErrorMsg();
     } else {
      echo "<div class='center01 mt-3'>
      <div class='center01' style='width:60%;background-color:#E8e8e8;border-radius:2rem;' >
        <form class='col-md-4' style='padding:5% 0 0 0;' >
      <div class='alert alert-success' style='text-align: center;'>ยกเลิกการจองนัดสำเร็จ<br></div></form></div></div>";
     }
  }// Connect to Database 
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
   $temp = $_SESSION['user'];
   $sql ="SELECT * from booking where cus_id=$temp";
   echo "
   <br><br>
   <h3 style=\"text-align:center;font-weight:600;\"> รายละเอียดการจองนัดทั้งหมด </h3>
   <br>
   <div class=\"center01\" id=\"ses1\">
   <table class=\"table ta\" id='table1'>
   <thead>
   <tr>
   <th>ทะเบียนรถยนต์</th>
   <th>สถานะของการนัด</th>
   <th>วันที่นัด</th>
   <th>เวลาที่นัด</th>
   <th>หมายเลขการจองนัด</th>
   </tr> </thead> <tbody>";
   $ret = $db->query($sql);
   //table to display all date
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<tr>";
      echo "<td>". $row['car_id']."</td>";
      echo "<td>".$row['status'] ."</td>";
      echo "<td>".$row['apointment_date'] ."</td>";
      echo "<td>".$row['apointment_time'] ."</td>";
      echo "<td>".$row['appointmentid'] ."</td>";
      echo "</tr>";
   }
   echo "</tbody> </table> </div> ";
   //table data info
    ?>   
</body>
</html>
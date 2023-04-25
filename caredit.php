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
<br><br><a href="sellerhome.php" role="button" style="margin-left:5rem;"> &#9754; &nbsp; กลับเข้าสู่หน้าหลัก</a><br><br>
   <h3 style="text-align:center;font-weight:600;"> จัดการรายละเอียดรถยนต์ </h3>

   <div class="center01 mt-4">
   <div class="center01" style="width:80%;padding :3% 7%;background-color:#E8e8e8;border-radius:2rem;" >
      <form class="row g-3 " method="post" style="padding:5% 0 0 0;">
      <div class="col-md-4">
         <label for="inputPassword4" class="form-label">ทะเบียนรถ :</label>
         <input type='text' name ='lic' class="form-control" id="inputPassword4" placeholder="3XX-XXXX">
      </div>
      <div class="col-md-4">
         <label for="inputAddress2" class="form-label">ยี่ห้อ :</label>
         <input type="text" name ='ser' class="form-control" id="inputAddress2" placeholder="Mazda">
      </div>
      <div class="col-md-4">
         <label for="inputAddress" class="form-label">ชื่อรุ่น :</label>
         <input type="text" name ='nam' class="form-control" id="inputAddress" placeholder="Mazda Cx-5">
      </div>
      <div class="col-md-4">
         <label for="inputAddress" class="form-label">ผลิตปี :</label>
         <input type="text" name ='year' class="form-control" id="inputAddress" placeholder="2000">
      </div>
      <div class="col-md-4">
         <label for="inputAddress" class="form-label">สี :</label>
         <input type="text" name ='colo' class="form-control" id="inputAddress" placeholder="ดำ">
      </div>
      <div class="col-md-4">
         <label for="inputAddress" class="form-label">ราคา :</label>
         <input type="text" name ='pri' class="form-control" id="inputAddress" placeholder="120000">
      </div>
      <div class="col-md-5">
         <label for="inputAddress" class="form-label">ชื่อรูป :</label>
         <input type="file"  name ='fileToUpload' class="form-control" id="fileToUpload" placeholder="ไฟล์ .png หรือ .jpg" accept="image/png, image/gif, image/jpeg">
      </div>
      <div class="col-12">
         <label for="inputAddress" class="form-label">ร่องรอยเสียหาย/ตำหนิ :</label>
         <textarea type="text" name="def" class="form-control" id="inputAddress" placeholder="ประตูด้านขวา-รอยครูด / ไม่มีตำหนิ"></textarea>
      </div>
      <div class="col-12">
         <label for="inputAddress" class="form-label">รายละเอียดเพิ่มเติม : </label>
         <textarea  type="text" name="desc" class="form-control" id="inputAddress" placeholder="ออกรถปีไหน พรบ.ถึงปีไหน รถยนต์ใช้ระบบเกียร์อะไร"></textarea>
      </div>
      <div class="center01" style="width:100%; margin:1rem 0 0 0;">
            <input type='submit' style="width:15%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;"class="btn" name='button1'value='เพิ่มข้อมูล'/><!--add car data-->
            <input type='submit' style="width:17%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;" class="btn" name='button2'value='แก้ไขข้อมูล'/><!--modify car data-->
            <input type='submit' style="width:15%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;" class="btn" name='button3'value='ลบข้อมูล'/><!--delete car data-->
            <input type='submit' style="width:20%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#Fc9d9e;" class="btn" name='button4'value='จบการทำงาน'/><!--end database-->
      </div>
      </form>
     <div>
      <form action="upload.php" method="post" enctype="multipart/form-data">
      
      </form>
      </div>
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
   $sql ="SELECT * from tblproduct";
   echo "
   <br><br>
   <h3 style=\"text-align:center;font-weight:600;\"> รายละเอียดรถยนต์ทั้งหมด </h3>
   <br>
   <div class=\"center01\" id=\"ses1\">
   <table  class=\"table ta\">
   <thead>
   <tr>
   <th style=\"width:10%;\">ทะเบียนรถยนต์</th>
   <th>ยี่ห้อ</th>
   <th>ชื่อรุ่น</th>
   <th style=\"width:5%;\">ผลิตปี</th>
   <th>สี</th>
   <th>รูป</th>
   <th>เลขไมล์</th>
   <th style=\"width:20%;\">ร่องรอยเสียหาย/ตำหนิ</th>
   <th>ราคา</th>
   <th>รายละเอียดเพิ่มเติม</th>
   </tr></thead><tbody>";
   $ret = $db->query($sql);
   //table to display all car in database
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<tr>";
      echo "<td>". $row['license_palate']."</td>";
      echo "<td>". $row['series']."</td>";
      echo "<td>". $row['name']."</td>";
      echo "<td>".$row['year'] ."</td>";
      echo "<td>".$row['color'] ."</td>";
      echo "<td>".$row['image'] ."</td>";
      echo "<td>".$row['car_mileage'] ."</td>";         //clear
      echo "<td>".$row['car_defect'] ."</td>";
      echo "<td>".$row['price'] ."</td>";
      echo "<td>".$row['desc'] ."</td>";
      echo "</tr>";
   }
   echo "</tbody></table></div>";
   //table data info
   if(array_key_exists('button1', $_POST)) {
      button1();
    }
      function button1() {
         class MyDB2 extends SQLite3 {
            function __construct() {
               $this->open('db/masterdata.db');
            }
         }
      
         // Open Database 
         $db2 = new MyDB2();
         if(!$db2) {
            echo $db2->lastErrorMsg();
         }
         $lic = $_POST['lic'];
         $ser = $_POST['ser'];
         $year = $_POST['year'];
         $colo = $_POST['colo'];
         $nam = $_POST['nam'];
         $mileage = $_POST['mill'];
         $def = $_POST['def'];
         $price = $_POST['pri'];
         $desc = $_POST['desc'];
      
         $sql =<<<EOF
            INSERT INTO tblproduct (license_palate,series,year,color,name,car_mileage,car_defect,price,desc)
            VALUES ('$lic', '$ser', $year, '$colo',$mileage,'$nam','$def',$price,'$desc');
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
             $this->open('db/masterdata.db');
          }
       }
    
       // Open Database 
       $db3 = new MyDB3();
       if(!$db3) {
          echo $db3->lastErrorMsg();
       }
       $lic = $_POST['lic'];
       $ser = $_POST['ser'];
       $year = $_POST['year'];
       $colo = $_POST['colo'];
       $nam = $_POST['nam'];
       $mileage = $_POST['mill'];
       $def = $_POST['def'];
       $price = $_POST['pri'];
       $desc = $_POST['desc'];
    
       $sql =<<<EOF
          UPDATE tblproduct set
          series='$ser',
          year=$year,
          color='$colo',
          name='$nam',
          car_mileage=$mileage,
          car_defect='$def',
          price=$price,
          desc='$desc'
          WHERE license_palate='$lic';
          EOF;
    
       $ret = $db3->exec($sql);
       if(!$ret) {
          echo $db3->lastErrorMsg();
       } else {
          echo "Records modify successfully<br>";
       }
 }
 if(array_key_exists('button2', $_POST)) {
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
     $lic = $_POST['lic'];
     $ser = $_POST['ser'];
     $year = $_POST['year'];
     $colo = $_POST['colo'];
     $mileage = $_POST['mill'];
     $def = $_POST['def'];
     $price = $_POST['pri'];
     $desc = $_POST['desc'];
  
     $sql =<<<EOF
        DELETE FROM tblproduct WHERE license_palate='$lic';
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
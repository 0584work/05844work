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
<br><br><a href="adminhome.php" role="button" style="margin-left:5rem;"> &#9754; &nbsp; กลับเข้าสู่หน้าหลัก</a><br><br>
   <h3 style="text-align:center;font-weight:600;"> จัดการรายละเอียดรถยนต์ </h3>

<div class="center01 mt-4">
<div class="center01" style="width:60%;padding :3% 7%;background-color:#E8e8e8;border-radius:2rem;" >
<form class="row g-3 " method="post" style="padding:5% 0 0 0;">
      <div class="col-md-4">
         <label for="inputEmail4" class="form-label">รหัสรถ :</label>
         <input type='num' name ='carid' class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-4">
         <label for="inputEmail4" class="form-label">cusid : </label>
         <input type='num' name ='cusid' class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-4">
         <label for="inputEmail4" class="form-label">license_palate : </label>
         <input type='num' name ='car' class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-4">
         <label for="inputEmail4" class="form-label">staffid : </label>
         <input type='num' name ='staf' class="form-control" id="inputEmail4">
      </div>
      <div class="col-md-4">
         <label for="inputEmail4" class="form-label">staffid : </label>
         <select name="sta" class="form-select" aria-label="Default select example">
            <option value="complete">complete</option>
            <option value="booking">booking</option>
            <option value="pending">pending</option>
            <option value="cancel">cancel</option>
         </select>
      </div>
      <div class="col-md-4">
         <label for="inputEmail4" class="form-label">date : </label>
         <input type='datetime-local' name ='dat' class="form-control" id="inputEmail4" >
      </div>
      <div class="col-md-4">
         <label for="inputEmail4" class="form-label">ID : </label>
         <input type='int' name ='appid' class="form-control" id="inputEmail4">
      </div>
      <div class="center01" style="width:100%; margin:1rem 0 0 0;">
            <input type='submit' style="width:15%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;"class="btn" name='button1'value='เพิ่มข้อมูล'/><!--add car data-->
            <input type='submit' style="width:17%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;" class="btn" name='button2'value='แก้ไขข้อมูล'/><!--modify car data-->
            <input type='submit' style="width:15%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;" class="btn" name='button3'value='ลบข้อมูล'/><!--delete car data-->
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
   $sql ="SELECT * from booking";
   echo "
   <br><br>
   <h3 style=\"text-align:center;font-weight:600;\"> รายละเอียดรถยนต์ทั้งหมด </h3>
   <br>
   <div class=\"center01\" id=\"ses1\">
   <table  class=\"table ta\">
   <thead>
   <tr>
      <th>cusid</th><th>license palate</th>
      <th>staffid</th>
      <th>status</th>
      <th>date</th>
      <th>appointmentid</th>
   </tr></thead><tbody>";
   $ret = $db->query($sql);
   //table to display database
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
   echo "</tbody></table></div>";
   //funcion to add data to database
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
         $cusid = $_POST['cusid'];
         $lisence = $_POST['car'];
         $staff = $_POST['staf'];
         $stat = $_POST['sta'];
         $dat2 = $_POST['dat'];
         $appid = uniqid();
         //check duplicate day
         $sql ="SELECT * from booking where lisence_palate = '$lisence'";
        $ret = $db2->query($sql);
        $check = 0;
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
        if ($date == $row['customer_apointment_date']){
          $check = 1;
          break;
        }
        }//check duplicate and add to database
        if ($check == 0){
          $sql =<<<EOF
          INSERT INTO booking (cus_id,car_id,appointment_staff_id,status,customer_apointment_date,appointmentid)
          VALUES ($cusid,'$lisence',$staff,'$stat','$dat2','$appid');
        EOF;

          $ret = $db2->exec($sql);
          if(!$ret) {
             echo $db2->lastErrorMsg();
          } else {
           echo "Records created successfully<br>";
          }
      }else{
         echo "Data duplicate<br>";
      }
   }
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
       $cusid = $_POST['cusid'];
       $carid = $_POST['car'];
       strval($carid);
       $staff = $_POST['staf'];
       $stat = $_POST['sta'];
       $dat2 = $_POST['dat'];
       $appid = $_POST['appid'];
       //query modify data to database
       $sql =<<<EOF
          UPDATE booking set cus_id = $cusid,car_id = '$carid',
          appointment_staff_id = $staff , status = '$stat', customer_apointment_date = '$dat2'
          WHERE appointmentid ='$appid';
       EOF;
    
       $ret = $db3->exec($sql);
       if(!$ret) {
          echo $db3->lastErrorMsg();
       } else {
          echo "Records modify successfully<br>";
       }
      }
      
 //funcion to delete data to database
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
     $cusid = $_POST['cusid'];
     $carid = $_POST['car'];
     $staff = $_POST['staf'];
     $stat = $_POST['sta'];
     $dat = $_POST['dat'];
     $appid = $_POST['appid'];
     //delete row data
     $sql =<<<EOF
        DELETE FROM booking WHERE appointmentid='$appid';
        EOF;
  
     $ret = $db4->exec($sql);
     if(!$ret) {
        echo $db4->lastErrorMsg();
     } else {
        echo "Records delete successfully<br>";
     }
  }
    ?>  
    <?php
   // Connect to Database 
   class MyDB5 extends SQLite3 {
      function __construct() {
         $this->open('db/masterdata.db');
      }
   }

   // Open Database 
   $db5 = new MyDB5();
   if(!$db5) {
      echo $db5->lastErrorMsg();
   }
   $sql ="SELECT * from tblpay";
   echo "
   <br><br>
   <h3 style=\"text-align:center;font-weight:600;\"> รายละเอียดรถยนต์ทั้งหมด </h3>
   <br>
   <div class=\"center01\" id=\"ses1\">
   <table  class=\"table ta\">
   <thead>
   <tr>
   <th>PAYMENT</th>
   </tr><tr>
   <th>cusid</th>
   <th>carid</th>
   <th>staffid</th>
   <th>รหัสอ้างอิง</th>
   <th>total</th>
   </tr></thead><tbody>";
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
   "</tbody></table></div>";
   
    ?>    
</body>
</html>
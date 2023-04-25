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
</head>
<?php
session_start();
    class MyDB extends SQLite3 {
        function __construct() {
          $this->open('db/masterdata.db');
        }
        }

        $db = new MyDB();
        if($_GET["action"]){
            switch($_GET["action"]){
                case "add":
                    $ret = $db->query("SELECT * FROM tblproduct WHERE license_palate='".$_GET['code']."'");
                    $productbycode = $ret->fetchArray(SQLITE3_ASSOC);
            }}
		?>
<body>
<br><br><a href="home.php" role="button" style="margin-left:5rem;"> &#9754; &nbsp; กลับเข้าสู่หน้าหลัก</a><br><br>
   <h3 style="text-align:center;font-weight:600;"> นัดวันทดลองขับรถยนต์ </h3>
   <br>
<div class="center01">
   <div class="center01 " style="width:40%;padding :3% 7%;background-color:#E8e8e8;border-radius:2rem;">
   <form method='post'><!--form to insert data to edit date-->
	   <label class="form-label">วันและเวลานัดหมาย : </label>
      <input type='datetime-local' name ='cardate' required="required" class="form-control">
         <input type='hidden' name ='carplate' value="<?php echo $productbycode['license_palate'];?>"><br>
      
         <div class="center01" style="width:100%; margin:1rem 0 0 0;">
        <input type='submit' style="width:60%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;"class="btn" name='button1'value='นัดทดลองขับรถ'/><!--add car data-->
        </div>
   </form>
   </div>
   </div>


<?php
   $db->close();
   // Connect to Database 
  
   // Open Database 
   
   if(array_key_exists('button1', $_POST)) {
     button1();
     }
   
    class MyDB2 extends SQLite3 {
      function __construct() {
         $this->open('db/masterdata.db');
      }
   }
    $db2 = new MyDB2();
    $id = $_SESSION['user'];
    $sql ="SELECT * from booking where cus_id = $id";
    echo "<br><br>
    <h3 style=\"text-align:center;font-weight:600;\"> รายการนัดทั้งหมด </h3>
    <br>
    <div class=\"center01\" id=\"ses1\">
    <table class=\"table ta\" id='table1'>
    <thead>
    <tr><th>ทะเบียนรถยนต์</th><th>status</th><th>appointment_date</th>
    </tr> </thead> <tbody>";
    $ret = $db2->query($sql);
   //table to display date that has been appoint by selected car
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
        echo "<tr>";
        echo "<td>". $row['car_id']."</td>";
        echo "<td>". $row['status'] ."</td>";
        echo "<td>". $row['customer_apointment_date'] ."</td>";
        echo "</tr>";
     }
     echo "</tbody> </table> </div> ";
   
        function button1() { 
          class MyDB3 extends SQLite3 {
            function __construct() {
               $this->open('db/masterdata.db');
            }
         }
        $db3 = new MyDB3();
        $cusid = $_SESSION['user'];
        $date = $_POST['cardate'];
        $carplate = $_POST['carplate'];
        strval($carplate);
        strval($date);
        $_SESSION['bookingdate'] = $date;
        $_SESSION['carid'] = $carplate;
        $status = "กำลังทำการนัด";
        $appid = uniqid();
        strval($appid);
        $sql ="SELECT * from booking where car_id = '$carplate'";
        $ret = $db3->query($sql);
        $check = 0;
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
        if ($date == $row['customer_apointment_date']){
          $check = 1;
          break;
        }
        }//check duplicate and add to database
        if ($check == 0){
          $sql =<<<EOF
           INSERT INTO booking (cus_id,car_id,status,customer_apointment_date,appointmentid)
           VALUES ($cusid,'$carplate','$status','$date','$appid');
        EOF;
        $ret = $db3->exec($sql);        
        if(!$ret) {
          echo $db3->lastErrorMsg();
        } else {
          echo "Records created successfully<br>";
          header( "refresh:1;url=appointmentuser.php");
        }
      }
      else{
        echo "data duplicate<br>";
      }
        $db3->close();
      }
      
    $db2->close();
    
    ?>   
</body>
</html>
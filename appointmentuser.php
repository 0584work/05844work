<?php
    session_start();
    class MyDB extends SQLite3 {
        function __construct() {
          $this->open('db/masterdata.db');
        }
        }

        $db = new MyDB();
        $caarr = $_SESSION['carid'];
        $ret = $db->query("SELECT * FROM tblproduct WHERE license_palate='$caarr'");
        $productbycode = $ret->fetchArray(SQLITE3_ASSOC);
        $cusid = $_SESSION['user'];
        $date = $_SESSION['bookingdate'];
        class MyDB2 extends SQLite3 {
            function __construct() {
              $this->open('db/masterdata.db');
            }
            }
    
            $db2 = new MyDB2();
            $ret = $db2->query("SELECT * FROM member WHERE mem_id=$cusid");
            $usser = $ret->fetchArray(SQLITE3_ASSOC);
		?>
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
<br><br><a href="home.php" role="button" style="margin-left:5rem;"> &#9754; &nbsp; กลับเข้าสู่หน้าหลัก</a><br><br>
   <h3 style="text-align:center;font-weight:600;">ยืนยันการจอง</h3>

    <?php
        $price = ceil(($productbycode['price'] * 0.01));
    ?>
  <!--form to add database and go to payment-->
  <div class="center01 mt-4">
<div class="center01" style="width:60%;padding :3% 7%;background-color:#E8e8e8;border-radius:2rem;" >
<form class="row g-3 " method="post" style="padding:5% 0 0 0;" action="payment.php?action=add&code=<?php echo $productbycode['license_palate'];?>">
      <div class="col-md-6">
         <label for="inputEmail4" class="form-label">Name :</label>
         <input type='text' name ='cusid' class="form-control" id="cusid"readonly value="<?php echo $usser['firstname'];?> <?php echo $usser['lastname'];?>" placeholder="ไม่มีแล้ว ลบทิ้งได้">
      </div>
      <div class="col-md-6">
         <label for="inputEmail4" class="form-label">License_plate :</label>
         <input type='text' name ='carid' class="form-control" id="cusid"readonly value="<?php echo $productbycode['license_palate'];?>" placeholder="ไม่มีแล้ว ลบทิ้งได้">
      </div>
      <div class="col-md-6">
         <label for="inputEmail4" class="form-label">Date :</label>
         <input type='text' name ='date' class="form-control" id="cusid"readonly value="<?php echo $date;?>" placeholder="ไม่มีแล้ว ลบทิ้งได้">
      </div>
      <div class="col-md-6">
         <label for="inputEmail4" class="form-label">Price :</label>
         <input type='text' name ='price' class="form-control" id="cusid"readonly value="<?php echo $price;?>" placeholder="ไม่มีแล้ว ลบทิ้งได้">
      </div>
	    
      
         <div class="center01" style="width:100%; margin:1rem 0 0 0;">
         <button  type="submit" name="button1" class="btn" style="width:20%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;">Book</button>
         
        </div>
   </form>
   </div>
  

    <?php  
    $db->close();   

?>

 
</body>
</html>
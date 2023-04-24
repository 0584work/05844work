<?php
    session_start();
    class MyDB extends SQLite3 {
        function __construct() {
          $this->open('db/masterdata.db');
        }
        }

        $db = new MyDB();
        if(($_GET["action"])){
            switch($_GET["action"]){
                case "add":
                    $ret = $db->query("SELECT * FROM tblproduct WHERE license_palate='".$_GET["code"]."'");
                    $productbycode = $ret->fetchArray(SQLITE3_ASSOC);
                    
            }}
            $cid=$_SESSION['user'];
      class MyDB5 extends SQLite3 {
        function __construct() {
          $this->open('db/masterdata.db');
          }
          }
      
          $db5 = new MyDB5();
          $ret2 = $db5->query("SELECT * from member where mem_id=$cid");
          $username = $ret2->fetchArray(SQLITE3_ASSOC);
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
   <h3 style="text-align:center;font-weight:600;">ชำระเงิน</h3>

    <!--form to add payment-->

<?php
  $price = ceil(($productbycode['price'] * 0.01));
?>

<div class="center01 mt-4">
<div class="center01" style="width:60%;padding :3% 7%;background-color:#E8e8e8;border-radius:2rem;" >
<form class="row g-3 " method="post" style="padding:5% 0 0 0;" >
    <input type="hidden" name="cusid" id="cusid" value="<?php echo $cid;?>">
    <div class="col-md-6">
         <label class="form-label">cusid</label>
         <input  class="form-control" type='text' name ='name' id="name"value="<?php echo $username['firstname'];?> <?php echo $username['lastname'];?>" readonly>
      </div>
    <div class="col-md-6">
         <label class="form-label">license_palate</label>
         <input  class="form-control" type='text' name ='carid' id="carid"value="<?php echo $productbycode['license_palate'];?>" readonly>
      </div>
    <div class="col-md-6">
         <label class="form-label">ชื่อไฟล์สลิป</label>
         <input  class="form-control" type='text' name ='accn' id="accn"value=""  required="required">
      </div>
      
    <div class="col-md-6">
         <label class="form-label">total</label>
         <input  class="form-control" type='text' name ='val' id="val"  value="<?php echo $price;?>" readonly>
      </div>
        
      <div class="center01" style="width:100%; margin:1rem 0 0 0;">
         <button  type="submit" name="pay" class="btn" style="width:20%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;">pay</button>
         
        </div>
</form>
</div></div>
      <div class="center01"><img src='photo/frame.png' alt='qrcode'></div>
      
    <?php  
    $db->close(); 
    $db5->close(); 
    if(array_key_exists('pay', $_POST)) {
      button1();
      }
      //function to add payment
    function button1() {
      class MyDB2 extends SQLite3 {
        function __construct() {
          $this->open('db/masterdata.db');
        }
        }

        $db2 = new MyDB2();
        $cusid = $_POST['cusid'];
        $carid = $_POST['carid'];
        $acc = $_POST['accn'];  
        $total = $_POST['val'];

        $sql =<<<EOF
           INSERT INTO tblpay (cusid,carid,accountnumber,total)
           VALUES ($cusid,'$carid','$acc',$total);
        EOF;
        $ret = $db2->exec($sql);  
        if(!$ret) {
          echo $db2->lastErrorMsg();
        } else {
          echo "payment Recorded<br>";
          header("refresh:3;url=afterpayment.php");
        }      
        $db2->close();
     }
      ?>  
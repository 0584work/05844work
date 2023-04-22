<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
    <title>Customer Detail</title>
    <style>
      body {
      font-family: "Kanit", sans-serif !important;
}
    th, td {
            border-bottom: 3px solid #ddd;
            
            }
            .ta{
               width:55%!important;
            }
            .center01 {
               display: flex;
               justify-content: center;
            }
            .fixxx{
               position : fixed;
            }
/* Sidebar */
.sidebar {
position: fixed;
top: 0;
bottom: 0;
left: 0;
padding: 58px 0 0; /* Height of navbar */
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
width: 240px;
z-index: 600;
}

@media (max-width: 991.98px) {
.sidebar {
width: 100%;
}
}
.sidebar .active {
border-radius: 5px;
box-shadow: 0 2px 5px 0 rgb(0 0 0 / 16%), 0 2px 10px 0 rgb(0 0 0 / 12%);
}

.sidebar-sticky {
position: relative;
top: 0;
height: calc(100vh - 48px);
padding-top: 0.5rem;
overflow-x: hidden;
overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
}
      </style>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   
</head>
<body>
<!-- Sidebar -->
<nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="adminhome.php" class="list-group-item list-group-item-action py-2 ripple" aria-current="true">
          <span>กลับเข้าสู่หน้าหลัก</span>
        </a>
        <a href="#ses1" class="list-group-item list-group-item-action py-2 ripple">
         <span>Customer</span>
      </a>
      <a href="#ses2" class="list-group-item list-group-item-action py-2 ripple">
         <span>Booking</span>
      </a>
      <a href="#ses3" class="list-group-item list-group-item-action py-2 ripple">
         <span>Payment</span>
      </a>
        
      </div>
    </div>
  </nav>
   <br><br>
<?php
   // Connect to Database 
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('db/db_member.sqlite3');
      }
   }

   // Open Database 
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   }
   $sql ="SELECT * from member where role='cus'";
   echo "
   <div class=\"center01\"id=\"ses1\">
   <h4>
   Customer
   </h4>
    </div>
    <div class=\"center01\">
   <table  class=\"table ta\">
   <thead>
      <tr>
      <th scope=\"col\">ไอดีผู้ใช้</th>
      <th scope=\"col\">Username</th>
      <th scope=\"col\">Password</th>
      <th scope=\"col\">ชื่อจริง</th>
      <th scope=\"col\">นามสกุล</th>
      <th scope=\"col\">เบอร์โทรศัพท์</th>
      </tr>
   </thead><tbody>";
   $ret = $db->query($sql);
   //table to display all customer in database
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<tr>";
      echo "<td>". $row['mem_id'] . "</td>";
      echo "<td>". $row['username']."</td>";
      echo "<td>". $row['password'] ."</td>";
      echo "<td>".$row['firstname'] ."</td>";
      echo "<td>".$row['lastname'] ."</td>";
      echo "<td>".$row['phonenumber'] ."</td>";
      echo "</tr>";
   }
   echo "</tbody></table></div></table></div><br><br><br><br><br><br><br><br><br>";
   //table data info
   
    ?>
    <?php
   // Connect to Database 
   class MyDB2 extends SQLite3 {
      function __construct() {
         $this->open('db/appointment.db');
      }
   }
    $db2 = new MyDB2();
    $sql ="SELECT * from booking";
    echo "
    <div class=\"center01\"id=\"ses2\">
    <h4>
   Booking
   </h4>
    </div>
    <div class=\"center01\">
   
    <table  class=\"table ta\">
    <thead>
    <tr>
    <th>ไอดีผู้ใช้</th>
    <th>ทะเบียนรถยนต์</th>
    <th>Status</th>
    <th>วันนัดทดลองขับรถยนต์</th>
    </tr>";
    $ret = $db2->query($sql);
   //table to display date that has been appoint by selected car
    while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
        echo "<tr>";
        echo "<td>". $row['cus_id'] . "</td>";
        echo "<td>". $row['car_id']."</td>";
        echo "<td>". $row['status'] ."</td>";
        echo "<td>". $row['customer_apointment_date'] ."</td>";
        echo "</tr>";
     }
    // Close database
    echo "</tbody></table></div></table></div><br><br><br><br><br><br><br><br><br>";
   
    ?>
<?php
   // Connect to Database 
   class MyDB5 extends SQLite3 {
      function __construct() {
         $this->open('db/payment.db');
      }
   }

   // Open Database 
   $db5 = new MyDB5();
   if(!$db5) {
      echo $db5->lastErrorMsg();
   }
   $sql ="SELECT * from tblpay";
   echo "
   <div class=\"center01\" id=\"ses3\">
   <h4>
   Payment
   </h4>
    </div>
    <div class=\"center01\">
   <table  class=\"table ta\">
   <thead><tr><th>ไอดีผู้ใช้</th><th>ทะเบียนรถยนต์</th><th>เลขที่อ้างอิง</th><th>ยอดชำระ</th></tr>";
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
   echo "</tbody></table></div><br><br><br><br><br><br><br><br><br>";
    ?>   
    </div>   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>   
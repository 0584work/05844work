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
<?php
    session_start();
?>
  <!--form to add database and go to payment-->
  <br><br>
  <div class="center01 mt-4">
<div class="center01" style="width:60%;padding :3% 7%;background-color:#E8e8e8;border-radius:2rem;" >
<form action="afterpayment2.php" nctype="multipart/form-data"  class="row g-3 " method="post" style="padding:5% 0 0 0;">
  <form action="afterpayment2.php" method="post">
  <div class="col-md-4">
         <label for="inputAddress" class="form-label">สลิป :</label>
         <input type='file' name ='fileToUpload' class="form-control" id="fileToUpload"placeholder="ไฟล์ .png หรือ .jpg" accept="image/png, image/gif, image/jpeg"
         required="required">

      </div>
      <div class="col-md-4">
      <input type='submit' style="width:15%;margin:0.5rem 0.5rem 0 0.5rem;background-color:#B0b8ff;"class="btn" name='submit'value='Upload Image'/><!--add car data-->
      </div>

    </form> 
    </div>
</body>
</html>

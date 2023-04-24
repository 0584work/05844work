<?php
    session_start();
?>
  <!--form to add database and go to payment-->
  <form action="afterpayment2.php" method="post" enctype="multipart/form-data">
      <div class="col-md-5">
         <label for="inputAddress" class="form-label">สลิป :</label>
         <input type="file"  name ='fileToUpload' class="form-control" id="fileToUpload" placeholder="ไฟล์ .png หรือ .jpg" accept="image/png, image/gif, image/jpeg"
         required="required">
         <input type="submit" value="Upload Image" name="submit">
        </form>
      </div>
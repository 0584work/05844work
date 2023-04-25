<?php
    session_start();
    class MyDB extends SQLite3 {
        function __construct() {
          $this->open('db/masterdata.db');
        }
        }

        $db = new MyDB();
		?>

<!DOCTYPE html>
<html lang="en">
	<head>
    
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit&display=swap" rel="stylesheet">
	</head>
<body>
<?php require_once("navuser.php"); ?>
	
  <div class="container text-center">
  <div class="row row-cols-2 center01">
  <?php 
  
    $ret = $db->query("SELECT * FROM tblproduct where series='mazda'");
    while($product_array = $ret->fetchArray(SQLITE3_ASSOC)){
  ?>
    
      <div class="card col ms-2" style="width: 20rem; margin-bottom:10px;"  >
        <form action="detail.php?action=add&code=<?php echo $product_array['license_palate'];?>" method="post">
        <img src="<?php echo $product_array['image'];?>" alt="image" class="object-fit-fill border rounded" style="width: 18rem;"><!--image-->
          <div class="card-body">
            <h5 class="card-title"><?php echo $product_array["series"];?></h5>
            <p class="card-text"><?php echo $product_array["price"] . " Bath";?></p>
            <input type="submit" class="btn btn-primary" value="Detail"><!--button to go to detail page-->
          </div>
        </form>
      </div>
    
  <?php
        }
    $db->close();      
  ?>
  </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>
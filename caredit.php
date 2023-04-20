<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>th, td {
  border-bottom: 3px solid #ddd;
}</style>
</head>
<body>
<form action="sellerhome.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="sellerhome">
	</form>
   <form method='post'><!--form to insert car data-->
      <label>carid : </label>
      <input type='num' name ='carid' required="required"><br><br>
      <label>License palate : </label>
      <input type='text' name ='lic' required="required"><br><br>
      <label>name : </label>
      <input type='text' name ='nam' required="required"><br><br>
      <label>series : </label>
      <input type='text' name ='ser' required="required"><br><br>
      <label>year : </label>
      <input type='num' name ='year' required="required"><br><br>
      <label>color : </label>
      <input type='text' name ='colo' required="required"><br><br>
      <label>pic : </label>
      <input type='text' name ='pic'><br><br>
      <label>mileage : </label>
      <input type='num' name ='mill' required="required"><br><br>  
      <label'>car deflect : </label>
      <textarea cols="20" rows="5" name="def"></textarea><br><br>
      <label>price : </label>
      <input type='num' name ='pri' required="required"><br><br>
      <label>desc : </label>
      <textarea cols="20" rows="5" name="desc"></textarea><br><br>
      <input type='submit' name='button1'value='add'/><!--add car data-->
      <input type='submit' name='button2'value='modify'/><!--modify car data-->
      <input type='submit' name='button3'value='delete'/><!--delete car data-->
      <input type='submit' name='button4'value='end process'/><!--end database-->
   </form>
<?php
   // Connect to Database 
   class MyDB extends SQLite3 {
      function __construct() {
         $this->open('db/product.db');
      }
   }

   // Open Database 
   $db = new MyDB();
   if(!$db) {
      echo $db->lastErrorMsg();
   }
   $sql ="SELECT * from tblproduct";
   echo "<table id='table1'><tr><th>carid</th><th>License palate</th><th>series</th><th>name</th><th>year</th><th>color</th>
   <th>image</th><th>mileage</th><th>car deflect</th><th>price</th><th>desc</th></tr>";
   $ret = $db->query($sql);
   //table to display all car in database
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<tr>";
      echo "<td>". $row['carid'] . "</td>";
      echo "<td>". $row['license_palate']."</td>";
      echo "<td>". $row['series'] ."</td>";
      echo "<td>". $row['name']."</td>";
      echo "<td>".$row['year'] ."</td>";
      echo "<td>".$row['color'] ."</td>";
      echo "<td>".$row['image'] ."</td>";
      echo "<td>".$row['car_mileage'] ."</td>";
      echo "<td>".$row['car_defect'] ."</td>";
      echo "<td>".$row['price'] ."</td>";
      echo "<td>".$row['desc'] ."</td>";
      echo "</tr>";
   }
   echo "</table>";
   //table data info
   if(array_key_exists('button1', $_POST)) {
      button1();
    }
      function button1() {
         class MyDB2 extends SQLite3 {
            function __construct() {
               $this->open('db/product.db');
            }
         }
      
         // Open Database 
         $db2 = new MyDB2();
         if(!$db2) {
            echo $db2->lastErrorMsg();
         }
         $carid = $_POST['carid'];
         $lic = $_POST['lic'];
         $ser = $_POST['ser'];
         $year = $_POST['year'];
         $colo = $_POST['colo'];
         $nam = $_POST['nam'];
         $image = $_POST['pic'];
         $mileage = $_POST['mill'];
         $def = $_POST['def'];
         $price = $_POST['pri'];
         $desc = $_POST['desc'];
      
         $sql =<<<EOF
            INSERT INTO tblproduct (carid,license_palate,series,year,color,name,image,car_mileage,car_defect,price,desc)
            VALUES ($carid,'$lic', '$ser', $year, '$colo','$image',$mileage,'$nam','$def',$price,'$desc');
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
             $this->open('db/product.db');
          }
       }
    
       // Open Database 
       $db3 = new MyDB3();
       if(!$db3) {
          echo $db3->lastErrorMsg();
       }
       $carid = $_POST['carid'];
       $lic = $_POST['lic'];
       $ser = $_POST['ser'];
       $year = $_POST['year'];
       $colo = $_POST['colo'];
       $image = $_POST['pic'];
       $nam = $_POST['nam'];
       $mileage = $_POST['mill'];
       $def = $_POST['def'];
       $price = $_POST['pri'];
       $desc = $_POST['desc'];
    
       $sql =<<<EOF
          UPDATE tblproduct set 
          license_palate='$lic',
          series='$ser',
          year=$year,
          color='$colo',
          image='$image',
          name='$nam',
          car_mileage=$mileage,
          car_defect='$def',
          price=$price,
          desc='$desc'
          WHERE carid=$carid;
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
           $this->open('db/product.db');
        }
     }
  
     // Open Database 
     $db4 = new MyDB4();
     if(!$db4) {
        echo $db4->lastErrorMsg();
     }
     $carid = $_POST['carid'];
     $lic = $_POST['lic'];
     $ser = $_POST['ser'];
     $year = $_POST['year'];
     $colo = $_POST['colo'];
     $mileage = $_POST['mill'];
     $def = $_POST['def'];
     $price = $_POST['pri'];
     $desc = $_POST['desc'];
  
     $sql =<<<EOF
        DELETE FROM tblproduct WHERE carid=$carid;
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
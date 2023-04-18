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
<form action="adminhome.php?" method="post"><!--homebutton-->
		<input type="submit" class="btnadd" value="adminhome">
	</form>
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
   echo "<table id='table1'><tr><th>memid</th><th>userneme</th><th>password</th><th>firstname</th><th>lastname</th>
   <th>role</th><th>phonenumber</th></tr>";
   $ret = $db->query($sql);
   //table to display all customer in database
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo "<tr>";
      echo "<td>". $row['mem_id'] . "</td>";
      echo "<td>". $row['username']."</td>";
      echo "<td>". $row['password'] ."</td>";
      echo "<td>".$row['firstname'] ."</td>";
      echo "<td>".$row['lastname'] ."</td>";
      echo "<td>".$row['role'] ."</td>";
      echo "<td>".$row['phonenumber'] ."</td>";
      echo "</tr>";
   }
   echo "</table>";
   //table data info
   
    ?>   
</body>
</html>
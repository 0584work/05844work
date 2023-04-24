<!--no frontend-->
<?php
	require_once 'conn.php';
	session_start();
	
	if(ISSET($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$query = "SELECT COUNT(*) as count FROM `member` WHERE `username` = :username AND `password` = :password";
		$stmt = $conn->prepare($query);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$row = $stmt->fetch();

		$count = $row['count'];

		$temp = "SELECT mem_id,role FROM `member` WHERE `username` = :username AND `password` = :password";
		$test = $conn->prepare($temp);
		$test->bindParam(':username', $username);
		$test->bindParam(':password', $password);
		$test->execute();
		$row = $test->fetch(PDO::FETCH_OBJ);	
		$role = $row->role;
		$memid = $row->mem_id;
		strval($role);
		intval($memid);
		$_SESSION['user'] = $memid;

		if($count > 0 && $role == 'cus'){
			$_SESSION['error'] = "complete";
			header('location:home.php');
		}else if($count > 0 && $role == 'app'){
			$_SESSION['error'] = "complete";
			header('location:adminhome.php');
		}else if($count > 0 && $role == 'sel'){
			$_SESSION['error'] = "complete";
			header('location:sellerhome.php');
		}else{
			$_SESSION['error'] = "Invalid username or password";
			header('location:login.php');
		}
	}	
	//no frontend
?>
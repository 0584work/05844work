<!--no frontend-->
<?php
	//starting the session
	session_start();

	//including the database connection
	require_once 'conn.php';
	
	if(ISSET($_POST['register'])){
		// Setting variables
		$username = $_POST['username'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$phone = $_POST['phone'];
		$role = 'cus'; 
		if (is_numeric($phone)) { 
			// Insertion Query
		$query = "INSERT INTO `member` (username, password, firstname, lastname,role,phonenumber) VALUES(:username, :password, :firstname,
		:lastname, :role, :phonenumber)";
	   $stmt = $conn->prepare($query);
	   $stmt->bindParam(':username', $username);
	   $stmt->bindParam(':password', $password);
	   $stmt->bindParam(':firstname', $firstname);
	   $stmt->bindParam(':lastname', $lastname);
	   $stmt->bindParam(':phonenumber', $phone);
	   $stmt->bindParam(':role', $role);
	   
	   
	   // Check if the execution of query is success
	   if($stmt->execute()){
		   //setting a 'success' session to save our insertion success message.
		   $_SESSION['success'] = "Successfully created an account";

		   //redirecting to the index.php 
		   header('location: index.php');
	   }
	}
	else{
		$_SESSION['unsucess'] = "Invalid phone number";
			header('location:index.php');
	}

		
	}
	
?>
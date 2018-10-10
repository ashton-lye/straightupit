<?php

	session_start();

	require_once("connect.php");

	$username = $_POST['username'];
    $password = $_POST['password'];
    $accountType = $_POST['accountType'];

		//PDO - Select query
	try{
		//CHECK IF THE USER IS AN ADMIN
		$query = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";
		$result = $con->query($query);
		$row = $result->fetch();
		
		if($row == null){
			
			//CHECK IF THE USER IS A STAFF MEMBER
			$query = "SELECT * FROM staff WHERE username = '$username' && password = '$password'";
			$result = $con->query($query);
			$row = $result->fetch();
			if($row == null){
				
				//CHECK IF THE USER IS A MENTOR
				$query = "SELECT * FROM mentors WHERE username = '$username' && password = '$password'";
				$result = $con->query($query);
				$row = $result->fetch();
				if($row == null){
					//LOGIN FAILED
					header("location: ../statistics.php");
				}else{
					//USER IS A MENTOR
					header("location: ../statistics.php");
					$_SESSION["username"] = $username;
				}
				
			}else{
				//USER IS A STAFF MEMBER
				header("location: ../statistics.php");
				$_SESSION["username"] = $username;
			}
			
		}else{
			//USER IS AN ADMIN
			header("location: ../statistics.php");
			$_SESSION["username"] = $username;
		}
		
	}catch(PDOException $e){
		echo "Error Something Went Wrong: " . $e->getMessage();
	}

	

?>
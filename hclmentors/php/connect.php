<?php
    try{
			$con = new PDO('mysql:host=localhost;dbname=hcl_mentors','root','root');
   	} catch (PDOException $e) {
   		echo "Database connection error " . $e->getMessage();
   	}
?>
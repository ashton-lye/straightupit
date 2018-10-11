<?php
    try{
		$con = new PDO('mysql:host=localhost;dbname=hcl_mentors','root','root');
		//uni - $con = new PDO('mysql:host=mysql.cms.waikato.ac.nz;dbname=','','');
		//lappy - $con = new PDO('mysql:host=localhost;dbname=comp333-assn1-im','root','root');
   	} catch (PDOException $e) {
   		echo "Database connection error " . $e->getMessage();
   	}
?>
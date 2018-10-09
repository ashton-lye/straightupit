<?php
require_once('php/connect.php');
include 'php/header.php';
include 'php/navbar.php';
?>
<div class="CH">
    <link rel="stylesheet" href="css/history.css">
<h1> Client Histories</h1>
		<div id = 'top'>
		
			<label> Search Clients: 
			<input type='text' id= 'clientNameinput'></label>
			 
			
		</div>
	<div id="radiobuttons">
		<label>Search By: &nbsp;</label>
		
		<label>&nbsp;<input type = 'radio' name='search' onclick='JavaScript:getNameSession(clientNameinput.value);' value='name' >Client Name </label>
		<br>
		<label> <input type ='radio' name='search' class='r2' value='phone' onclick='alert("phone")'>Client Phone Number</label>
	</div>
		<div id='contents'>
		
		
 
		</div>

	</div>
<script src="js/client_history.js"></script>

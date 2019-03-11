<?php
require_once('php/connect.php');
include 'php/header.php';
include 'php/navbar.php';
?>

<!-- Client History page, worked on by Jillian Eccles. Functionality Complete.-->
<div class="CH">
    
	
	<link rel="stylesheet" href="css/history.css">
<h1> Client Histories</h1>
		<div id = 'top'>
		
			<label> Search Clients: 
			<input type='text' id= 'clientinput'></label>
			 
			
		</div>
	<div id="radiobuttons">
		<label>Search By: &nbsp;</label>
		
		<label>&nbsp;<input type = 'radio' name='search' onclick='JavaScript:getName(clientinput.value);' value='name' >Client Name </label>
	
		<label> <input type ='radio' name='search' value='phone' onclick='getPhone(clientinput.value);'>Client Phone Number</label>
	</div>
		<div id='contents'>
		
		
 
		</div>

	</div>
<script src="js/client_history.js"></script>

	<?php
	include 'php/footer.php'
	?>


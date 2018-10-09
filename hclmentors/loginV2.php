<?php
require_once('php/connect.php');
include 'php/header.php';
include 'php/navbar.php';
?>

<div class="login">
		<form name="login" action="php/loginProcessV2.php" method="POST">
					
		<br>
		<label for="usernameField">Username:</label>
		<input type="text" size="25" id="usernameField" name="username"><br><br>				
		
		<label for="passwordField">Password:</label>
		<input type="password" size="25" id="passwordField" name="password"><br><br>
		<input class="button" type="submit" value="Login"><br><br>		
				
	</form>
</div>

<?php
include 'php/footer.php'
?>
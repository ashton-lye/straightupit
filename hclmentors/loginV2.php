<?php
require_once('php/connect.php');
include 'php/header.php';
include 'php/navbar.php';
?>

<div class="login">
		<form name="login" action="php/loginProcessV2.php" method="POST">
					
		<br>
		
		<input type="text"  id="usernameField" name="username" placeholder="Username"><br><br>				
		
		
		<input type="password"  id="passwordField" name="password" placeholder="Password"><br><br>
		<input class="button" type="submit" value="Login"><br><br>		
				
	</form>
</div>

<?php
include 'php/footer.php'
?>
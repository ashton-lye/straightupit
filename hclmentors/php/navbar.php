<nav>
	<div class="navbar">
		<table class="navbarBTNs">
			<tr>
			<td><a href="">Collections</a></td>
			<td><a href="">eCollections</a></td>
			<td><a href="">Heritage</a></td>
			<td><a href="">Kids and Teens</a></td>
			<td><a href="">Our Services</a></td>
			<td><a href="">About Us</a></td>
			<td><a href="">What's On</a></td>
			</tr>
		</table>
	</div>
</nav>

<h1 class="computerMentoringH1">Computer Mentoring</h1>

<?php


	if(isset($_SESSION["username"])){
		
		echo '<aside><ul>
		<li class="link"><a href="booking.php">Make A Booking</a></li>
		<li class="link"><a href="viewSessions.php">Sessions</a></li>
		<li class="link"><a href="Client_history.php">Client History</a></li>
		<li class="link"><a href="interactions.php">Interactions</a></li>
		<li class="link"><a href="">Account</a></li>
		<li class="link"><a href="statistics.php">Statistics</a></li>';
	
		echo '<li>Logged in as: '. $_SESSION["username"] .'</li><li class="link"><a href="php/logoutProcess.php">Logout</a></li></ul>
		</aside>';
			
	}	
	
?>
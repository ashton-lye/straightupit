<?php
require_once('connect.php');
include 'header.php';
include 'navbar.php';
?>

<div class="pageContent">



<h1>
Statistics
Some random stuff
</h1>

<?php

//NUMBER OF CLIENTS PER MONTH
$query = "Select DATE_FORMAT(`date`, '%Y-%m') AS 'month', count(*) AS 'clientNumbers' from sessions group by MONTH(`date`)";
$result = $con->query($query);
foreach($result as $row){
	echo $row['month'] . " " . $row['clientNumbers'] . "<br>";
}


?>



</div>

<?php
include 'footer.php'
?>
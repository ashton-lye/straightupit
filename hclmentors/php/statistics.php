<?php
require_once('connect.php');
include 'header.php';
include 'navbar.php';
?>

<div class="pageContent">



<h1>
Statistics
</h1>



<table>
<?php
//NUMBER OF CLIENTS PER MONTH THIS YEAR
echo "<tr><th>Clients per month (". date("Y") .")</th></tr>";
$query = "Select DATE_FORMAT(`date`, '%M') AS 'month', count(*) AS 'clientNumbers' from sessions WHERE YEAR(`date`) = YEAR(CURRENT_DATE) group by MONTH(`date`) ORDER BY 'month' ASC";
$result = $con->query($query);
foreach($result as $row){
	echo "<tr><td>".$row['month'] . "</td><td>" . $row['clientNumbers'] . "</td></tr>";
}
?>
</table>


<table>
<?php
//NUMBER OF CLIENTS PER MONTH PREVIOUS YEAR
echo "<tr><th>Clients per month (". date("Y", strtotime('-1 years')) .")</th></tr>";
$query = "Select DATE_FORMAT(`date`, '%M') AS 'month', count(*) AS 'clientNumbers' from sessions WHERE YEAR(`date`) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR) group by MONTH(`date`) ORDER BY 'month' ASC";
$result = $con->query($query);
foreach($result as $row){
	echo "<tr><td>".$row['month'] . "</td><td>" . $row['clientNumbers'] . "</td></tr>";
}
?>
</table>

<table>
<?php
echo "<tr><th>Platforms (". date("Y") .")</th></tr>";
$query = "SELECT `platform`, COUNT(`platform`) AS 'count' FROM `sessions` WHERE `noshow` = 'false' AND YEAR(`date`) = YEAR(CURRENT_DATE) GROUP BY `platform`";
$result = $con->query($query);
foreach($result as $row){
	echo "<tr><td>".ucfirst($row['platform']) . "</td><td>" . $row['count'] . "</td></tr>";
}
?>
</table>

<table>
<?php
echo "<tr><th>Platforms (". date("Y", strtotime('-1 Years')) .")</th></tr>";
$query = "SELECT `platform`, COUNT(`platform`) AS 'count' FROM `sessions` WHERE `noshow` = 'false' AND YEAR(`date`) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR) GROUP BY `platform`";
$result = $con->query($query);
foreach($result as $row){
	echo "<tr><td>".ucfirst($row['platform']) . "</td><td>" . $row['count'] . "</td></tr>";
}
?>
</table>







</div>

<?php
include 'footer.php'
?>
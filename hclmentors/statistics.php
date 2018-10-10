<?php
require_once('php/connect.php');
include 'php/header.php';
include 'php/navbar.php';
?>

<div class="statistics">
<link rel="stylesheet" href="css/statistics.css">
<h1>
Statistics
</h1>


<?php
echo '<div class="panel"><h3>'.date("Y")."</h3>";
//NUMBER OF CLIENTS PER MONTH THIS YEAR
echo "<table><tr><th>Month</th><th>Booked</th><th>Walkins</th><th>No Shows</th><th>Total</th></tr>";
$query = "Select DATE_FORMAT(`date`, '%M') AS 'Month', count(IF(`walkin` = 'false' AND `noshow` = 'false', 1, NULL)) as 'Booked' ,count(IF(`walkin` = 'true', 1, NULL)) as 'Walkins', count(IF(`noshow` = 'true', 1, NULL)) as 'No Shows', count(*) AS 'Total' from sessions WHERE YEAR(`date`) = YEAR(CURRENT_DATE) group by MONTH(`date`) ORDER BY Month(`date`)";
$result = $con->query($query);
foreach($result as $row){
	echo "<tr><td>".$row['Month'] . "</td><td>" . $row['Booked'] . "</td><td>".$row['Walkins']."</td><td>".$row['No Shows']."</td><td>".$row['Total']."</td></tr>";
}
echo "</table></div>";
?>

<?php
echo '<div class="panel right"><h3>'.date("Y", strtotime('-1 years'))."</h3>";

echo "<table><tr><th>Month</th><th>Booked</th><th>Walkins</th><th>No Shows</th><th>Total</th></tr>";

$query = "Select DATE_FORMAT(`date`, '%M') AS 'Month', count(IF(`walkin` = 'false' AND `noshow` = 'false', 1, NULL)) as 'Booked' ,count(IF(`walkin` = 'true', 1, NULL)) as 'Walkins', count(IF(`noshow` = 'true', 1, NULL)) as 'No Shows', count(*) AS 'Total' from sessions WHERE YEAR(`date`) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR) group by MONTH(`date`) ORDER BY Month(`date`)";

$result = $con->query($query);

foreach($result as $row){
	echo "<tr><td>".$row['Month'] . "</td><td>" . $row['Booked'] . "</td><td>".$row['Walkins']."</td><td>".$row['No Shows']."</td><td>".$row['Total']."</td></tr>";
}

echo "</table></div>";
?>


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
include 'php/footer.php'
?>
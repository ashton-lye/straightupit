<?php
require_once('php/connect.php');
include 'php/header.php';
include 'php/navbar.php';
?>

<!--Statistics page, worked on by Allan Moorhouse. Mostly Complete.-->

<div class="statistics">
<link rel="stylesheet" href="css/statistics.css">
<h1>
Statistics
</h1>
<div class="mainArea">
<?php
//CLIENTS PANEL
//echo basename($_SERVER['PHP_SELF']);
echo '<div class="panel"><div class="innerPanel"><h2>Clients</h2><h3>'.date("Y")."</h3>";
echo "<table><tr><th>Month</th><th>Booked</th><th>Walkins</th><th>No Shows</th><th>Total</th></tr>";
$query = "Select DATE_FORMAT(`date`, '%M') AS 'Month', count(IF(`walkin` = 'false' AND `noshow` = 'false', 1, NULL)) as 'Booked' ,count(IF(`walkin` = 'true', 1, NULL)) as 'Walkins', count(IF(`noshow` = 'true', 1, NULL)) as 'No Shows', count(*) AS 'Total' from sessions WHERE YEAR(`date`) = YEAR(CURRENT_DATE) group by MONTH(`date`) ORDER BY Month(`date`)";
$result = $con->query($query);
foreach($result as $row){
	echo "<tr><td>".$row['Month'] . "</td><td>" . $row['Booked'] . "</td><td>".$row['Walkins']."</td><td>".$row['No Shows']."</td><td>".$row['Total']."</td></tr>";
}
echo "</table>";

//NUMBER OF CLIENTS PER MONTH LAST YEAR
echo '<h3>'.date("Y", strtotime('-1 years'))."</h3>";

echo "<table><tr><th>Month</th><th>Booked</th><th>Walkins</th><th>No Shows</th><th>Total</th></tr>";

$query = "Select DATE_FORMAT(`date`, '%M') AS 'Month', count(IF(`walkin` = 'false' AND `noshow` = 'false', 1, NULL)) as 'Booked' ,count(IF(`walkin` = 'true', 1, NULL)) as 'Walkins', count(IF(`noshow` = 'true', 1, NULL)) as 'No Shows', count(*) AS 'Total' from sessions WHERE YEAR(`date`) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR) group by MONTH(`date`) ORDER BY Month(`date`)";

$result = $con->query($query);
foreach($result as $row){
	echo "<tr><td>".$row['Month'] . "</td><td>" . $row['Booked'] . "</td><td>".$row['Walkins']."</td><td>".$row['No Shows']."</td><td>".$row['Total']."</td></tr>";
}
echo "</table></div></div>";


//PLATFORMS PANEL
echo '<div class="panel"><div class="innerPanel"><h2>Platforms</h2><h3>'.date("Y")."</h3><table>";
$query = "SELECT `platform`, COUNT(`platform`) AS 'count' FROM `sessions` WHERE `noshow` = 'false' AND `platform` IS NOT NULL AND YEAR(`date`) = YEAR(CURRENT_DATE) GROUP BY `platform`";
$result = $con->query($query);
echo "<tr><th>Platforms</th><th>Total</th></tr>";
foreach($result as $row){
	echo "<tr><td>".ucfirst($row['platform']) . "</td><td>" . $row['count'] . "</td></tr>";
}
echo "</table>";

echo '<h3>'.date("Y", strtotime('-1 Years'))."</h3><table>";
$query = "SELECT `platform`, COUNT(`platform`) AS 'count' FROM `sessions` WHERE `noshow` = 'false' AND `platform` IS NOT NULL AND YEAR(`date`) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR) GROUP BY `platform`";
$result = $con->query($query);

echo "<tr><th>Platforms</th><th>Total</th></tr>";
foreach($result as $row){
	echo "<tr><td>".ucfirst($row['platform']) . "</td><td>" . $row['count'] . "</td></tr>";
}
echo "</table></div></div>";
?>
</div>




<div class="mainArea">
<?php
//Mentors Panel
echo '<div class="panel"><div class="innerPanel"><h2>Mentors</h2><h3>Current Mentors</h3><table>';
$query = "Select sessions.mentor, mentors.active, mentors.fname, mentors.lname, count(IF(sessions.walkin = 'false' AND sessions.noshow = 'false', 1, NULL)) as 'Booked' ,count(IF(sessions.walkin = 'true', 1, NULL)) as 'Walkins', count(IF(sessions.noshow = 'true', 1, NULL)) as 'No Shows', count(*) AS 'Total' from sessions JOIN mentors ON sessions.mentor = mentors.username WHERE mentors.active = 'true' group by sessions.mentor ORDER BY mentors.active DESC";
$result = $con->query($query);

echo "<tr><th>Mentor</th><th>Booked</th><th>Walkins</th><th>No Shows</th><th>Total</th></tr>";

foreach($result as $row){
	echo "<tr><td>".ucfirst($row['fname'])." ".ucfirst($row['lname']) ."</td><td>". $row['Booked'] . "</td><td>".$row['Walkins']."</td><td>".$row['No Shows']."</td><td>".$row['Total'] ."</td></tr>";
}


echo '</table><h3>Previous Mentors</h3><table>';

$query = "Select sessions.mentor, mentors.active, mentors.fname, mentors.lname, count(IF(sessions.walkin = 'false' AND sessions.noshow = 'false', 1, NULL)) as 'Booked' ,count(IF(sessions.walkin = 'true', 1, NULL)) as 'Walkins', count(IF(sessions.noshow = 'true', 1, NULL)) as 'No Shows', count(*) AS 'Total' from sessions JOIN mentors ON sessions.mentor = mentors.username WHERE mentors.active = 'false' group by sessions.mentor ORDER BY mentors.active DESC";
$result = $con->query($query);

echo "<tr><th>Mentor</th><th>Booked</th><th>Walkins</th><th>No Shows</th><th>Total</th></tr>";

foreach($result as $row){
	echo "<tr><td>".ucfirst($row['fname'])." ".ucfirst($row['lname']) ."</td><td>". $row['Booked'] . "</td><td>".$row['Walkins']."</td><td>".$row['No Shows']."</td><td>".$row['Total'] ."</td></tr>";
}
echo'</table></div></div>';




//Libraries Panel
echo '<div class="panel"><div class="innerPanel"><h2>Libraries</h2><h3>'.date("Y").'</h3><table>';
$query = "Select sessions.library, count(IF(sessions.walkin = 'false' AND sessions.noshow = 'false', 1, NULL)) as 'Booked' ,count(IF(sessions.walkin = 'true', 1, NULL)) as 'Walkins', count(IF(sessions.noshow = 'true', 1, NULL)) as 'No Shows', count(*) AS 'Total' from sessions WHERE YEAR(`date`) = YEAR(CURRENT_DATE) group by sessions.library";
$result = $con->query($query);

echo "<tr><th>Library</th><th>Booked</th><th>Walkins</th><th>No Shows</th><th>Total</th></tr>";

foreach($result as $row){
	echo "<tr><td>".ucfirst($row['library'])."</td><td>". $row['Booked'] . "</td><td>".$row['Walkins']."</td><td>".$row['No Shows']."</td><td>".$row['Total'] ."</td></tr>";
}
echo'</table>';

echo '<h3>'.date("Y", strtotime('-1 years')).'</h3><table>';
$query = "Select sessions.library, count(IF(sessions.walkin = 'false' AND sessions.noshow = 'false', 1, NULL)) as 'Booked' ,count(IF(sessions.walkin = 'true', 1, NULL)) as 'Walkins', count(IF(sessions.noshow = 'true', 1, NULL)) as 'No Shows', count(*) AS 'Total' from sessions WHERE YEAR(`date`) = YEAR(CURRENT_DATE - INTERVAL 1 YEAR) group by sessions.library";
$result = $con->query($query);

echo "<tr><th>Library</th><th>Booked</th><th>Walkins</th><th>No Shows</th><th>Total</th></tr>";

foreach($result as $row){
	echo "<tr><td>".ucfirst($row['library'])."</td><td>". $row['Booked'] . "</td><td>".$row['Walkins']."</td><td>".$row['No Shows']."</td><td>".$row['Total'] ."</td></tr>";
}
echo'</table></div></div>';
?>






</div>
</div>

<?php
include 'php/footer.php'
?>
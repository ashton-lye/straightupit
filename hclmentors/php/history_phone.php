<?php
    require_once('connect.php');
	$phone=urldecode($_GET['clientinput']);
 	//$arr = [];

    $query = "select * from sessions WHERE client_phone = '".$phone."' ";
    
	$a=1;
    $result = $con->query($query);
	$output = "<table id='name'><tr><th style='width:100px;'>Date</th><th>Time</th><th>Client Name</th><th>Client Phone Number</th><th>Mentor</th><th>Library</th><th>Platform</th> <th>Problem</th><th>Walk-in</th><th>No-show</th><th>Notes</th></tr>";
		 
    while ($rows=$result->fetch()) {
			
		$output = $output . "<tr $a = ++$a><td>".$rows['date']."</td><td>". $rows['time']."</td><td>". $rows['client_name']."</td><td>". $rows['client_phone']."</td><td>". $rows['mentor']."</td><td>". $rows['library']."</td><td>". $rows['platform']."</td><td>". $rows['problem']."</td><td>". $rows['walkin']."</td><td>". $rows['noshow']."</td><td>". $rows['notes']."</td></tr>";

  	}
	echo $output . "</table>";
        /*$arr[] = array (
            "date" => $row['date'],
            "time" => $row['time'],
            "name" => $row['client_name'],
            "phone" => $row['client_phone'],
			"mentor" => $row['mentor'],
			"library" => $row['library'],
			"platform" => $row['platform'],
			"problem" => $row['problem'],
			"walkin" => $row['walkin'],
			"noshow" => $row['noshow'],
			"notes" => $row['notes']
  
?>*/
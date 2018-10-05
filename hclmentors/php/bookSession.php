<?php
    $day = $_POST['day'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $library = $_POST['library'];
    $name = $_POST['clientName'];
    $number = $_POST['clientNumber'];
    $problem = $_POST['problem'];

    require_once('connect.php');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $mentorQuery = "SELECT mentor FROM shift WHERE day = '$day' AND time = $time AND library = '$library'";
    
    $result = $con->query($mentorQuery);
    $row = $result->fetch();
    $mentor = $row['mentor'];

    try {
        $insertBooking = "INSERT INTO sessions (`date`, `time`, `client_name`, `client_phone`, `problem`, `mentor`, `library`) VALUES ('$date', '$time', '$name', '$number', '$problem', '$mentor', '$library')";
        $con->exec($insertBooking);

        echo "Session Booked Successfully!";
    } 
    catch(PDOException $e) {
        echo "Sorry, Booking Failed. Error Message:" . $e->getMessage();
    }
?>
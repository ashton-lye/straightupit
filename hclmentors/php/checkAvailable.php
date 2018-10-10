<?php
/* php code to get session and shift times from database */

    $day = $_POST['day'];
    $date = $_POST['date'];
    $library = $_POST['library'];

    require_once('connect.php');

    /* make 2 queries - one to get times when mentor is working (shift table) and when sessions are booked (session table)*/
    $shiftQuery = "SELECT time FROM shift WHERE day = '$day' AND library = '$library'";
    $sessionQuery = "SELECT time FROM sessions WHERE date = '$date' AND library = '$library'";

    $shiftArr = [];

    $shiftResult = $con->query($shiftQuery);
    $sessionResult = $con->query($sessionQuery);

    //add results from both queries to an array, JSON encode and echo it
    while ($row = $shiftResult->fetch()) {
        $shiftArr[] = array (
            "time" => $row['time'],
        );
    }

    while ($row = $sessionResult->fetch()) {
        $shiftArr[] = array (
            "time" => $row['time'],
        );
    }

    $shiftJSON = json_encode($shiftArr);

    echo($shiftJSON);
?>

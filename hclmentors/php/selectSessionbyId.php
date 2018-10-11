<?php
    require_once('connect.php');

    $idNumber = $_POST['sessions'];

    $query = "select notes from sessions WHERE sessionID = $idNumber ";
   
    $notes = 'session_notes';

    $result = $con->query($query);
    while ($row=$result->fetch()) {

        $notes = $row['notes'];

    }

    $json = json_encode($notes);

    echo $json
?>
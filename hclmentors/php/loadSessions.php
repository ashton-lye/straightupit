<?php
    require_once('connect.php');

    $query = "select client_name, problem, time, mentor, client_phone, notes from sessions WHERE library = 'central' and date = curdate() and date = curdate() ";
    $arr = [];

    $result = $con->query($query);
    while ($row=$result->fetch()) {
        $arr[] = array (
            "name" => $row['client_name'],
            "problem" => $row['problem'],
            "time" => $row['time'],
            "mentor" => $row['mentor'],
            "phone" => $row['client_phone'],
            "notes" => $row['notes']
        );
    }

    $json = json_encode($arr);

    echo $json
?>
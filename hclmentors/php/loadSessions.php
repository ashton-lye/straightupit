<?php
    require_once('connect.php');

    $query = "select client_name, problem, time, mentor from sessions WHERE library = 'central' ";
    $arr = [];

    $result = $con->query($query);
    while ($row=$result->fetch()) {
        $arr[] = array (
            "name" => $row['client_name'],
            "problem" => $row['problem'],
            "time" => $row['time'],
            "mentor" => $row['mentor']
        );
    }

    $json = json_encode($arr);

    echo $json
?>
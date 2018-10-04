<?php
    require_once('connect.php');

    $query = "SELECT lib_name FROM library";
    $arr = [];

    $result = $con->query($query);

    while ($row = $result->fetch()) {
        $arr[] = array (
            "library" => $row['lib_name'],
        );
    }

    $json = json_encode($arr);

    echo $json;
?>
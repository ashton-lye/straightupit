<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $accountType = $_POST['accountType'];

    require_once('connect.php');

    if ($accountType == 'mentor') {
        $query = "SELECT * FROM mentors WHERE username = '$username' && password = '$password'";
    } elseif ($accountType == 'staff') {
        $query = "SELECT * FROM staff WHERE username = '$username' && password = '$password'";
    } elseif ($accountType == 'admin') {
        $query = "SELECT * FROM admin WHERE username = '$username' && password = '$password'";
    }


    $result = $con->query($query);

    $row = $result->fetch();

    echo $row['username'];
?>
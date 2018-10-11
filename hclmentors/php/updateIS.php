<?php
    $notes = $_POST['notes'];
    $sessionID = $_POST['sessionID'];
    
    require_once('connect.php');
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $insertSNotes = "UPDATE sessions 
                        set notes = '$notes' where sessionID = $sessionID ";
        $con->exec($insertSNotes);

        echo "Session Notes updated Successfully!";
    } 
    catch(PDOException $e) {
        echo "Sorry, Booking Failed. Error Message:" . $e->getMessage();
    }
?>
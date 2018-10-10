<?php
session_start();

session_destroy();
header("location: ../loginV2.php");
?>
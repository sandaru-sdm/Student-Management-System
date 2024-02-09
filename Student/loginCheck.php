<?php
session_start();

    if(!isset($_SESSION['student'])){  
        header('location: index.php');
    } else if($_SESSION["student"]["status_id"] == "0"){
        header('location: index.php');
    }

?>
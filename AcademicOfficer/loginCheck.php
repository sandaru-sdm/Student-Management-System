<?php
session_start();

    if(!isset($_SESSION['academic'])){  
        header('location: index.php');
    } else if($_SESSION["academic"]["status_id"] == "0"){
        header('location: index.php');
    }

?>
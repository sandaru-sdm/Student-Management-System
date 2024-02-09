<?php
session_start();

    if(!isset($_SESSION['teacher'])){  
        header('location: index.php');
    } else if($_SESSION["teacher"]["status_id"] == "0"){
        header('location: index.php');
    }

?>
<?php
include "../connection.php";
session_start();

$username = $_SESSION["verifyUsername"];
$password = $_SESSION["verifyPassword"];
$rememberme = $_SESSION["verifyRemember"]; //true or false
$code = mysqli_real_escape_string($conn, $_POST['code']);

if (empty($code)) {
    echo "Please enter Verification Code.";
} else{
    
    $academic_rs = Database::search("SELECT * FROM `academic_officer` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num = $academic_rs->num_rows;

    if ($num == 1) {
        $d = $academic_rs -> fetch_assoc();
        $verification_code = $d["unique_id"];

        if($verification_code == $code){
            $id = $d["id"];
            $_SESSION["academic"] = $d;

            Database::iud("UPDATE `academic_officer` SET `status_id` = '1' WHERE `id` = '" . $id . "' ");

            if ($rememberme == "true") {
                setcookie("username", $username, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {
                setcookie("username", "", -1);
                setcookie("password", "", -1);
            }
            echo "verifySuccess";
        }

    }
}

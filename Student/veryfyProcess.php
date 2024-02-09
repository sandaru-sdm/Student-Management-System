<?php
include "../connection.php";
session_start();

$username = $_SESSION["verifyStudentUsername"];
$password = $_SESSION["verifyStudentPassword"];
$rememberme = $_SESSION["verifyStudentRemember"]; //true or false
$code = mysqli_real_escape_string($conn, $_POST['code']);

if (empty($code)) {
    echo "Please enter Verification Code.";
} else{
    
    $rs = Database::search("SELECT * FROM `student` WHERE `username` = '" . $username . "' 
    AND `password` = '" . $password . "'");
    $num = $rs->num_rows;

    if ($num == 1) {
        $d = $rs -> fetch_assoc();
        $verification_code = $d["unique_id"];

        if($verification_code == $code){
            $id = $d["id"];
            $_SESSION["teacher"] = $d;

            Database::iud("UPDATE `student` SET `status_id` = '1' WHERE `id` = '" . $id . "' ");

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

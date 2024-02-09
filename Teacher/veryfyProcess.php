<?php
include "../connection.php";
session_start();

$username = $_SESSION["verifyTeacherUsername"];
$password = $_SESSION["verifyTeacherPassword"];
$rememberme = $_SESSION["verifyTeacherRemember"]; //true or false
$code = mysqli_real_escape_string($conn, $_POST['code']);

if (empty($code)) {
    echo "Please enter Verification Code.";
} else{
    
    $teacher_rs = Database::search("SELECT * FROM `teacher` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num = $teacher_rs->num_rows;

    if ($num == 1) {
        $d = $teacher_rs -> fetch_assoc();
        $verification_code = $d["unique_id"];

        if($verification_code == $code){
            $id = $d["id"];
            $_SESSION["teacher"] = $d;

            Database::iud("UPDATE `teacher` SET `status_id` = '1' WHERE `id` = '" . $id . "' ");

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

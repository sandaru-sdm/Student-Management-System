<?php
session_start();
require "../connection.php";

// $username = $_POST["username3"];
// $password = $_POST["password3"];

$username = mysqli_real_escape_string($conn, $_POST['username3']);
$password = mysqli_real_escape_string($conn, $_POST['password3']);
$rememberme = $_POST["rememberme3"]; //true or false

if (empty($username)) {
    echo "Please enter your Username.";
} else if (strlen($username) > 100) {
    echo "Username address should be less than 100 characters.";
} else if (empty($password)) {
    echo "Please enter your password.";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Invalid Password.";
} else {

    $resultset1 = Database::search("SELECT * FROM `student` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num1 = $resultset1->num_rows;

    if ($num1 == 1) {

        $d = $resultset1->fetch_assoc();
        $status = $d["status_id"];

        if ($status == '0') {
            $_SESSION["verifyStudentUsername"] = $username;
            $_SESSION["verifyStudentPassword"] = $password;
            $_SESSION["verifyStudentRemember"] = $rememberme;
            echo "redirect";
        } else if ($status == '1') {

            $enrollment_id = $d["enrollment_fee_status_id"];

            if ($enrollment_id == '0') {

                $regDate = $d["registered_date"];

                $regDateNew = new DateTime($regDate);

                date_add($regDateNew, date_interval_create_from_date_string("30 days"));
                $old =  date_format($regDateNew, "Y-m-d");

                $td = new DateTime();
                $tz = new DateTimeZone("Asia/Colombo");
                $td->setTimezone($tz);
                $today = $td->format("Y-m-d");

                if ($today > $old) {

                    $_SESSION["portal"] = $d;
                    echo "payment";
                } else {

                    Database::iud("UPDATE `student` SET `enrollment_fee_status_id` = '1' WHERE `id` = '".$d["id"]."' ");

                    echo "success";

                    $id = $d["id"];
                    $_SESSION["student"] = $d;

                    if ($rememberme == "true") {
                        setcookie("username", $username, time() + (60 * 60 * 24 * 365));
                        setcookie("password", $password, time() + (60 * 60 * 24 * 365));
                    } else {
                        setcookie("username", "", -1);
                        setcookie("password", "", -1);
                    }
                }
            } else {
                echo "success";

                $id = $d["id"];
                $_SESSION["student"] = $d;

                if ($rememberme == "true") {
                    setcookie("username", $username, time() + (60 * 60 * 24 * 365));
                    setcookie("password", $password, time() + (60 * 60 * 24 * 365));
                } else {
                    setcookie("username", "", -1);
                    setcookie("password", "", -1);
                }
            }
        } else {
            echo "Your Account is Disabled";
        }
    } else {
        echo "Invalid Username Or Password..!";
    }
}

<?php
session_start();
require "../connection.php";

// $username = $_POST["username1"];
// $password = $_POST["password1"];
$username = mysqli_real_escape_string($conn, $_POST['username1']);
$password = mysqli_real_escape_string($conn, $_POST['password1']);
$rememberme = $_POST["rememberme1"]; //true or false

if (empty($username)) {
    echo "Please enter your Username.";
} else if (strlen($username) > 100) {
    echo "Username address should be less than 100 characters.";
} else if (empty($password)) {
    echo "Please enter your password.";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Invalid Password.";
} else {

    $resultset1 = Database::search("SELECT * FROM `academic_officer` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num1 = $resultset1->num_rows;

    if ($num1 == 1) {

        $d = $resultset1->fetch_assoc();
        $status = $d["status_id"];

        if ($status == '0') {
            $_SESSION["verifyUsername"] = $username;
            $_SESSION["verifyPassword"] = $password;
            $_SESSION["verifyRemember"] = $rememberme;
            echo "redirect";

        } else if ($status == '1') {

            echo "success";

            $id = $d["id"];
            $_SESSION["academic"] = $d;

            if ($rememberme == "true") {
                setcookie("username", $username, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {
                setcookie("username", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            echo "Your Account is Disabled";
        }
        
    } else {
        echo "Invalid Username Or Password..!";
    }
}

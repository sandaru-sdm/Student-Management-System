<?php

include "../connection.php";

// $fname = $_POST["fname"];
// $lname = $_POST["lname"];
// $mobile = $_POST["mobile"];
// $username = $_POST["username"];
// $password = $_POST["password"];
// $confirm = $_POST["confirm"];

$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$confirm = mysqli_real_escape_string($conn, $_POST["confirm"]);

if (empty($fname)) {
    echo "Please Enter First Name.";
} else if (empty($lname)) {
    echo "Please Enter Last Name.";
} else if (empty($mobile)) {
    echo "Please Enter Mobile.";
} else if (empty($username)) {
    echo "Please Enter Username.";
} else if (empty($password)) {
    echo "Please Enter Pasword.";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Password length should be between 05 and 20";
} else if (empty($confirm)) {
    echo "Please Enter Confirm Pasword";
} else if ($password != $confirm) {
    echo "Confirm Password Does not match to password.";
} else {

    // Check Whether the admin already exists or not

    $already_rs = Database::search("SELECT * FROM `admin` WHERE `fname`='" . $fname . "' AND `lname`='" . $lname . "' AND `mobile` = '" . $mobile . "' OR `username`='" . $username . "' ");
    $already_num = $already_rs->num_rows;

    if ($already_num >= '1') {
        echo "This Admin Already Exisits.";
    } else {

        // Insert Admin Data

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `admin` (`fname`,`lname`,`mobile`,`username`,`password`,`registered_date`,`user_type_id`,`status_id`) 
        VALUES ('" . $fname . "','" . $lname . "','".$mobile."','" . $username . "','" . $password . "','".$date."','1','0') ");

        echo "success";

    }
}

?>

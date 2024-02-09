<?php

include "../connection.php";

// $id = $_POST["id"];
// $fname = $_POST["fname"];
// $lname = $_POST["lname"];
// $mobile = $_POST["mobile"];
// $username = $_POST["username"];
// $password = $_POST["password"];
// $confirm = $_POST["confirm"];

$id = mysqli_real_escape_string($conn, $_POST["id"]);
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

    // Check Whether the admins fname and lname already exists or not

    $already_rs = Database::search("SELECT * FROM `admin` WHERE `fname`='" . $fname . "' AND 
    `lname`='" . $lname . "' AND `username` = '" . $username . "' ");
    $already_num = $already_rs->num_rows;

    if ($already_num >= '1') {
        echo "This Admin First Name and Last Name Already Exisits.";
    } else {

        // Update Admin Data

        Database::iud("UPDATE `admin` SET `fname` = '" . $fname . "', `lname` = '" . $lname . "', `mobile` = '" . $mobile . "',
        `username` = '" . $username . "', `password` = '" . $password . "' WHERE `id` = '" . $id . "' ");

        echo "success";
    }
}

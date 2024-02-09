<?php
include "../connection.php";

$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$confirm = mysqli_real_escape_string($conn, $_POST["confirm"]);
$grade = mysqli_real_escape_string($conn, $_POST["grade"]);

if (empty($fname)) {
    echo "Please Enter First Name.";
} else if (empty($lname)) {
    echo "Please Enter Last Name.";
} else if (empty($email)) {
    echo "Please enter your email.";
} else if (strlen($email) > 100) {
    echo "Email address should be less than 100 characters.";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
} else if (empty($mobile)) {
    echo "Please Enter Mobile.";
} else if ($grade == 0) {
    echo "Please Select a Grade.";
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

    // Check Whether the Academic Officer already exists or not

    $already_rs = Database::search("SELECT * FROM `academic_officer` WHERE `fname`='" . $fname . "' 
    AND `lname`='" . $lname . "' AND `mobile` = '" . $mobile . "' AND `email` = '" . $email . "' 
    OR `username`='" . $username . "' ");
    $already_num = $already_rs->num_rows;

    if ($already_num >= '1') {
        echo "This Academic Officer Already Exisits.";
    } else {

        // Insert Academic Officer Data

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        $uniqueId = uniqid();

        Database::iud("INSERT INTO `academic_officer` (`fname`,`lname`,`mobile`,`email`,`username`,`password`,`unique_id`,`registered_date`,`user_type_id`,`status_id`,grade_id) 
        VALUES ('" . $fname . "','" . $lname . "','" . $mobile . "','" . $email . "','" . $username . "','" . $password . "','" . $uniqueId . "','" . $date . "','2','0','".$grade."') ");

        echo "success";
    }
}

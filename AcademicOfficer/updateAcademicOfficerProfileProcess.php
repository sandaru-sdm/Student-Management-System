<?php
include "../connection.php";

$id = mysqli_real_escape_string($conn, $_POST["id"]);
$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);
$confirm = mysqli_real_escape_string($conn, $_POST["confirm"]);

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
}  else if (empty($password)) {
    echo "Please Enter Pasword.";
} else if (strlen($password) < 5 || strlen($password) > 20) {
    echo "Password length should be between 05 and 20";
} else if (empty($confirm)) {
    echo "Please Enter Confirm Pasword";
} else if ($password != $confirm) {
    echo "Confirm Password Does not match to password.";
} else {

    // Check Whether the Academic Officer already exists or not

    $already_rs = Database::search("SELECT * FROM `academic_officer` WHERE 
    `fname`='" . $fname . "' AND `lname`='" . $lname . "' AND `mobile` = '" . $mobile . "' 
    AND `email` = '" . $email . "' ");
    
    $already_num = $already_rs->num_rows;

    if ($already_num >= '1') {
        echo "This Academic Officer Details are Exisits.";
    } else {

        // Update Academic Officer Data

        Database::iud("UPDATE `academic_officer` SET `fname` = '".$fname."', `lname` = '".$lname."', 
        `email`='".$email."', `mobile`='".$mobile."', `password` = '".$password."' 
        WHERE `id` = '".$id."' ");
        
        echo "success";
    }
}

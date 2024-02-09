<?php

include "../connection.php";

$subname = mysqli_real_escape_string($conn, $_POST["subname"]);

if (empty($subname)) {
    echo "Please Enter First Name.";
} else {

    // Check Whether the Academic Officer already exists or not

    $already_rs = Database::search("SELECT * FROM `subject` WHERE `name`='" . $subname . "' ");
    $already_num = $already_rs->num_rows;

    if ($already_num >= '1') {
        echo "This Subject Already Exisits.";
    } else {

        // Insert Data

        Database::iud("INSERT INTO `subject` (`name`) VALUES ('" . $subname . "') ");

        echo "success";
    }
}

?>
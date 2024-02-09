<?php

include "../connection.php";

$subname = mysqli_real_escape_string($conn, $_POST["subname"]);
$id = mysqli_real_escape_string($conn, $_POST["id"]);

if (empty($subname)) {
    echo "Please Enter First Name.";
} else {

    // Check Whether the Subject already exists or not

    $already_rs = Database::search("SELECT * FROM `subject` WHERE `name`='" . $subname . "' ");
    $already_num = $already_rs->num_rows;

    if ($already_num >= '1') {
        echo "This Subject Already Exisits.";
    } else {

        // Insert Data

        Database::iud("UPDATE `subject` SET `name` = '".$subname."' WHERE `id` = '".$id."' ");

        echo "success";
    }
}

?>
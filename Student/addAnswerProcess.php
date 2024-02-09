<?php
include "../connection.php";
session_start();

$student_id = $_SESSION["student"]["id"];
$student_fname = $_SESSION["student"]["fname"];
$student_lname = $_SESSION["student"]["lname"];
$assignment = mysqli_real_escape_string($conn, $_POST['assignment']);

$rs = Database::search("SELECT * FROM `answer` WHERE `student_id` = '" . $student_id . "' AND `assignment_id` = '" . $assignment . "' ");
$num = $rs->num_rows;

if ($num == 0) {

    if (isset($_FILES["file"])) {

        $file = $_FILES["file"];

        $allowed_extentions = array("application/pdf");

        $file_ex = $file["type"];

        if (!in_array($file_ex, $allowed_extentions)) {

            echo "Please Select a Valid File.";
        } else {
            $new_extention;

            if ($file_ex == "application/pdf") {
                $new_extention = ".pdf";
            }

            $file_name = "..//Resources//Answer//" . uniqid() . $new_extention;

            move_uploaded_file($file["tmp_name"], $file_name);

            Database::iud("INSERT INTO `answer` (`path`,`student_id`,`assignment_id`)
                VALUES ('" . $file_name . "','" . $student_id . "','" . $assignment . "') ");

            echo "success";
        }
    }else{
        echo "Please Select a File";
    }
} else {

    $data = $rs->fetch_assoc();
    $answer_id = $data["id"];

    if (isset($_FILES["file"])) {

        $file = $_FILES["file"];

        $allowed_extentions = array("application/pdf");

        $file_ex = $file["type"];

        if (!in_array($file_ex, $allowed_extentions)) {

            echo "Please Select a Valid File.";
        } else {
            $new_extention;

            if ($file_ex == "application/pdf") {
                $new_extention = ".pdf";
            }

            $old_rs = Database::search("SELECT * FROM `answer` WHERE `id` = '" . $answer_id . "' ");
            $old_data = $old_rs->fetch_assoc();
            $old_path = $old_data["path"];

            $file_name = "..//Resources//Answer//" . uniqid() . $new_extention;

            move_uploaded_file($file["tmp_name"], $file_name);

            Database::iud("UPDATE `answer` SET `path` = '" . $file_name . "' WHERE `id` = '" . $answer_id . "'");

            $old_file = explode("//", $old_path);
            $remove_path = "..//Resources//Answer//" . $old_file[3];
            unlink($remove_path);

            echo "success";
        }
    }
}

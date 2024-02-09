<?php

require "../connection.php";

$assignment = mysqli_real_escape_string($conn, $_POST["assignment"]);
$student = mysqli_real_escape_string($conn, $_POST["student"]);


$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `marks` 
INNER JOIN `status` ON `marks`.`status_id`=`status`.`id` WHERE `marks`.`assignment_id` = '" . $assignment . "' AND `student_id` = '".$student."' ");

$data = $data_rs->fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if ($status_id == 4) {

    Database::iud("UPDATE `marks` SET `status_id`='5' WHERE `assignment_id`='" . $assignment . "' AND `student_id` = '".$student."' ");
    echo "success";
} else {

    Database::iud("UPDATE `assignment` SET `status_id`='4' WHERE `assignment_id`='" . $assignment . "' AND `student_id` = '".$student."' ");
    echo "success";
}

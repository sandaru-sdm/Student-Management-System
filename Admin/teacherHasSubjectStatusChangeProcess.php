<?php

require "../connection.php";

$id = mysqli_real_escape_string($conn, $_GET["id"]);


$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `teacher_has_subject` 
INNER JOIN `status` ON `teacher_has_subject`.`status_id`=`status`.`id` WHERE `teacher_has_subject`.`id` = '" . $id . "'");

$data = $data_rs->fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if ($status_id == 1) {

    Database::iud("UPDATE `teacher_has_subject` SET `status_id`='0' WHERE `id`='" . $id . "'");
    echo "success";
} else {

    Database::iud("UPDATE `teacher_has_subject` SET `status_id`='1' WHERE `id`='" . $id . "'");
    echo "success";
}

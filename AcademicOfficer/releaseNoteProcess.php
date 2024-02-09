<?php

require "../connection.php";

$id = mysqli_real_escape_string($conn, $_GET["id"]);


$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `lesson_note` 
INNER JOIN `status` ON `lesson_note`.`status_id`=`status`.`id` WHERE `lesson_note`.`id` = '" . $id . "'");

$data = $data_rs->fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if ($status_id == 4) {

    Database::iud("UPDATE `lesson_note` SET `status_id`='5' WHERE `id`='" . $id . "'");
    echo "success";
} else {

    Database::iud("UPDATE `lesson_note` SET `status_id`='4' WHERE `id`='" . $id . "'");
    echo "success";
}

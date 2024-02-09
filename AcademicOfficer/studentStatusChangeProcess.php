<?php

require "../connection.php";

$id = mysqli_real_escape_string($conn, $_GET["id"]);


$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `student` INNER JOIN `status` ON `student`.`status_id`=`status`.`id` WHERE `student`.`id` = '" . $id . "'");
$data = $data_rs->fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if ($status_id == 1) {

    Database::iud("UPDATE `student` SET `status_id`='2' WHERE `id`='" . $id . "'");
    echo "success";
} else {

    Database::iud("UPDATE `student` SET `status_id`='1' WHERE `id`='" . $id . "'");
    echo "success";
}

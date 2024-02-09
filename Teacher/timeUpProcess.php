<?php

require "../connection.php";

$id = mysqli_real_escape_string($conn, $_GET["id"]);


$data_rs =  Database::search("SELECT `status`.`id` AS `id` ,`status`.`name` AS `status_name` FROM `assignment` INNER JOIN `status` ON `assignment`.`status_id`=`status`.`id` WHERE `assignment`.`id` = '" . $id . "'");
$data = $data_rs->fetch_assoc();

$status = $data["status_name"];
$status_id = $data["id"];

// echo $status;
// echo $status_id;

if ($status_id == 5) {

    Database::iud("UPDATE `assignment` SET `status_id`='6' WHERE `id`='" . $id . "'");
    echo "success";
} else if ($status_id == 6) {

    Database::iud("UPDATE `assignment` SET `status_id`='5' WHERE `id`='" . $id . "'");
    echo "success";
}else{
    echo "You Can't release Assignments";
}

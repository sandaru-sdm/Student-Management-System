<?php
include "../connection.php";

$assignment = mysqli_real_escape_string($conn, $_POST['assignment']);
$student = mysqli_real_escape_string($conn, $_POST['student']);
$mark = mysqli_real_escape_string($conn, $_POST['mark']);

if(empty($mark)){
    echo "Please Enter Marks.";
}else if($mark <= "0"){
    echo "Please Enter Valid Mark.";
} else{

    $rs = Database::search("SELECT * FROM `answer` WHERE `assignment_id` = '".$assignment."' AND `student_id` = '".$student."' ");
    $data = $rs -> fetch_assoc();
    $answer_id = $data["id"];

    $already_rs = Database::search("SELECT * FROM `marks` WHERE `assignment_id` = '".$assignment."' 
    AND `student_id` = '".$student."' AND `answer_id` = '".$answer_id."' ");
    $already_num = $already_rs -> num_rows;

    if($already_num == 1){

        //update

        Database::iud("UPDATE `marks` SET `mark` = '".$mark."' WHERE `assignment_id` = '".$assignment."' 
        AND `student_id` = '".$student."' AND `answer_id` = '".$answer_id."' ");

        echo "update";

    } else {

        //insert

        Database::iud("INSERT INTO `marks` (`mark`,`student_id`,`assignment_id`,`answer_id`,`status_id`) VALUES
        ('".$mark."','".$student."','".$assignment."','".$answer_id."','4') ");

        echo "success";

    }

}

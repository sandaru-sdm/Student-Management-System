<?php

require "../connection.php";

$teacher = mysqli_real_escape_string($conn, $_POST["teacher"]);
$subject = mysqli_real_escape_string($conn, $_POST["subject"]);
$grade = mysqli_real_escape_string($conn, $_POST["grade"]);

if($teacher == 0){
    echo "Please Select a Teacher";
} else if($subject == 0){
    echo "Please Select a Subject";
} else if($grade == 0){
    echo "Please Select a Grade";
} else{

    $already_rs = Database::search("SELECT * FROM `teacher_has_subject` 
    WHERE `teacher_id` = '".$teacher."' AND `subject_id` = '".$subject."' AND `grade_id` = '".$grade."' ");

    $num = $already_rs -> num_rows;

    if($num >= 1){
        echo "This Teacher Has Subject Already Exist.";
    }else{
        
        Database::iud("INSERT INTO `teacher_has_subject` (`teacher_id`,`subject_id`,`grade_id`,`status_id`) 
        VALUES ('".$teacher."','".$subject."','".$grade."','1') ");

        echo "success";
        
    }

}

?>
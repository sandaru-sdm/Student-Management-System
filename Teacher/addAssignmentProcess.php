<?php
include "../connection.php";
session_start();

$teacher_id = $_SESSION["teacher"]["id"];
$grade = mysqli_real_escape_string($conn, $_POST['grade']);
$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

if($grade == 0){
    echo "Please Select a Grade.";
} else if($subject == 0){
    echo "Please Select a Subject.";
}else if(empty($name)){
    echo "Please Enter Name of the Assignment.";
}else if(!isset($_FILES["file"])){
    echo "Please Select a File.";
} else{

    $file = $_FILES["file"]; 

    $rs= Database::search("SELECT * FROM `teacher_has_subject` 
    WHERE `teacher_id` = '".$teacher_id."' AND `subject_id` = '".$subject."' 
    AND `grade_id` = '".$grade."' ");

    $num = $rs -> num_rows;

    if($num == 1){

        $data = $rs -> fetch_assoc();
        $ths_id = $data["id"];

        $allowed_extentions = array("application/pdf");
            
            $file_ex = $file["type"];

            if(!in_array($file_ex,$allowed_extentions)){

                echo "Please Select a Valid File.";

            }else{
                $new_extention;

                if($file_ex == "application/pdf"){
                    $new_extention = ".pdf";
                } 

                $newName = preg_replace('/\s+/','_',$name);
                $file_name = "..//Resources//Assignments//".$newName.$new_extention;

                move_uploaded_file($file["tmp_name"],$file_name);

                Database::iud("INSERT INTO `assignment` (`name`,`path`,`teacher_has_subject_id`,`status_id`)
                VALUES ('".$name."','".$file_name."','".$ths_id."','4') ");

                echo "success";

            }

    } else{

        echo "You are not assigned to teache this subject for this Grade.";

    }

}

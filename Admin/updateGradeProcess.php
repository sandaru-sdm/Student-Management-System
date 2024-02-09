<?php

session_start();
include "../connection.php";

$admin = $_SESSION["admin"]["id"];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);

$year = $d->format("Y");

$rs = Database::search("SELECT * FROM `grade_update_history` WHERE `years` = '" . $year . "' ");
$num = $rs->num_rows;

if ($num == 0) {

    // update

    $student_rs = Database::search("SELECT * FROM `student` ");
    $student_num = $student_rs->num_rows;

    for ($x = 0; $x < $student_num; $x++) {

        $student_data = $student_rs->fetch_assoc();
        $grade = $student_data["grade_id"];

        if($grade == "1"){

            Database::iud("UPDATE `student` SET `grade_id` = '2', `annul_payment_status_id` = '0' WHERE `grade_id` = '1' ");

        }else if($grade == "2") {

            Database::iud("UPDATE `student` SET `grade_id` = '3', `annul_payment_status_id` = '0' WHERE `grade_id` = '2' ");        

        }else if($grade == "3") {

            Database::iud("UPDATE `student` SET `grade_id` = '4', `annul_payment_status_id` = '0' WHERE `grade_id` = '3' ");        

        }else if($grade == "4") {

            Database::iud("UPDATE `student` SET `grade_id` = '5', `annul_payment_status_id` = '0' WHERE `grade_id` = '4' ");     

        }else if($grade == "5") {

            Database::iud("UPDATE `student` SET `grade_id` = '6', `annul_payment_status_id` = '0' WHERE `grade_id` = '5' "); 

        }else if($grade == "6") {

            Database::iud("UPDATE `student` SET `grade_id` = '7', `annul_payment_status_id` = '0' WHERE `grade_id` = '6' ");   

        }else if($grade == "7") {

            Database::iud("UPDATE `student` SET `grade_id` = '8', `annul_payment_status_id` = '0' WHERE `grade_id` = '7' ");     

        }else if($grade == "8") {

            Database::iud("UPDATE `student` SET `grade_id` = '9', `annul_payment_status_id` = '0' WHERE `grade_id` = '8' ");   

        }else if($grade == "9") {

            Database::iud("UPDATE `student` SET `grade_id` = '10', `annul_payment_status_id` = '0' WHERE `grade_id` = '9' ");        

        }else if($grade == "10") {

            Database::iud("UPDATE `student` SET `grade_id` = '11', `annul_payment_status_id` = '0' WHERE `grade_id` = '10' ");         

        }else if($grade == "11") {

            Database::iud("UPDATE `student` SET `grade_id` = '12', `annul_payment_status_id` = '0' WHERE `grade_id` = '11' ");         

        }else if($grade == "12") {

            Database::iud("UPDATE `student` SET `grade_id` = '13', `annul_payment_status_id` = '0' WHERE `grade_id` = '12' ");        

        }else if($grade == "13") {

            Database::iud("UPDATE `student` SET `grade_id` = '14', `annul_payment_status_id` = '0' WHERE `grade_id` = '13' ");       
        }

    }

    Database::iud("INSERT INTO `grade_update_history` (`years`,`Admin_id`) VALUES ('".$year."','".$admin."') ");

    echo "success";

} else {

    echo "The Grade has been Updated for this Year.";

}

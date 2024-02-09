<?php
include "../connection.php";
session_start();

$id = mysqli_real_escape_string($conn, $_POST['id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

if (empty($name)) {
    echo "Please Enter Name of the Note.";
} else {

    if (isset($_FILES["file"])) {

        $file = $_FILES["file"];

        $rs = Database::search("SELECT * FROM `lesson_note` WHERE `name` = '" . $name . "'");
    
        $num = $rs->num_rows;
    
        if ($num != 1) {
    
            $allowed_extentions = array("application/pdf");
    
            $file_ex = $file["type"];
    
            if (!in_array($file_ex, $allowed_extentions)) {
    
                echo "Please Select a Valid File.";
            } else {
                $new_extention;
    
                if ($file_ex == "application/pdf") {
                    $new_extention = ".pdf";
                }
    
                $old_rs = Database::search("SELECT * FROM `lesson_note` WHERE `id` = '" . $id . "' ");
                $old_data = $old_rs->fetch_assoc();
                $old_path = $old_data["path"];
    
                $newName = preg_replace('/\s+/','_',$name);
                $file_name = "..//Resources//Notes//" . $newName . $new_extention;
    
                move_uploaded_file($file["tmp_name"], $file_name);
    
                Database::iud("UPDATE `lesson_note` SET `name` = '" . $name . "', `path` = '" . $file_name . "' WHERE `id` = '".$id."' ");
    
                $old_file = explode("//", $old_path);
                $remove_path = "..//Resources//Notes//" . $old_file[3];
                unlink($remove_path);
    
                echo "success";
            }
        } else {
    
            echo "This Name Already Exists.";
        }

    } else{

        Database::iud("UPDATE `lesson_note` SET `name` = '" . $name . "' WHERE `id` = '".$id."' ");
        echo "success";

    }

}

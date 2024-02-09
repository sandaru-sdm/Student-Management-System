<?php

include("../connection.php");

$grade = mysqli_real_escape_string($conn, $_POST["grade"]);

$rs = Database::search("SELECT * FROM `student` WHERE `grade_id` = '" . $grade . "'");
$num = $rs->num_rows;

for ($x = 0; $x < $num; $x++) {

    $data = $rs->fetch_assoc();
    $status_rs = Database::search("SELECT * FROM `status` WHERE `id`='" . $data["status_id"] . "' ");
    $status_data = $status_rs->fetch_assoc();
    $gender_rs = Database::search("SELECT * FROM `gender` WHERE `id`='" . $data["gender_id"] . "' ");
    $gender_data = $gender_rs->fetch_assoc();
?>

    <td><?php echo $x+1; ?></td>
    <td><?php echo $data["id"]; ?></td>
    <td><?php echo $data["fname"]; ?></td>
    <td><?php echo $data["lname"]; ?></td>
    <td><?php echo $data["email"]; ?></td>
    <td><?php echo $data["mobile"]; ?></td>
    <td><?php echo $gender_data["name"]; ?></td>
    <td><?php echo $data["username"]; ?></td>
    <td><?php echo $data["password"]; ?></td>
    <td id="status"><?php echo $status_data["name"]; ?></td>
  
<?php
}

?>
<?php

include("../connection.php");

$assignment = mysqli_real_escape_string($conn, $_POST["assignment"]);

$rs = Database::search("SELECT `student`.`id` AS `stuid`,`student`.`fname` AS `fname`,
`student`.`lname` AS `lname`, `student`.`email` AS `email`, `student`.`mobile` AS `mobile`,
`assignment`.`name` AS `assignment`, `marks`.`mark` AS `mark`,`status`.`id` AS `status_id`,
`status`.`name` AS `status` FROM `marks` 
INNER JOIN `student` ON `marks`.`student_id` = `student`.`id`
INNER JOIN `assignment` ON `marks`.`assignment_id` = `assignment`.`id`
INNER JOIN `status` ON `marks`.`status_id` = `status`.`id`
WHERE `marks`.`assignment_id` = '" . $assignment . "'");

$num = $rs->num_rows;

for ($x = 0; $x < $num; $x++) {

    $data = $rs->fetch_assoc();
?>

    <td><?php echo $x + 1; ?></td>
    <td><?php echo $data["stuid"]; ?></td>
    <td><?php echo $data["fname"] . " " . $data["lname"]; ?></td>
    <td><?php echo $data["email"]; ?></td>
    <td><?php echo $data["mobile"]; ?></td>
    <td><?php echo $data["assignment"]; ?></td>
    <td><?php echo $data["mark"]; ?></td>
    <td id="status"><?php echo $data["status"]; ?></td>
    <td>
        <button class="btn btn-danger col-12 " onclick="changeAssignmentStatus(<?php echo $assignment ?>,<?php echo $data['stuid'] ?>);">
            Change Status
        </button>
    </td>

<?php
}

?>
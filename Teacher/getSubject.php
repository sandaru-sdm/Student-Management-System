<?php
	require "../connection.php";
	
	$grade = mysqli_real_escape_string($conn, $_POST['grade']);

	$rs = Database::search("SELECT `teacher_has_subject`.`id` AS `ths_ID`, `subject`.`id` AS `sub_id`,
    `subject`.`name` AS `sub_name` FROM `teacher_has_subject` INNER JOIN `subject` ON 
    `subject`.`id` = `teacher_has_subject`.`subject_id` WHERE `grade_id` = '".$grade."'");
	$num = $rs -> num_rows;

		$list = "";
		
		for($x = 0; $x < $num; $x++){

			$data = $rs -> fetch_assoc();
			$list .= "<option value=\"{$data['sub_id']}\">{$data['sub_name']}</option>";

		}

		if(isset($list)){
			echo $list;
		}


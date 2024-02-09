<?php

if (isset($_GET["id"]) && !empty($_GET["id"])) {

?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SMS | Teacher | Marks</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
        <link rel="stylesheet" href="../css/bootstrap.css" />
        <link rel="stylesheet" href="../css/style.css" />
        <!-- <link rel="stylesheet" href="../css/adminStyle.css" /> -->
        <link rel="stylesheet" href="../css/alertify.min.css" />
        <link rel="icon" href="../Resources/icon.png" />
    </head>

    <body>

        <?php
        include "header.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Assignment Marks</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Teacher</a></li>
                                <li class="breadcrumb-item"><a href="manageAssignments.php">Assignment</a></li>
                                <li class="breadcrumb-item active">Assignment Marks</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <section class="content mt-5">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">

                            <div class="card">
                                <div class="card-header text-center fw-bold d-flex align-items-center justify-content-center">
                                    <h1 class="card-title">Assignments</h1>
                                </div>

                                <!-- /.card-header -->
                                <div class="card-body">

                                    <?php

                                    $assignment_id = mysqli_real_escape_string($conn, $_GET['id']);

                                    $rs = Database::search("SELECT `student`.`id` AS `student`,
                                            `student`.`fname` AS `fname`, `student`.`lname` AS `lname`, 
                                            `student`.`grade_id` AS `grade`, `answer`.`path` AS `path`,
                                            `answer`.`student_id`,`answer`.`assignment_id`, `assignment`.`name` AS `assignment`
                                            FROM `answer` INNER JOIN `student` ON `answer`.`student_id` = `student`.`id`
                                            INNER JOIN `assignment` ON `answer`.`assignment_id` = `assignment`.`id` 
                                            WHERE `answer`.`assignment_id` = '" . $assignment_id . "' ");

                                    $num = $rs->num_rows;

                                    ?>

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Student Id</th>
                                                <th>Name</th>
                                                <th>Grade</th>
                                                <th>Assignment</th>
                                                <th>Answer</th>
                                                <th>Marks</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            for ($x = 0; $x < $num; $x++) {

                                                $data = $rs->fetch_assoc();

                                                $mark_rs = Database::search("SELECT * FROM `marks` 
                                                WHERE `student_id` = '" . $data["student"] . "' AND `assignment_id` = '" . $assignment_id . "' ");

                                                $mark_data = $mark_rs->fetch_assoc();

                                                $answer_rs = Database::search("SELECT * FROM `answer` WHERE `student_id` = '" . $data["student"] . "' 
                                                AND `assignment_id` = '" . $assignment_id . "' ");

                                                $answer_data = $answer_rs->fetch_assoc();

                                            ?>

                                                <tr>
                                                    <td><?php echo $x + 1; ?></td>
                                                    <td><?php echo $data["student"]; ?></td>
                                                    <td><?php echo $data["fname"] . " " . $data["lname"]; ?></td>
                                                    <td><?php echo $data["grade"]; ?></td>
                                                    <td><?php echo $data["assignment"]; ?></td>

                                                    <td>
                                                        <a href="downloadAnswer.php?id=<?php echo $answer_data["id"]; ?>" class="col-12 m-1 btn btn-primary">Answer</a>
                                                    </td>

                                                    <?php
                                                    if (isset($mark_data["mark"])) {
                                                    ?>
                                                        <td>
                                                            <span class="fs-4 fw-bold"><?php echo $mark_data["mark"]; ?></span>
                                                        </td>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <td>
                                                            <button class="btn btn-info disabled">Pending</button>
                                                        </td>
                                                    <?php
                                                    }
                                                    ?>

                                                    <td>


                                                        <input type="number" class="form-control my-1 mark" placeholder="Add Marks" id="mark" />

                                                        <button type="submit" class="btn btn-success col-12 " name="submit" id="submit" onclick="addMark(<?php echo $assignment_id ?>,<?php echo $data['student'] ?>);">Add Mark</button>

                                                    </td>

                                                </tr>

                                            <?php

                                            }

                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Student Id</th>
                                                <th>Name</th>
                                                <th>Grade</th>
                                                <th>Assignment</th>
                                                <th>Answer</th>
                                                <th>Marks</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>

                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>

        </div>

        <?php
        include "footer.php";

        ?>

    </body>

    </html>

<?php
} else {
?>
    <script>
        window.location = "manageAssignments.php";
    </script>
<?php
}

?>
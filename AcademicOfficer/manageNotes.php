<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Academic Officer | Notes</title>
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
                        <h1 class="m-0">Notes</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Academic Officer</a></li>
                            <li class="breadcrumb-item active">Notes</li>
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
                                <h1 class="card-title">Notes</h1>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <?php

                                $rs = Database::search("SELECT `lesson_note`.`id` AS `id`, `lesson_note`.`name` AS `note`,
                                `subject`.`name` AS `subject`, `teacher_has_subject`.`grade_id` AS `grade`, 
                                `lesson_note`.`status_id` AS `status`
                                 FROM `lesson_note` INNER JOIN `teacher_has_subject` ON
                                `teacher_has_subject`.`id` = `lesson_note`.`teacher_has_subject_id` INNER JOIN 
                                `subject` ON `teacher_has_subject`.`subject_id` = `subject`.`id` 
                                WHERE `teacher_has_subject`.`grade_id` = '" . $_SESSION["academic"]["grade_id"] . "' ");

                                $num = $rs->num_rows;

                                ?>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Note Id</th>
                                            <th>Note Name</th>
                                            <th>Subject</th>
                                            <th>Grade</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        for ($x = 0; $x < $num; $x++) {
                                            $data = $rs->fetch_assoc();

                                            $status_rs = Database::search("SELECT * FROM `status` WHERE `id`='" . $data["status"] . "' ");
                                            $status_data = $status_rs->fetch_assoc();
                                        ?>

                                            <tr>
                                                <td><?php echo $x + 1; ?></td>
                                                <td><?php echo $data["id"]; ?></td>
                                                <td><?php echo $data["note"]; ?></td>
                                                <td><?php echo $data["subject"]; ?></td>
                                                <td><?php echo $data["grade"]; ?></td>
                                                <td><?php echo $status_data["name"]; ?></td>
                                                <td>
                                                    <a href="#" class="col-12 m-1 btn btn-success" onclick="releaseNote(<?php echo $data['id']; ?>)">Note Status</a>
                                                    <br>
                                                    <a href="downloadNote.php?id=<?php echo $data["id"]; ?>" class="col-12 m-1 btn btn-info">Download Note</a>
                                                </td>
                                            </tr>

                                        <?php

                                        }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Note Id</th>
                                            <th>Note Name</th>
                                            <th>Subject</th>
                                            <th>Grade</th>
                                            <th>Status</th>
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
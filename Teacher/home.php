<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Teacher | Home</title>
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
                        <h1 class="m-0">Teacher Dashboard</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Teacher</a></li>
                            <li class="breadcrumb-item active">Home</li>
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">

                    <?php

                    $student_rs = Database::search("SELECT * FROM `student` ");
                    $student_num = $student_rs->num_rows;

                    ?>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?php echo $student_num; ?></h3>

                                <p>Students</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="students.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <?php

                    $class_rs = Database::search("SELECT * FROM `teacher_has_subject` WHERE `teacher_id` = '" . $_SESSION["teacher"]["id"] . "' ");
                    $class_num = $student_rs->num_rows;

                    ?>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?php echo $class_num; ?></h3>

                                <p>Classes</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-book"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <?php


                    $note_rs = Database::search("SELECT * FROM `lesson_note` INNER JOIN `teacher_has_subject` ON
                                `teacher_has_subject`.`id` = `lesson_note`.`teacher_has_subject_id` 
                                WHERE `teacher_has_subject`.`teacher_id` = '" . $_SESSION["teacher"]["id"] . "' ");

                    $note_num = $note_rs->num_rows;

                    ?>

                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?php echo $note_num; ?></h3>

                                <p>Study Notes</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-journal"></i>
                            </div>
                            <a href="manageNotes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <?php

                    $assignment_rs = Database::search("SELECT * FROM `assignment` INNER JOIN `teacher_has_subject` ON
                                `teacher_has_subject`.`id` = `assignment`.`teacher_has_subject_id` 
                                WHERE `teacher_has_subject`.`teacher_id` = '" . $_SESSION["teacher"]["id"] . "' ");

                    $assignment_num = $assignment_rs->num_rows;

                    ?>

                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo $assignment_num; ?><sup style="font-size: 20px"></sup></sup></h3>

                                <p>Assignment</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-book"></i>
                            </div>
                            <a href="manageAssignments.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>



                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <img src="../Resources/Welcome.jpg" class="img-fluid" alt="...">

                </div>
            </div>
        </section>

    </div>

    <?php
    include "footer.php";
    ?>
</body>

</html>
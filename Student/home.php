<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Student | Home</title>
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
                        <h1 class="m-0">Student Dashboard</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Student</a></li>
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


        <?php

        $note_rs = Database::search("SELECT * FROM `lesson_note` INNER JOIN `teacher_has_subject` ON
                    `teacher_has_subject`.`id` = `lesson_note`.`teacher_has_subject_id` 
                    WHERE `teacher_has_subject`.`grade_id` = '" . $_SESSION["student"]["grade_id"] . "' ");

        $note_num = $note_rs->num_rows;

        $assignment_rs = Database::search("SELECT * FROM `assignment` INNER JOIN `teacher_has_subject` ON
                        `teacher_has_subject`.`id` = `assignment`.`teacher_has_subject_id` 
                        WHERE `teacher_has_subject`.`grade_id` = '" . $_SESSION["student"]["grade_id"] . "' ");

        $assignment_num = $assignment_rs->num_rows;


        if ($_SESSION["student"]["annul_payment_status_id"] == '0') {
        ?>


            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row container-fluid d-flex justify-content-center align-content-center">

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
                                <a href="#" class="small-box-footer disabled">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

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
                                <a href="#" class="small-box-footer disabled">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>



                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        <?php
        } else {
        ?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row container-fluid d-flex justify-content-center align-content-center">


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
                                <a href="notes.php" class="small-box-footer disabled">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

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
                                <a href="assignments.php" class="small-box-footer disabled">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>



                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->

        <?php
        }

        ?>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <?php

                    if ($_SESSION["student"]["annul_payment_status_id"] == '0') {

                    ?>

                        <div class="col-10 mt-5 d-flex container-fluid justify-content-center align-content-center">
                            <div class="row ">

                                <div class="card">
                                    <div class="card-header text-center fw-bold fs-4">
                                        Annual Payment
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">Some Features of your student portal have been disabled.</h5>
                                        <p class="card-text mb-3">You have to make your annual payment to enable it.</p>
                                        <a href="annualPayment.php" class="mt-3 btn btn-primary text-center d-flex align-content-center justify-content-center container-fluid">To Payment Page</a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    <?php
                    } else {
                    ?>



                        <img src="../Resources/Welcome.jpg" class="img-fluid" alt="...">



                    <?php
                    }
                    ?>

                </div>
            </div>
        </section>

    </div>

    <?php
    include "footer.php";
    ?>
</body>

</html>
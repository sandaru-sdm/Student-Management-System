<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Student | Assignments</title>
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
                        <h1 class="m-0">Assignments</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Students</a></li>
                            <li class="breadcrumb-item active">Assignments</li>
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

                                <div class="container mt-3">
                                    <div id="accordion">

                                        <?php

                                        $rs = Database::search("SELECT * FROM `subject` ");
                                        $num = $rs->num_rows;

                                        for ($x = 0; $x < $num; $x++) {

                                            $data = $rs->fetch_assoc();
                                        ?>

                                            <div class="card m-3">
                                                <div class="card-header d-flex justify-content-center align-content-center text-center">
                                                    <a class="btn btn-primary col-4" data-bs-toggle="collapse" href="#collapse<?php echo $x + 1; ?>">
                                                        <?php echo $data["name"]; ?>
                                                    </a>
                                                </div>
                                                <div id="collapse<?php echo $x + 1; ?>" class="collapse show" data-bs-parent="#accordion">
                                                    <div class="card-body">

                                                        <?php

                                                        $rs1 = Database::search("SELECT `assignment`.`id` AS `id`, `assignment`.`name` AS `assignment`,
                                                            `subject`.`name` AS `subject`, `teacher_has_subject`.`grade_id` AS `grade`, 
                                                            `assignment`.`status_id` AS `status`
                                                            FROM `assignment` INNER JOIN `teacher_has_subject` ON
                                                            `teacher_has_subject`.`id` = `assignment`.`teacher_has_subject_id` INNER JOIN 
                                                            `subject` ON `teacher_has_subject`.`subject_id` = `subject`.`id` 
                                                            WHERE `teacher_has_subject`.`subject_id` = '" . $data["id"] . "' AND `teacher_has_subject`.`grade_id` = '".$_SESSION["student"]["grade_id"]."' 
                                                            AND (`assignment`.`status_id` = '5' OR `assignment`.`status_id` = '6' ) ");

                                                        $num1 = $rs1->num_rows;

                                                        ?>

                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>Assignment Id</th>
                                                                    <th>Assignment Name</th>
                                                                    <th>Subject</th>
                                                                    <th>Grade</th>
                                                                    <th>Download</th>
                                                                    <th>Answer</th>
                                                                    <th>Marks</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>


                                                                <?php

                                                                for ($y = 0; $y < $num1; $y++) {
                                                                    $data1 = $rs1->fetch_assoc();

                                                                    $mark_rs = Database::search("SELECT * FROM `marks` WHERE `assignment_id` = '".$data1["id"]."' 
                                                                    AND `student_id` = '".$_SESSION["student"]["id"]."' AND `status_id` = '5' ");
                                                                    
                                                                    $mark_data = $mark_rs -> fetch_assoc();

                                                                ?>
                                                                    <tr>
                                                                        <td><?php echo $y + 1; ?></td>
                                                                        <td><?php echo $data1["id"]; ?></td>
                                                                        <td><?php echo $data1["assignment"]; ?></td>
                                                                        <td><?php echo $data1["subject"]; ?></td>
                                                                        <td><?php echo $data1["grade"]; ?></td>

                                                                        <?php

                                                                        if ($data1["status"] == '5') {
                                                                        ?>

                                                                            <td>
                                                                                <a href="downloadAssignment.php?id=<?php echo $data1["id"]; ?>" class="col-12 m-1 btn btn-success">Download Note</a>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <div class="input-group">
                                                                                        <div class="custom-file">
                                                                                            <input type="file" class="custom-file-input" id="upload">
                                                                                            <label class="custom-file-label" for="upload">Choose file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn btn-warning btn-file col-12 m-1" onclick="uploadAnswer(<?php echo $data1['id'];  ?>);">Upload</button>

                                                                            </td>

                                                                            <?php
                                                                            if(isset($mark_data["mark"])){
                                                                                ?>
                                                                                <td class="fw-bold fs-4"><?php echo $mark_data["mark"]; ?></td>
                                                                                <?php
                                                                            }else{
                                                                                ?>
                                                                                <td><button class="btn btn-info disabled">Pending</button></td>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            

                                                                        <?php
                                                                        } else {
                                                                        ?>

                                                                            <td>
                                                                                <a href="downloadAssignment.php?id=<?php echo $data1["id"]; ?>" class="col-12 m-1 btn btn-success disabled">Download Note</a>
                                                                            </td>
                                                                            <td>
                                                                                <div class="form-group">
                                                                                    <div class="input-group">
                                                                                        <div class="custom-file">
                                                                                            <input type="file" class="custom-file-input disabled" id="upload">
                                                                                            <label class="custom-file-label disabled" for="upload">Choose file</label>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <button class="btn btn-warning btn-file col-12 m-1 disabled" onclick="uploadAnswer(<?php echo $data1['id'];  ?>);">Upload</button>

                                                                            </td>

                                                                            <?php
                                                                            if(isset($mark_data["mark"])){
                                                                                ?>
                                                                                <td class="fw-bold fs-4"><?php echo $mark_data["mark"]; ?></td>
                                                                                <?php
                                                                            }else{
                                                                                ?>
                                                                                <td><button class="btn btn-info disabled">Pending</button></td>
                                                                                <?php
                                                                            }
                                                                            ?>

                                                                        <?php
                                                                        }

                                                                        ?>


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
                                                                    <th>Download</th>
                                                                    <th>Answer</th>
                                                                    <th>Marks</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>

                                        <?php
                                        }
                                        ?>

                                    </div>
                                </div>

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

    <script>
        $('.collapse').collapse()

        $('#myCollapsible').collapse({
            toggle: false
        })

        $('#myCollapsible').on('hidden.bs.collapse', function() {
            // do something…
        })
    </script>

</body>

</html>
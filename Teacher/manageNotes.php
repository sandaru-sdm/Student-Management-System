<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Teacher | Notes</title>
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
                            <li class="breadcrumb-item"><a href="home.php">Teacher</a></li>
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

        <!-- Main content -->
        <section class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-10 mx-auto mb-5">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header bg-success">
                                <h3 class="card-title">Add Notes</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body col-12">
                                <div class="row">

                                    <div class="form-group col-6">
                                        <div class="col-12 col-6">
                                            <div class="form-group">
                                                <label>Grade</label>
                                                <?php

                                                $rs = Database::search("SELECT * FROM `grade`");
                                                $num = $rs->num_rows;

                                                ?>

                                                <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" style="width: 100%;" id="grade" onchange="gradeDetails(value);">

                                                    <?php
                                                    for ($z = 0; $z < $num; $z++) {
                                                        $data = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <!-- /.form-group -->

                                        </div>
                                    </div>

                                    <div class="form-group col-6">
                                        <div class="col-12 col-6">
                                            <div class="form-group">
                                                <label>Subject</label>

                                                <select class="form-control select2 select2-success" data-dropdown-css-class="select2-success" style="width: 100%;" id="subject">


                                                </select>
                                            </div>
                                            <!-- /.form-group -->
                                        </div>
                                    </div>

                                    

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Note Name</label>
                                        <input type="text" class="form-control" placeholder="Note Name" id="name" />
                                    </div>

                                    <div class="form-group col-6">
                                        <div class="col-12 ">

                                            <div class="form-group">
                                                <label for="upload">File input</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="upload">
                                                        <label class="custom-file-label" for="upload">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer mb-2">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-success col-12 " name="submit" id="submit" onclick="addNote();">Add Notes</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

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
                                WHERE `teacher_has_subject`.`teacher_id` = '" . $_SESSION["teacher"]["id"] . "' ");
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
                                                    <a href="updateNote.php?id=<?php echo $data["id"]; ?>" class="col-12 m-1 btn btn-success">Update Note</a>
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
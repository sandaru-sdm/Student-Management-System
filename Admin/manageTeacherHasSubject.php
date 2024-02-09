<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Admin | Manage Teacher Has Subject</title>
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
                        <h1 class="m-0">Manage Teacher Has Subject</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Admin</a></li>
                            <li class="breadcrumb-item active">Manage Teacher Has Subject</li>
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
                    <div class="col-md-10 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header bg-danger">
                                <h3 class="card-title">Add Teacher Has Subject</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body col-12">
                                <div class="row">

                                    <div class="form-group col-6">
                                        <div class="col-12 col-6">
                                            <div class="form-group">
                                                <label>Teacher</label>

                                                <?php

                                                $rs = Database::search("SELECT * FROM `teacher` WHERE `status_id`='1' ");
                                                $num = $rs->num_rows;

                                                ?>

                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="teacher">
                                                    <option selected="selected" value="0">-SELECT-</option>

                                                    <?php
                                                    for ($x = 0; $x < $num; $x++) {
                                                        $data = $rs->fetch_assoc();
                                                    ?>
                                                        <option value="<?php echo $data["id"]; ?>"><?php echo $data["fname"] . " " . $data["lname"]; ?></option>
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
                                                <?php

                                                $rs = Database::search("SELECT * FROM `subject` ");
                                                $num = $rs->num_rows;

                                                ?>

                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="subject">
                                                    <option selected="selected" value="0">-SELECT-</option>

                                                    <?php
                                                    for ($y = 0; $y < $num; $y++) {
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

                                    <div class="form-group col-6 justify-content-center align-content-end d-flex container-fluid">
                                        <div class="col-12 col-6">
                                            <div class="form-group">
                                                <label>Grade</label>
                                                <?php

                                                $rs = Database::search("SELECT * FROM `grade`");
                                                $num = $rs->num_rows;

                                                ?>

                                                <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="grade">
                                                    <option selected="selected" value="0">-SELECT-</option>

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

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer mb-2">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-danger col-12 " name="submit" id="submit" onclick="addTeacherHasSubject();">Save</button>
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
                                <h1 class="card-title">Admins</h1>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <?php

                                $rs = Database::search("SELECT `teacher_has_subject`.`id` AS `id`,`teacher`.`fname` 
                                AS `fname`, `teacher`.`lname` AS `lname`, `subject`.`name` AS `subject`,
                                `grade`.`name` AS `grade`, `teacher_has_subject`.`status_id` AS `status` 
                                FROM `teacher_has_subject` 
                                INNER JOIN `teacher` ON `teacher_has_subject`.`teacher_id` = `teacher`.`id` 
                                INNER JOIN `subject` ON `teacher_has_subject`.`subject_id` = `subject`.`id`
                                INNER JOIN `grade` ON `teacher_has_subject`.`grade_id` = `grade`.`id` ");

                                $num = $rs->num_rows;

                                ?>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Teacher Name</th>
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
                                                <td><?php echo $data["id"]; ?></td>
                                                <td><?php echo $data["fname"] . " " . $data["lname"]; ?></td>
                                                <td><?php echo $data["subject"]; ?></td>
                                                <td><?php echo $data["grade"]; ?></td>
                                                <td><?php echo $status_data["name"]; ?></td>

                                                <td>
                                                    <button class="btn btn-danger col-12 " onclick="changeTeacherHasSubjectStatus(<?php echo $data['id']; ?>);">
                                                        Change Status</button>
                                                    <br />
                                                </td>
                                            </tr>

                                        <?php

                                        }
                                        ?>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Id</th>
                                            <th>Teacher Name</th>
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
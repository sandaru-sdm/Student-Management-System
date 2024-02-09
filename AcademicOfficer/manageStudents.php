<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Academic Officer | Students</title>
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
                        <h1 class="m-0">Manage Students</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Academic Officer</a></li>
                            <li class="breadcrumb-item active">Manage Students</li>
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
                            <div class="card-header bg-secondary">
                                <h3 class="card-title">Add Students</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body col-12">
                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" id="fname" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" id="lname" />
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="exampleInputFirstName">Email</label>
                                        <input type="text" class="form-control" placeholder="Email" id="email" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Mobile</label>
                                        <input type="text" class="form-control" placeholder="Mobile" id="mobile" />
                                    </div>

                                    <div class="form-group col-6">
                                        <lable class="form-label fw-bold ">Gender</lable>
                                        <select class="form-select mt-2" id="gender">

                                            <?php

                                            $resultset = Database::search("SELECT * FROM `gender`");
                                            $n = $resultset->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $f = $resultset->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $f["id"]; ?>"><?php echo $f["name"]; ?>
                                                </option>

                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Grade</label>
                                        <input type="text" class="form-control" placeholder="Grade" id="grade" value="<?php echo $_SESSION["academic"]["grade_id"]; ?>" disabled />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Username</label>
                                        <input type="text" class="form-control" placeholder="username" id="username" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" id="password" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" id="confirm" />
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer mb-2">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-secondary col-12 " name="submit" id="submit" onclick="addStudent();">Save Student</button>
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
                                <h1 class="card-title">Students</h1>
                            </div>

                            <!-- /.card-header -->
                            <div class="card-body">

                                <?php

                                $rs = Database::search("SELECT * FROM `student` WHERE `grade_id` = '" . $_SESSION["academic"]["grade_id"] . "'");
                                $num = $rs->num_rows;

                                ?>

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Student Id</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Gender</th>
                                            <th>Grade</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        for ($x = 0; $x < $num; $x++) {
                                            $data = $rs->fetch_assoc();

                                            $gender_rs = Database::search("SELECT * FROM `gender` WHERE `id` = '" . $data["gender_id"] . "' ");
                                            $gender_data = $gender_rs->fetch_assoc();

                                            $status_rs = Database::search("SELECT * FROM `status` WHERE `id`='" . $data["status_id"] . "' ");
                                            $status_data = $status_rs->fetch_assoc();
                                        ?>

                                            <tr>
                                                <td><?php echo $x + 1; ?></td>
                                                <td><?php echo $data["id"]; ?></td>
                                                <td><?php echo $data["fname"]; ?></td>
                                                <td><?php echo $data["lname"]; ?></td>
                                                <td><?php echo $data["email"]; ?></td>
                                                <td><?php echo $data["mobile"]; ?></td>
                                                <td><?php echo $gender_data["name"]; ?></td>
                                                <td><?php echo $data["grade_id"]; ?></td>
                                                <td><?php echo $data["username"]; ?></td>
                                                <td><?php echo $data["password"]; ?></td>
                                                <td id="status"><?php echo $status_data["name"]; ?></td>
                                                <td>

                                                    <a class="btn btn-success col-12 mb-2 text-decoration-none" href="updateStudent.php?id=<?php echo $data["id"]; ?>" class="text-light">
                                                        Update Student</a>
                                                    <br />
                                                    <button class="btn btn-danger col-12 " onclick="changeStudentStatus(<?php echo $data['id']; ?>);">
                                                        Change Status</button>
                                                    <br />
                                                    <a class="btn btn-info col-12 mt-2 text-decoration-none" class="text-light" onclick="sendStudentInvitation(<?php echo $data['id']; ?>);">
                                                        Send Invitation
                                                    </a>


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
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Gender</th>
                                            <th>Grade</th>
                                            <th>Username</th>
                                            <th>Password</th>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Student | Profile</title>
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
                        <h1 class="m-0">Profile</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Student</a></li>
                            <li class="breadcrumb-item active">Profile</li>
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
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Profile</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body col-12">
                                <div class="row">

                                    <?php
                                    $id = $_SESSION["student"]["id"];

                                    $rs = Database::search("SELECT * FROM `student` WHERE `id` = '" . $id . "' ");
                                    $data = $rs->fetch_assoc();

                                    ?>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">ID</label>
                                        <input type="text" class="form-control" placeholder="ID" id="id" disabled value="<?php echo $id; ?>" />
                                    </div>

                                    <div class="form-group col-6">

                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" id="fname" value="<?php echo $data["fname"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" id="lname" value="<?php echo $data["lname"]; ?>" />
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="exampleInputFirstName">Email</label>
                                        <input type="text" class="form-control" placeholder="Email" id="email" value="<?php echo $data["email"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Mobile</label>
                                        <input type="text" class="form-control" placeholder="Mobile" id="mobile" value="<?php echo $data["mobile"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <lable class="form-label fw-bold ">Gender</lable>
                                        <select class="form-select mt-2" id="gender" disabled>

                                            <?php

                                            $resultset = Database::search("SELECT * FROM `gender`");
                                            $n = $resultset->num_rows;

                                            for ($x = 0; $x < $n; $x++) {
                                                $f = $resultset->fetch_assoc();

                                            ?>

                                                <option value="<?php echo $f["id"]; ?>" <?php if ($data["gender_id"] == $f["id"]) { ?> selected <?php } ?>><?php echo $f["name"]; ?>
                                                </option>

                                            <?php
                                            }

                                            ?>

                                        </select>
                                    </div>


                                    <div class="form-group col-12">
                                        <label for="exampleInputFirstName">Username</label>
                                        <input type="text" class="form-control" disabled placeholder="username" id="username" value="<?php echo $data["username"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" id="password" value="<?php echo $data["password"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" id="confirm" value="<?php echo $data["password"]; ?>" />
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer mb-2">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-primary col-12 " name="submit" id="submit" onclick="updateStudentProfile(<?php echo $data['id']; ?>);">Update Profile</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <?php
    include "footer.php";

    ?>

</body>

</html>
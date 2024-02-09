<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Academic Officer | Profile</title>
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
                            <li class="breadcrumb-item"><a href="home.php">Academic Officer</a></li>
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
        <section class="content mt-5 mb-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-10 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header bg-secondary">
                                <h3 class="card-title">Profile</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body col-12">
                                <div class="row">

                                    <?php

                                    $id = $_SESSION["academic"]["id"];
                                    $academic_rs = Database::search("SELECT * FROM `academic_officer` WHERE `id` = '" . $id . "' ");
                                    $academic_data = $academic_rs->fetch_assoc();

                                    ?>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">ID</label>
                                        <input type="text" class="form-control" placeholder="ID" id="id" value="<?php echo $id; ?>" disabled />
                                    </div>

                                    <div class="form-group col-6">

                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" id="fname" value="<?php echo $academic_data["fname"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" id="lname" value="<?php echo $academic_data["lname"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Email</label>
                                        <input type="text" class="form-control" placeholder="Email" id="email" value="<?php echo $academic_data["email"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Mobile</label>
                                        <input type="text" class="form-control" placeholder="Mobile" id="mobile" value="<?php echo $academic_data["mobile"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Grade</label>
                                        <?php

                                        $rs = Database::search("SELECT * FROM `grade`");
                                        $num = $rs->num_rows;

                                        ?>

                                        <select class="form-control select2" data-dropdown-css-class="select2-danger" style="width: 100%;" id="grade" disabled>
                                            <option selected="selected" value="0">-SELECT-</option>

                                            <?php
                                            for ($z = 0; $z < $num; $z++) {
                                                $data = $rs->fetch_assoc();
                                            ?>
                                                <option value="<?php echo $data["id"]; ?>" <?php if ($academic_data["grade_id"] == $data["id"]) { ?> selected <?php } ?>><?php echo $data["name"]; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- /.form-group -->


                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Username</label>
                                        <input type="text" class="form-control" placeholder="username" id="username" value="<?php echo $academic_data["username"]; ?>" disabled />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" id="password" value="<?php echo $academic_data["password"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" id="confirm" value="<?php echo $academic_data["password"]; ?>" />
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer mb-2">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-secondary col-12 " name="submit" id="submit" onclick="updateAcademicOfficerProfile(<?php echo $id; ?>);">Update Profile</button>
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
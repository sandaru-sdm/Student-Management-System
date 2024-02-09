<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Admin | Manage Admin</title>
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
                        <h1 class="m-0">Manage Admin</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Admin</a></li>
                            <li class="breadcrumb-item active">Manage Admin</li>
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
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Add Admin</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body col-12">
                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" id="ad-fname" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" id="ad-lname" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Mobile</label>
                                        <input type="text" class="form-control" placeholder="Mobile" id="ad-mobile" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Username</label>
                                        <input type="text" class="form-control" placeholder="Username" id="ad-username" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" id="ad-password" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" id="ad-confirm" />
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer mb-2">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-danger col-12 " name="submit" id="submit" onclick="addAdmin();">Save Admin</button>
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

                                $admin_rs = Database::search("SELECT * FROM `admin`");
                                $admin_num = $admin_rs->num_rows;

                                if ($_SESSION["admin"]["id"] == "1") {

                                ?>

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Mobile</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            for ($x = 0; $x < $admin_num; $x++) {
                                                $admin_data = $admin_rs->fetch_assoc();

                                                $status_rs = Database::search("SELECT * FROM `status` WHERE `id`='" . $admin_data["status_id"] . "' ");
                                                $status_data = $status_rs->fetch_assoc();
                                            ?>

                                                <tr>
                                                    <td><?php echo $admin_data["id"]; ?></td>
                                                    <td><?php echo $admin_data["fname"]; ?></td>
                                                    <td><?php echo $admin_data["lname"]; ?></td>
                                                    <td><?php echo $admin_data["mobile"]; ?></td>
                                                    <td><?php echo $admin_data["username"]; ?></td>
                                                    <td><?php echo $admin_data["password"]; ?></td>
                                                    <td id="status"><?php echo $status_data["name"]; ?></td>
                                                    <td>
                                                        <?php

                                                        if ($admin_data["id"] == "1") {

                                                        ?>
                                                            <a class="btn btn-success col-12 mb-2 text-decoration-none" href="updateAdmin.php?id=<?php echo $admin_data["id"]; ?>" class="text-light">
                                                                Update Admin</a>
                                                            <br />
                                                            <button class="btn btn-danger col-12 disabled" onclick="changeStatus(<?php echo $admin_data['id']; ?>);">
                                                                Change Status</button>
                                                        <?php
                                                        } else {

                                                        ?>

                                                            <a class="btn btn-success col-12 mb-2 text-decoration-none " href="updateAdmin.php?id=<?php echo $admin_data["id"]; ?>" class="text-light">
                                                                Update Admin</a>
                                                            <br />
                                                            <button class="btn btn-danger col-12" onclick="changeStatus(<?php echo $admin_data['id']; ?>);">
                                                                Change Status</button>

                                                        <?php

                                                        }

                                                        ?>
                                                    </td>
                                                </tr>

                                            <?php

                                            }
                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Mobile</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                <?php

                                } else {

                                ?>

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Mobile</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            for ($x = 0; $x < $admin_num; $x++) {
                                                $admin_data = $admin_rs->fetch_assoc();

                                                $status_rs = Database::search("SELECT * FROM `status` WHERE `id`='" . $admin_data["status_id"] . "' ");
                                                $status_data = $status_rs->fetch_assoc();
                                            ?>

                                                <tr>
                                                    <td><?php echo $admin_data["id"]; ?></td>
                                                    <td><?php echo $admin_data["fname"]; ?></td>
                                                    <td><?php echo $admin_data["lname"]; ?></td>
                                                    <td><?php echo $admin_data["mobile"]; ?></td>
                                                    <td><?php echo $admin_data["username"]; ?></td>
                                                    <td id="status"><?php echo $status_data["name"]; ?></td>
                                                    <td>

                                                        <?php

                                                        if ($_SESSION["admin"]["id"] == $admin_data["id"]) {

                                                        ?>
                                                            <a class="btn btn-success col-12 mb-2 text-decoration-none" href="updateAdmin.php?id=<?php echo $admin_data["id"]; ?>" class="text-light">
                                                                Update Admin</a>
                                                            <br />
                                                            <button class="btn btn-danger col-12 disabled" onclick="changeStatus(<?php echo $admin_data['id']; ?>);">
                                                                Change Status</button>
                                                        <?php
                                                        } else {

                                                        ?>

                                                            <a class="btn btn-success col-12 mb-2 text-decoration-none disabled" href="updateAdmin.php?id=<?php echo $admin_data["id"]; ?>" class="text-light">
                                                                Update Admin</a>
                                                            <br />
                                                            <button class="btn btn-danger col-12 disabled" onclick="changeStatus(<?php echo $admin_data['id']; ?>);">
                                                                Change Status</button>

                                                        <?php

                                                        }

                                                        ?>


                                                    </td>
                                                </tr>

                                            <?php

                                            }
                                            ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Id</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Mobile</th>
                                                <th>Username</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                <?php

                                }

                                ?>

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

    <script src="../js/script.js"></script>

</body>

</html>
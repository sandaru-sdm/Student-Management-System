<?php
if (isset($_GET["id"]) && !empty($_GET["id"])) {
?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SMS | Admin | Update Academic Officer</title>
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
                            <h1 class="m-0">Update Academic Officers</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Admin</a></li>
                                <li class="breadcrumb-item active"><a href="manageAcademicOfficers.php"> Manage Academic Officers</a></li>
                                <li class="breadcrumb-item active">Update Academic Officers</li>
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
                                    <h3 class="card-title">Update Academic Officer</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body col-12">
                                    <div class="row">

                                        <?php

                                        $id = $_GET["id"];

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

                                            <select class="form-control select2 select2-danger" data-dropdown-css-class="select2-danger" style="width: 100%;" id="grade">
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
                                            <input type="text" class="form-control" placeholder="username" id="username" value="<?php echo $academic_data["username"]; ?>" />
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
                                        <button type="submit" class="btn btn-danger col-12 " name="submit" id="submit" onclick="updateAcademicOfficer(<?php echo $id; ?>);">Update Academic Officers</button>
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

<?php
} else {
?>

    <script>
        window.location = "manageAcademicOfficers.php";
    </script>

<?php
}
?>
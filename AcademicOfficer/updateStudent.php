<?php

if (isset($_GET["id"]) && !empty($_GET["id"])) {

?>

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

                                        <?php
                                        $id = mysqli_real_escape_string($conn, $_GET["id"]);

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
                                            <select class="form-select mt-2" id="gender">

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

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Grade</label>
                                            <input type="text" class="form-control" placeholder="Grade" id="grade" value="<?php echo $_SESSION["academic"]["grade_id"]; ?>" disabled />
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Username</label>
                                            <input type="text" class="form-control" placeholder="username" id="username" value="<?php echo $data["username"]; ?>"  disabled/>
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
                                        <button type="submit" class="btn btn-secondary col-12 " name="submit" id="submit" onclick="updateStudent();">Update Student</button>
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
        window.location = "manageStudents.php";
    </script>
<?php
}
?>
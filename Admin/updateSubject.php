<?php

if (isset($_GET["id"]) && !empty($_GET["id"])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SMS | Admin | Update Subjects</title>
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
                            <h1 class="m-0">Update Subjects</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Admin</a></li>
                                <li class="breadcrumb-item"><a href="manageStudents.php">Manage Subjects</a></li>
                                <li class="breadcrumb-item active">Update Subjects</li>
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
                                    <h3 class="card-title">Update Subject</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body col-12">
                                    <div class="row">

                                    <?php
                                    $id = mysqli_real_escape_string($conn, $_GET["id"]);
                                    $resultset = Database::search("SELECT * FROM `subject` WHERE `id` = '".$id."'");
                                    $data = $resultset -> fetch_assoc();
                                    ?>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Subject ID</label>
                                            <input type="text" class="form-control" placeholder="Subject Name" disabled value="<?php echo $data["id"]; ?>" />
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Subject Name</label>
                                            <input type="text" class="form-control" placeholder="Subject Name" id="subname" value="<?php echo $data["name"]; ?>" />
                                        </div>



                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer mb-2">
                                    <div class="d-grid gap-2 col-6 mx-auto">
                                        <button type="submit" class="btn btn-danger col-12 " name="submit" id="submit" onclick="updateSubject(<?php echo $data['id']; ?>);">Update Subject</button>
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
}else{
    ?>
    <script>
        window.location = "manageSubjects.php";
    </script>
    <?php
}
?>
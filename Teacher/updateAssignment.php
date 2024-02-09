<?php

if (isset($_GET["id"]) && !empty($_GET["id"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SMS | Teacher | Update Assignments</title>
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
                            <h1 class="m-0">Update Assignments</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Teacher</a></li>
                                <li class="breadcrumb-item"><a href="manageAssignments.php">Assignments</a></li>
                                <li class="breadcrumb-item active">Update Assignments</li>
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
                                    <h3 class="card-title">Update Assignments</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <div class="card-body col-12">
                                    <div class="row">

                                        <?php

                                        $id = mysqli_real_escape_string($conn, $_GET['id']);

                                        $rs = Database::search("SELECT `subject`.`name` AS `subject`, 
                                        `teacher_has_subject`.`grade_id` AS `grade`, `assignment`.`name` AS `assignment` 
                                        FROM `assignment` INNER JOIN `teacher_has_subject` 
                                        ON `teacher_has_subject`.`id` = `assignment`.`teacher_has_subject_id` INNER JOIN
                                        `subject` ON `teacher_has_subject`.`subject_id` = `subject`.`id` WHERE `assignment`.`id` = '" . $id . "' ");

                                        $data = $rs->fetch_assoc();

                                        ?>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Assignment ID</label>
                                            <input type="text" class="form-control" placeholder="Assignment ID" id="id" disabled value="<?php echo $_GET["id"]; ?>" />
                                        </div>

                                        <div class="form-group col-6">
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Grade</label>
                                            <input type="text" class="form-control" placeholder="Grade" id="grade" disabled value="<?php echo $data["grade"]; ?>" />
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Subject</label>
                                            <input type="text" class="form-control" placeholder="Subject" id="subject" disabled value="<?php echo $data["subject"]; ?>" />
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="exampleInputFirstName">Assignment Name</label>
                                            <input type="text" class="form-control" placeholder="Assignment Name" id="name" value="<?php echo $data["assignment"]; ?>" />
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
                                        <button type="submit" class="btn btn-success col-12 " name="submit" id="submit" onclick="updateAssignment();">Update Assignment</button>
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
        window.location = "manageAssignments.php";
    </script>
<?php
}
?>
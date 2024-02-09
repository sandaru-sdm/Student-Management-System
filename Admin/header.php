<?php require "loginCheck.php" ?>
<?php require "../connection.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
    <script src="https://kit.fontawesome.com/a51f2d3a19.js" crossorigin="anonymous"></script>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="../plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <link rel="stylesheet" href="../css/alertify.min.css" />


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="home.php" class="nav-link">Home</a>
                </li>

            </ul>
            <!-- Right navbar links -->
            <!-- <ul class="navbar-nav "> -->
            <!-- Navbar Search -->

            <!-- <li class="nav-item d-none d-sm-inline-block">
                    <i class="fa-solid fa-right-from-bracket"></i>
                </li> -->

            <!-- </ul> -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->


                <li class="nav-item  d-sm-inline-block">
                    <a href="#" class="nav-link" onclick="adminSignOut();">Sign-Out</a>
                </li>

            </ul>

            <!-- <ul class="navbar-nav "> -->
            <!-- Navbar Search -->

            <!-- <li class="nav-item d-none d-sm-inline-block">
                    <i class="fa-light fa-right-from-bracket"></i>
                </li> -->

            <!-- </ul> -->

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-blue elevation-4">
            <!-- Brand Logo -->
            <a href="home.php" class="brand-link">
                <img src="../Resources/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../Resources/avatar/avatar4.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"><?php echo $_SESSION["admin"]["fname"] . " " . $_SESSION["admin"]["lname"]; ?></a>
                    </div>
                </div>


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="home.php" class="nav-link bg-danger">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>

                        </li>
                    </ul>

                    <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item n">
                            <a href="manageAdmin.php" class="nav-link bg-danger">
                                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class="nav-icon bi bi-person-circle"></i>
                                <p>
                                    Admin
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>

                        </li>
                    </ul>

                    <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="manageAcademicOfficers.php" class="nav-link bg-danger">
                                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class="nav-icon bi bi-file-earmark-person"></i>
                                <p>
                                    Academic Officers
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>

                        </li>
                    </ul>

                    <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="manageTeachers.php" class="nav-link bg-danger">
                                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class="nav-icon bi bi-file-person-fill"></i>
                                <p>
                                    Teachers
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>

                        </li>
                    </ul>

                    <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="manageStudents.php" class="nav-link bg-danger">
                                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class="nav-icon bi bi-person-plus-fill"></i>
                                <p>
                                    Students
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>

                        </li>
                    </ul>

                    <hr class="border-2 border-white" />

                    <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="manageSubjects.php" class="nav-link bg-danger">
                                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class="nav-icon bi bi-book"></i>
                                <p>
                                    Subject
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>

                        </li>
                    </ul>

                    <hr class="border-2 border-white" />

                    <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="manageTeacherHasSubject.php" class="nav-link bg-danger">
                                <!-- <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class="nav-icon bi bi-book"></i>
                                <p>
                                    Teacher Has Subject
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>

                        </li>
                    </ul>

                    <hr class="border-2 border-white" />

                    <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item ">
                            <a href="assignmentMarks.php" class="nav-link bg-danger">
                                <i class="nav-icon bi bi-file-text"></i>
                                <p>
                                    Assignment Marks
                                    <!-- <i class="right fas fa-angle-left"></i> -->
                                </p>
                            </a>

                        </li>
                    </ul>

                    <?php

                    if ($_SESSION["admin"]["id"] == "1") {
                    ?>

                        <hr class="border-2 border-white" />

                        <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
                            <li class="nav-item ">
                                <a href="manageGrades.php" class="nav-link bg-danger">

                                    <i class="nav-icon bi bi-mortarboard"></i>

                                    <p>
                                        Grades
                                        <!-- <i class="right fas fa-angle-left"></i> -->
                                    </p>
                                </a>

                            </li>
                        </ul>

                    <?php

                    } else {
                    ?>

                        <hr class="border-2 border-white" />

                        <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item ">
                                <a href="manageGrades.php" class="nav-link bg-danger disabled">

                                    <i class="nav-icon bi bi-mortarboard"></i>

                                    <p>
                                        Grades
                                        <!-- <i class="right fas fa-angle-left"></i> -->
                                    </p>
                                </a>

                            </li>
                        </ul>

                    <?php
                    }

                    ?>



                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>



        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script src="../js/script.js"></script>


</body>

</html>
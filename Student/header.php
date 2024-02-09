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

    <!-- daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="../dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
        </div> -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark">
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


                <li class="nav-item d-sm-inline-block">
                    <a href="#" class="nav-link" onclick="studentSignOut();">Sign-Out</a>
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

        <?php

        if ($_SESSION["student"]["annul_payment_status_id"] == '0') {
        ?>


            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-blue elevation-4">
                <!-- Brand Logo -->
                <a href="home.php" class="brand-link text-decoration-none">
                    <img src="../Resources/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">SMS</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../Resources/avatar/avatar2.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block text-decoration-none"><?php echo $_SESSION["student"]["fname"] . " " . $_SESSION["student"]["lname"]; ?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link bg-primary disabled">
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
                            <li class="nav-item menu-open">
                                <a href="profile.php" class="nav-link bg-primary disabled">
                                    <i class="nav-icon bi bi-person-circle"></i>
                                    <p>
                                        Profile
                                        <!-- <i class="right fas fa-angle-left"></i> -->
                                    </p>
                                </a>

                            </li>
                        </ul>

                        <hr class="border-2 border-white" />

                        <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="notes.php" class="nav-link bg-primary disabled">

                                    <i class="nav-icon bi bi-book"></i>
                                    <p>
                                        Study Notes
                                        <!-- <i class="right fas fa-angle-left"></i> -->
                                    </p>
                                </a>

                            </li>
                        </ul>

                        <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="assignments.php" class="nav-link bg-primary disabled">

                                    <i class="nav-icon bi bi-file-text"></i>
                                    <p>
                                        Assignment
                                        <!-- <i class="right fas fa-angle-left"></i> -->
                                    </p>
                                </a>

                            </li>
                        </ul>

                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

        <?php
        } else {
        ?>

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-blue elevation-4">
                <!-- Brand Logo -->
                <a href="home.php" class="brand-link text-decoration-none">
                    <img src="../Resources/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">SMS</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="../Resources/avatar/avatar2.png" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block text-decoration-none"><?php echo $_SESSION["student"]["fname"] . " " . $_SESSION["student"]["lname"]; ?></a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="#" class="nav-link bg-primary ">
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
                            <li class="nav-item menu-open">
                                <a href="profile.php" class="nav-link bg-primary ">
                                    <i class="nav-icon bi bi-person-circle"></i>
                                    <p>
                                        Profile
                                        <!-- <i class="right fas fa-angle-left"></i> -->
                                    </p>
                                </a>

                            </li>
                        </ul>

                        <hr class="border-2 border-white" />

                        <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="notes.php" class="nav-link bg-primary ">

                                    <i class="nav-icon bi bi-book"></i>
                                    <p>
                                        Study Notes
                                        <!-- <i class="right fas fa-angle-left"></i> -->
                                    </p>
                                </a>

                            </li>
                        </ul>

                        <ul class="nav nav-pills nav-sidebar flex-column mt-2" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item menu-open">
                                <a href="assignments.php" class="nav-link bg-primary ">

                                    <i class="nav-icon bi bi-file-text"></i>
                                    <p>
                                        Assignment
                                        <!-- <i class="right fas fa-angle-left"></i> -->
                                    </p>
                                </a>

                            </li>
                        </ul>

                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

        <?php
        }

        ?>


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
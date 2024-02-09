<?php

if(isset($_GET["id"]) && !empty($_GET["id"])){

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Admin | Update Admin</title>
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
                        <h1 class="m-0">Update Admin</h1>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Admin</a></li>
                            <li class="breadcrumb-item"><a href="manageAdmin.php">Manage Admin</a></li>
                            <li class="breadcrumb-item active">Update Admin</li>
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
                                <h3 class="card-title">Update Admin</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body col-12">
                                <div class="row">

                                <?php
                                
                                $id = $_GET["id"];

                                $admin_rs = Database::search("SELECT * FROM `admin` WHERE `id` = '".$id."'");
                                $admin_data = $admin_rs -> fetch_assoc();
                                
                                ?>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">User ID</label>
                                        <input type="text" class="form-control" placeholder="Admin ID" id="ad-id" disabled value="<?php echo $id; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">First Name</label>
                                        <input type="text" class="form-control" placeholder="First Name" id="ad-fname" value="<?php echo $admin_data["fname"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Last Name</label>
                                        <input type="text" class="form-control" placeholder="Last Name" id="ad-lname" value="<?php echo $admin_data["lname"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Mobile</label>
                                        <input type="text" class="form-control" placeholder="Mobile" id="ad-mobile" value="<?php echo $admin_data["mobile"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Username</label>
                                        <input type="text" class="form-control" placeholder="Username" id="ad-username" value="<?php echo $admin_data["username"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Password</label>
                                        <input type="password" class="form-control" placeholder="Password" id="ad-password" value="<?php echo $admin_data["password"]; ?>" />
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="exampleInputFirstName">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="Confirm Password" id="ad-confirm" value="<?php echo $admin_data["password"]; ?>" />
                                    </div>

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer mb-2">
                                <div class="d-grid gap-2 col-6 mx-auto">
                                    <button type="submit" class="btn btn-danger col-12 " name="submit" id="submit" onclick="updateAdmin(<?php echo $id; ?>);">Update Admin</button>
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

    <script src="../js/script.js"></script>

</body>

</html>

<?php
}else{
    ?>
    <script>
        window.location = "manageAdmin.php";
    </script>
    <?php
}

?>
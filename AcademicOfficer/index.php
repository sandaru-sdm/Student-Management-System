<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Academic | Sign-In</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/academicStyle.css" />
    <link rel="stylesheet" href="../css/alertify.min.css" />
    <link rel="icon" href="../Resources/icon.png" />

</head>

<body>

    <div class="container-fluid vh-100 d-flex justify-content-center py-5">
        <div class="row align-content-center mt-5">

        <a href="../index.php" class="col-1 btn btn-warning d-flex align-content-center justify-content-center text-center container-fluid"><i class="bi bi-house-fill"></i></a>

            <div class="container py-5 h-100 mt-5">

                <?php
                $username = "";
                $password = "";

                if (isset($_COOKIE["username"])) {
                    $username = $_COOKIE["username"];
                }

                if (isset($_COOKIE["password"])) {
                    $password = $_COOKIE["password"];
                }

                ?>

                <div class="row justify-content-center align-items-center mb-3 mt-5 align-items-lg-center">
                    <div class="col-10 col-lg-10">
                        <div class="card shadow-2-strong card-registration border-3 border-dark bg-dark" style="border-radius: 15px;">

                            <div class="card-body p-4">
                                <h3 class="mb-2 text-center title-3 text-white">Academic Sign-In</h3>

                                <div class="row">

                                    <div class="col-12 mt-1">
                                        <lable class="form-label fw-bold text-white">Username</lable>
                                        <input type="text" class="form-control" id="username1" value="<?php echo $username ?>" />
                                    </div>

                                    <div class="col-12 mt-1">
                                        <lable class="form-label fw-bold text-white">Password</lable>
                                        <input type="password" class="form-control" id="password1" value="<?php echo $password ?>" />
                                    </div>

                                    <div class="col-6 mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input text-white" type="checkbox" value="1" id="rememberme1">
                                            <label class="form-check-label text-white">Remember Me</label>
                                        </div>
                                    </div>

                                    <div class="col-6 mt-3">
                                    </div>

                                    <div class="col-12 col-lg-6 d-grid mt-4 d-flex container-fluid align-content-center">
                                        <button class="btn btn-primary col-12" onclick="signInAcademicOfficer();">Sign-In</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->

            <!-- <div class="modal" tabindex="-1" id="verification">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Academic Officer Verification</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Please Enter the Verification code sent with the email.</p>
                            <br/>
                            <div class="col-12 mt-1">
                                <lable class="form-label fw-bold text-white">Verification Code</lable>
                                <input type="text" class="form-control" id="password1" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Enter</button>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- Modal -->

            <div class="col-12 fixed-bottom d-lg-block">
                <p class="text-center fw-bold text-white">&copy; 2022 SMS | All Right Reserved.</p>
            </div>

        </div>
    </div>

    <script src="../js/script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap");

        .success-container {
            width: 50%;
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #bdc3c7;
            font-weight: bold;
            font-family: "Poppins", sans-serif;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Student | Payment | Success</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/studentStyle.css" />
    <link rel="stylesheet" href="../css/alertify.min.css" />
    <link rel="icon" href="../Resources/icon.png" />
</head>

<body>
    <div class="success-container">
        <?php
        if (isset($_GET["amount"]) && !empty($_GET["amount"])) {
        ?>

            <div class="container-fluid vh-100 d-flex justify-content-center py-5">
                <div class="row align-content-center mt-5">
                    <div class="container py-5 h-100 mt-5">

                        <div class="row justify-content-center align-items-center mb-3 mt-5 align-items-lg-center mt-5">
                            <div class="col-10 col-lg-10 mt-5">
                                <div class="card shadow-2-strong card-registration border-3 border-dark bg-dark mt-5" style="border-radius: 15px;">

                                    <div class="card-body p-4">
                                        <h2 class="mb-2 text-center text-white">Success...!</h2>

                                        <div class="row">

                                            <div class="col-12 mt-1">
                                                <p class="text-white text-center fs-5 ">Your Transaction has been Successfully Completed</p>
                                            </div>

                                            <div class="col-12 mt-5 col-lg-6 d-grid mt-4 d-flex container-fluid align-content-center">
                                                <a href="../Student/index.php" class="btn btn-primary col-12">Return to Sign-In</a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 fixed-bottom d-lg-block mt-5">
                        <p class="text-center fw-bold text-primary">&copy; 2022 SMS | All Right Reserved.</p>
                    </div>

                </div>
            </div>

        <?php
        }
        ?>
    </div>
</body>

</html>
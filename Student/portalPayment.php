<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "../connection.php"
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS | Student | Payment</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/studentStyle.css" />
    <link rel="stylesheet" href="../css/alertify.min.css" />
    <link rel="icon" href="../Resources/icon.png" />

</head>

<body>

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-6 mx-auto">
                        <!-- general form elements -->
                        <div class="card card-primary mt-5">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Portal Payment</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body col-12">
                                <div class="row d-flex container-fluid justify-content-center align-content-center">

                                    <form autocomplete="off" action="../stripe/checkout-charge.php" method="POST">

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">First Name</label>
                                            <input type="text" class="form-control" placeholder="Name" id="name" name="c_name" required value="<?php echo $_SESSION["portal"]["fname"] . " " . $_SESSION["portal"]["lname"] ?>" disabled />
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">Mobile</label>
                                            <input type="number" class="form-control" id="ph" name="phone" pattern="\d{10}" maxlength="10" required value="<?php echo $_SESSION["portal"]["mobile"] ?>" disabled />
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">Description</label>
                                            <input type="text" class="form-control" name="product_name" value="Portal Pyment" disabled required />
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="exampleInputFirstName">Price</label>
                                            <input type="text" class="form-control" name="price" value="3000" disabled required />
                                        </div>

                                        <input type="hidden" name="amount" value="3000" />
                                        <input type="hidden" name="product_name" value="Portal Pyment" />

                                        <br>

                                        <div class="form-group col-12 text-center">
                                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button text-center" data-key="pk_test_51LUtaCLtfP1Lafvh8p1kssA6WnpXQ7ej4Stwz5cZvpojQp55xQQWjWToyXjR2671EYcXb4Uov6dDJaf341mjLHkt00R1Tiwte2" data-amount=<?php echo str_replace(",", "", 3000) * 100 ?> data-name="Portal Payment" data-description="Portal Payment" data-currency="lkr" data-locale="auto">
                                            </script>
                                        </div>


                                    </form>

                                </div>
                            </div>
                            <!-- /.card-body -->


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script>
        $('#ph').on('keypress', function() {
            var text = $(this).val().length;
            if (text > 10) {
                return false;
            } else {
                $('#ph').text($(this).val());
            }

        });
    </script>

    <script src="../js/script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

</body>

</html>
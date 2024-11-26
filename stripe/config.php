<?php
    require_once "stripe-php-master/init.php";

    $stripeDetails = array(
        "secretKey" => "YOUR_SECRET_KEY",
        "publishableKey" => "YOUR_PUBLISHABLE_KEY"
    );

    \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>

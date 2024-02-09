<?php
session_start();
include("./config.php");
include "../connection.php";

$token = $_POST["stripeToken"];
$contact_name = $_SESSION["student"]["fname"] . " " . $_SESSION["student"]["lname"];
$token_card_type = $_POST["stripeTokenType"];
$phone           = $_SESSION["student"]["mobile"];
$email           = $_POST["stripeEmail"];
$amount          = $_POST["amount"];
$desc            = $_POST["product_name"];
$charge = \Stripe\Charge::create([
  "amount" => str_replace(",", "", $amount) * 100,
  "currency" => 'lkr',
  "description" => $desc,
  "source" => $token,
]);

if ($charge) {

  if ($desc == "Annual Pyment") {

    Database::iud("UPDATE `student` SET `annul_payment_status_id` = '1' WHERE `id` = '" . $_SESSION["student"]["id"] . "' ");

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice` (`student_id`,`details`,`price`,`date_time`)
    VALUES ('".$_SESSION["student"]["id"]."','Annual Payment','4000','".$date."') ");

  } else {

    Database::iud("UPDATE `student` SET `enrollment_fee_status_id` = '1' WHERE `id` = '" . $_SESSION["portal"]["id"] . "' ");
  
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `invoice` (`student_id`,`details`,`price`,`date_time`)
    VALUES ('".$_SESSION["student"]["id"]."','Portal Payment','3000','".$date."') ");

  }

  header("Location:success.php?amount=$amount");
}

<?php
session_start();
include("../dboperation.php");

$obj = new dboperation;
$cus_id        = $_SESSION['customer_id'];
$total_price   = $_SESSION['total_amount'];
$total_coin    = $_SESSION['total_coin'];
$total_quantity= $_SESSION['total_quantity'];
$order_date    = date('Y-m-d');

if(isset($_POST['coin'])) {
    $wallet_result = $obj->executequery("SELECT coin FROM tbl_wallet WHERE customer_id='$cus_id'");
    $wallet = mysqli_fetch_assoc($wallet_result);

    if($wallet['coin'] >= $total_coin){
        $payment_type = 'E-coin';
        $amount = 0; 
        $coin   = $total_coin;

        $new_coin = $wallet['coin'] - $coin;
        $obj->executequery("UPDATE tbl_wallet SET coin='$new_coin' WHERE customer_id='$cus_id'");
    } else {
        echo "<script>alert('Wallet does not have enough coins. Please pay using Card.'); window.location='payment.php';</script>";
        exit;
    }
} else {
    $payment_type = 'Card';
    $amount = $total_price;
    $coin   = 0;
}
if (!isset($_POST['order_id']) || empty($_POST['order_id'])) {
    die("<script>alert('A critical error occurred: Order ID was not found. Please try again.'); window.location='cart.php';</script>");
}
$order_id = $_POST['order_id'];

$sql = "INSERT INTO tbl_payment (order_id, total_amount, total_coin, payment_date, status) 
        VALUES ('$order_id', '$amount', '$coin', '$order_date', '$payment_type')";
$obj->executequery($sql);

$obj->executequery("UPDATE tbl_orders SET status='Paid' WHERE order_id='$order_id'");

$order_details = $obj->executequery("SELECT product_id, quantity FROM tbl_order_details WHERE order_id='$order_id'");
while($row = mysqli_fetch_assoc($order_details)){
    $pid = $row['product_id'];
    $qty = $row['quantity'];

    $update_sql = "UPDATE tbl_product 
                   SET product_stock = product_stock - $qty 
                   WHERE product_id='$pid'";

    $update_result = $obj->executequery($update_sql);

    if(!$update_result){
        echo "<script>alert('Stock update failed for product ID: $pid');</script>";
    }
}

echo "<script>alert('Payment successful! Stock updated.'); window.location='success.php';</script>";
?>
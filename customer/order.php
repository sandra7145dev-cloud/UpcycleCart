<?php
include("../dboperation.php");
session_start();

$obj = new dboperation;

if(isset($_POST['order'])) {
    $cus_id         = $_SESSION['customer_id'];
    $total_quantity = $_POST['total_quantity'];
    $total_price    = $_POST['total_price'];
    $total_coin     = $_POST['total_coin'];
    $order_date     = date('Y-m-d');
    $status         = "Ordered";

    $sql = "INSERT INTO tbl_orders 
            (customer_id, total_amount, total_coin, total_quantity, ordered_date, status) 
            VALUES ('$cus_id','$total_price','$total_coin','$total_quantity','$order_date','$status')";
    $res = $obj->executequery($sql);



    if($res){
        $order_id = mysqli_insert_id($obj->con);

        $cart_sql = "SELECT product_id, quantity FROM tbl_cart WHERE customer_id='$cus_id'";
        $cart_result = $obj->executequery($cart_sql);

        while($row = mysqli_fetch_assoc($cart_result)){
            $pid  = $row['product_id'];
            $qty  = $row['quantity'];

            $prod_sql = "SELECT product_price, product_coin FROM tbl_product WHERE product_id='$pid'";
            $prod_res = $obj->executequery($prod_sql);
            $prod = mysqli_fetch_assoc($prod_res);

            $price = $prod['product_price'];
            $coin  = $prod['product_coin'];

            $detail_sql = "INSERT INTO tbl_order_details (order_id, product_id, quantity,price,coin)
                           VALUES ('$order_id','$pid','$qty','$price','$coin')";
            $obj->executequery($detail_sql);
        }

        $obj->executequery("DELETE FROM tbl_cart WHERE customer_id='$cus_id'");

        $_SESSION['total_amount']   = $total_price;
        $_SESSION['total_coin']     = $total_coin;
        $_SESSION['total_quantity'] = $total_quantity;


        $_SESSION['current_order_id'] = $order_id;

        echo "<script>
                alert('Order placed successfully');
                window.location='payment.php';
              </script>";
    } else {
        echo "<script>
                alert('Failed to place order');
                window.location='cart.php';
              </script>";
    }
}
?>
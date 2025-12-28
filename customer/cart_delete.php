<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();

if (isset($_GET["cart_id"])) {
    
    $cid = $_GET["cart_id"];
    $cus_id = $_SESSION["customer_id"];
    //     var_dump($_POST);
// exit;

    $sql = "DELETE FROM tbl_cart WHERE cart_id='$cid'";
    $result = $obj->executequery($sql);
    if ($result == 1) {

        echo "<script>alert('Removed from cart'); window.location='cart.php'</script>";

    }else
{
      echo "<script>alert('Failed to remove'); window.location='cart.php'</script>";

    }
}
$error = mysqli_error($obj->con);
echo "$error";
?>
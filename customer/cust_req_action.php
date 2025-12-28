<?php
session_start();
include_once("../dboperation.php");
$obj = new dboperation();

if (isset($_POST["request"])) {
    $cid = $_POST["category_id"];
    $id = $_POST["subcategory_id"];
    $quantity = $_POST["quantity"];
    $cus_id = $_SESSION["customer_id"];
    $date = date("Y-m-d");
    $date1 = date("Y-m-d");
    $status = "pending";

    $sql = "INSERT into tbl_request (customer_id,subcategory_id,item_quantity,`status`,coin,request_date,collector_id,category_id,collection_date)values('$cus_id','$id','$quantity','$status','0','$date','0','$cid','$date1')";
    $result = $obj->executequery($sql);
    if ($result == 1) {

        echo "<script>alert('Request Submitted'); window.location='customer_request.php?category_id=$cid'</script>";

    }
}
// $error = mysqli_error($obj->con);
// echo "$error";
?>
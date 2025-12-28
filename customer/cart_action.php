<?php
include("../dboperation.php");
session_start();
$obj = new dboperation;

if (isset($_POST["cart"])){
    $id = $_POST["product_id"];
    $cus_id=$_SESSION["customer_id"];
    $q = $_POST["qty"];

   
    
        $sql1 = "INSERT INTO tbl_cart (product_id,customer_id,quantity) values($id,$cus_id,$q)";
        $sql1res = $obj->executequery($sql1);

        

        if ($sql1res) {
            echo "<script>alert('Added to cart'); window.location='cart.php'</script>";

        } else {
            echo "<script>alert('Failed'); window.location='store.php'</script>";
        }
    
}
?>
<?php
include("../dboperation.php");

$obj = new dboperation;

if (isset($_GET["request_id"])) {
    $id = $_GET["request_id"];
    $cid = $_GET["customer_id"];


    $sql1 = "UPDATE tbl_request SET status='Accepted' WHERE request_id='$id'";
    $sql1res = $obj->executequery($sql1);

    if ($sql1res) {
        echo "<script>alert('request Accepted'); window.location='index.php'</script>";
    } else {
        echo "<script>alert('Failed to Accept'); window.location='index.php'</script>";
    }

}
?>
<?php
include("../dboperation.php");

$obj = new dboperation;

if (isset($_GET["request_id"])) {
    $id = $_GET["request_id"];
    $sql = "SELECT collection_date FROM tbl_request where request_id='$id'";
    $result=$obj->executequery($sql);
    $row = mysqli_fetch_array($result);
    $collection_date = $row['collection_date'];
    $afterdays = date("Y-m-d", strtotime($collection_date . " +1 days"));

    $sql1 = "UPDATE tbl_request SET status='Assigned',collection_date='$afterdays' WHERE request_id='$id'";
    $sql1res = $obj->executequery($sql1);

    if ($sql1res) {
        echo "<script>alert('Rescheduled Succesfullly'); window.location='index.php.#3'</script>";
    } else {
        echo "<script>alert('Failed'); window.location='index.php.#3'</script>";
    }

}
?>
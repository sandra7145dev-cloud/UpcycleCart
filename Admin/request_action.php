<?php
include("../dboperation.php");

$obj = new dboperation;

if (isset($_GET["request_id"]) && isset($_GET["ward_id"])) {
    $id = $_GET["request_id"];
    $ward = $_GET["ward_id"]; // ✅ Corrected to use GET

    // Fetch collector based on ward_id
    $sql = "SELECT * FROM tbl_item_collector WHERE ward_id='$ward'";
    $res = $obj->executequery($sql);
    $date =date("Y-m-d");
    $afterdays = date("Y-m-d", strtotime($date . " +5 days"));  

    
    if ($res && mysqli_num_rows($res) > 0) {
        $display = mysqli_fetch_array($res);
        $coll = $display["collector_id"];


        // Update collector_id in tbl_request
        $sql1 = "UPDATE tbl_request SET collector_id='$coll',collection_date='$afterdays',status='Assigned' WHERE request_id='$id'";
        $sql1res = $obj->executequery($sql1);

        if ($sql1res) {
            echo "<script>alert('Collector assigned successfully'); window.location='request_view.php'</script>";
        } else {
            echo "<script>alert('Failed to assign collector'); window.location='request_view.php'</script>";
        }
    } else {
        echo "<script>alert('No collector found for the selected ward'); window.location='request_view.php'</script>";
    }
} else {
    echo "<script>alert('Missing request_id or ward_id'); window.location='request_view.php'</script>";
}
?>
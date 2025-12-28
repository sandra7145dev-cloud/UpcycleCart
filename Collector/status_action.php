<?php
include("../dboperation.php");
$obj = new dboperation();

if (isset($_GET["request_id"])) {
    $id = $_GET["request_id"];
    $cus_id = $_GET['customer_id'];

    $s = "SELECT r.item_quantity, s.coin 
          FROM tbl_request r 
          INNER JOIN tbl_subcategory s 
            ON s.subcategory_id = r.subcategory_id 
          WHERE r.request_id = '$id'";
    $r = $obj->executequery($s);
    $display = mysqli_fetch_array($r);

    if ($display) {
        $quantity = $display['item_quantity'];
        $c        = $display['coin'];
        $earned   = $quantity * $c; 

        $sql1 = "UPDATE tbl_request 
                 SET status='Collected', coin='$earned' 
                 WHERE request_id='$id'";
        $sql1res = $obj->executequery($sql1);

        if ($sql1res) {
            $updateWallet = "UPDATE tbl_wallet 
                             SET coin = coin + $earned 
                             WHERE customer_id='$cus_id'";
            $obj->executequery($updateWallet);

            echo "<script>alert('Collected Successfully'); window.location='index.php#3'</script>";
        } else {
            echo "<script>alert('Failed to update request'); window.location='index.php#3'</script>";
        }
    } else {
        echo "<script>alert('Request not found'); window.location='index.php#3'</script>";
    }
}
?>
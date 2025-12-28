<?php 
session_start();
include_once("../dboperation.php");
$obj = new dboperation();
$id = $_SESSION["collector_id"];
$cid=$_GET['customer_id'];

include("header.php");
$sql2 = "SELECT c.customer_id, c.name, r.request_id,
                r.status, r.collection_date, r.item_quantity,
                w.ward_name, ca.category_name, s.subcategory_name, 
                c.address, w.ward_id
         FROM tbl_request r 
         INNER JOIN tbl_customer c ON c.customer_id = r.customer_id 
         INNER JOIN tbl_ward w ON c.ward_id = w.ward_id 
         INNER JOIN tbl_subcategory s ON r.subcategory_id = s.subcategory_id 
         INNER JOIN tbl_category ca ON r.category_id = ca.category_id 
         WHERE   r.collector_id='$id' AND r.customer_id='$cid'";
$result2 = $obj->executequery($sql2);
$s=1;
?>
<div class="slides">
<div class="slide" id="3">
    <div class="content second-content">
        <div class="container-fluid">

            <table class="table table-hover bg-primary">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">name</th>
                        <th scope="col">Subcategory</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Collection date</th>
                        <th scope="col">Action</th>

                    </tr>
                </thead>
                <?php while($display=mysqli_fetch_array($result2)){ 
                    if ($display['status'] == 'Assigned' || $display['status'] == 'Rescheduled') {
?>


                <tbody>
                    <tr>
                        <th scope="row"><?php echo $s++ ?></th>
                        <td><?php echo $display['name'] ;?></td>
                        <td><?php echo $display['subcategory_name'] ;?></td>
                        <td><?php echo $display['category_name'] ;?></td>
                        <td><?php echo $display['item_quantity'] ;?></td>
                        <td><?php echo $display['collection_date'] ;?></td>
                        <td><a href="pickup_action.php?request_id=<?php echo $display["request_id"]; ?>&customer_id=<?php echo $display["customer_id"]; ?>"
                                       class="btn btn-primary" onclick="return confirm('Are you Sure?')">Accept</a></td>
                    </tr>
                    
                </tbody>
                <?php } } ?>>
            </table>
        </div>
    </div>
</div>
</div>
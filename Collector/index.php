<?php
session_start();
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();
$id = $_SESSION["collector_id"];

$sql = "SELECT * FROM tbl_item_collector WHERE collector_id='$id'";
$result = $obj->executequery($sql);

$sql1 = "SELECT * FROM tbl_item_collector c 
         INNER JOIN tbl_ward w ON c.ward_id=w.ward_id 
         WHERE c.collector_id='$id'";
$result1 = $obj->executequery($sql1);

$sql2 = "SELECT c.customer_id, c.name, r.request_id,
                r.status, r.collection_date, r.item_quantity,
                w.ward_name, ca.category_name, s.subcategory_name, 
                c.address, w.ward_id
         FROM tbl_request r 
         INNER JOIN tbl_customer c ON c.customer_id = r.customer_id 
         INNER JOIN tbl_ward w ON c.ward_id = w.ward_id 
         INNER JOIN tbl_subcategory s ON r.subcategory_id = s.subcategory_id 
         INNER JOIN tbl_category ca ON r.category_id = ca.category_id 
         WHERE r.status IN ('Assigned','Accepted') 
         AND r.collector_id='$id'";
$result2 = $obj->executequery($sql2);

$collectors = [];
while ($row = mysqli_fetch_assoc($result2)) {
    $collectors[] = $row;
}

$uniqueCustomers = [];
foreach ($collectors as $collector) {
    $uniqueCustomers[$collector['customer_id']] = $collector;
}

$totalCustomers = count($uniqueCustomers);
?>

<div class="slides">
    <!-- Slide 1 -->
    <div class="slide" id="1">
        <div class="content first-content">
            <div class="container-fluid">
                <div class="col-md-3">
                    <div class="author-image"><img src="img/author_image.png" alt=""></div>
                </div>
                <?php while ($display = mysqli_fetch_array($result)) { ?>
                    <div class="col-md-9">
                        <h2><?php echo $display["collector_name"] ?></h2>
                    <?php }
                while ($row = mysqli_fetch_array($result1)) { ?>
                        <p><em>Welcome Back..</em></p>
                        <p><em>Item Collector</em></p>
                        <p><em>Ward Name: <?php echo $row["ward_name"]; ?></em></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Slide 2: Show unique customers -->
    <div class="slide" id="2">
        <div class="content second-content">
            <div class="container-fluid">

                <?php if (count($collectors) > 0) { ?>

                    <div class="text-center mb-4">
                        <b>
                            <em style="color: #e6e9e7ff; font-size: 1.5rem; font-weight: 700;">
                                Total Assigned Customers: <?php echo $totalCustomers; ?>
                            </em>
                        </b>
                    </div>

                    <?php
                    $shown = []; 
                    foreach ($collectors as $collector) {
                        if (!in_array($collector["customer_id"], $shown)) {
                            $shown[] = $collector["customer_id"];
                            ?>
                            <div class="stylish-box text-center fs-5 fw-bold"
                                style="margin: 15px auto; width: 350px; padding: 15px; border: 1px solid #ccc; border-radius: 12px; box-shadow: 0px 2px 6px rgba(0,0,0,0.15);">

                                <!-- Customer name as link -->
                                <div>
                                    <a
                                        href="request.php?request_id=<?php echo $collector['request_id']; ?>&customer_id=<?php echo $collector['customer_id']; ?>"

                                    style="text-decoration:none; color:#007bff;">
                                    <em
                                        style=" font-size: 1.5rem; font-weight: 700;"><?php echo $collector["name"]; ?></em>
                                    </a>
                                    <input type="hidden" name="customer_id" value="<?php echo $collector['customer_id'] ?>">
                                </div>
                                <br>

                                <!-- Accept button -->
                                <!-- <a href="pickup_action.php?request_id=<?php echo $collector["request_id"]; ?>"
                           class="btn btn-primary btn-sm"
                           onclick="return confirm('Accept Request?')">Accept</a> -->
                            </div>
                        <?php }
                    } ?>

                <?php } else { ?>
                    <p class="text-center"><em>No assigned requests</em></p>
                <?php } ?>

            </div>
        </div>
    </div>

    <!-- Slide 3: Accepted requests -->
    <div class="slide" id="3">
        <div class="content second-content">
            <div class="container-fluid">
                <?php
                $hasAccepted = false;
                foreach ($collectors as $collector) {
                    if ($collector['status'] == 'Accepted') {
                        $hasAccepted = true; ?>
                        <div class="stylish-box text-lg">
                            <div class="light-grey-box p-3">
                                <div><b>Customer Name: <?php echo $collector["name"]; ?></b></div><br>
                                <div><b>Address: <?php echo $collector["address"]; ?></b></div><br>
                                <div><b>Ward Name: <?php echo $collector["ward_name"]; ?></b></div><br>
                                <div><b>Category: <?php echo $collector["category_name"]; ?></b></div><br>
                                <div><b>Subcategory: <?php echo $collector["subcategory_name"]; ?></b></div><br>
                                <div><b>Quantity: <?php echo $collector["item_quantity"]; ?></b></div><br>
                                <div><b>Collection Date: <?php echo $collector["collection_date"]; ?></b></div><br>
                                <div>
                                    <a href="status_action.php?request_id=<?php echo $collector["request_id"]; ?>&customer_id=<?php echo $collector["customer_id"]; ?>"
                                        class="btn btn-primary" onclick="return confirm('Are you Sure?')">Collected</a>
                                    <a href="notstatus_action.php?request_id=<?php echo $collector["request_id"]; ?>&ward_id=<?php echo $collector["ward_id"]; ?>"
                                        class="btn btn-danger" onclick="return confirm('Are you Sure?')">Not Collected</a>
                                </div>
                            </div>
                            <br>
                        </div>
                    <?php }
                } ?>

                <?php if (!$hasAccepted) { ?>
                    <p class="text-center"><em>No accepted requests</em></p>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>
<?php
session_start();
include("../dboperation.php");
$obj = new dboperation();

// ==========================
// Handle Export to Excel
// ==========================
if(isset($_POST['export_excel'])){
    $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
    $end_date   = isset($_POST['end_date']) ? $_POST['end_date'] : '';

    $filename = "orders_report_" . date('Y-m-d') . ".csv";
    
    header("Content-Description: File Transfer");
    header("Content-Type: application/csv");
    header("Content-Disposition: attachment; filename={$filename}");
    header("Pragma: no-cache");
    header("Expires: 0");

    $output = fopen("php://output", "w");
    fputcsv($output, ['Sl. No', 'Customer Name', 'Total Quantity', 'Ordered Date', 'Status', 'Product Name', 'Quantity', 'Price', 'Coins']);

    $sql_export = "SELECT o.order_id, c.name, o.total_quantity, o.ordered_date, o.status
                   FROM tbl_orders o
                   INNER JOIN tbl_customer c ON o.customer_id = c.customer_id";
    if($start_date && $end_date){
        $sql_export .= " WHERE o.ordered_date BETWEEN '$start_date' AND '$end_date'";
    }
    $sql_export .= " ORDER BY o.order_id DESC";
    
    $res_export = $obj->executequery($sql_export);
    $s = 1;
    if($res_export && mysqli_num_rows($res_export) > 0){
        while($row = mysqli_fetch_assoc($res_export)){
            $orderId = $row['order_id'];
            $prod_sql = "SELECT p.product_name, d.quantity, d.price, d.coin 
                         FROM tbl_order_details d
                         INNER JOIN tbl_product p ON d.product_id = p.product_id
                         WHERE d.order_id = '$orderId'";
            $prod_res = $obj->executequery($prod_sql);
            
            if($prod_res && mysqli_num_rows($prod_res) > 0){
                while($prod = mysqli_fetch_assoc($prod_res)){
                    fputcsv($output, [$s, $row['name'], $row['total_quantity'], $row['ordered_date'], $row['status'], $prod['product_name'], $prod['quantity'], $prod['price'], $prod['coin']]);
                }
            } else {
                fputcsv($output, [$s, $row['name'], $row['total_quantity'], $row['ordered_date'], $row['status'], 'N/A', 'N/A', 'N/A', 'N/A']);
            }
            $s++;
        }
    }
    fclose($output);
    exit();
}

// ==========================
// Fetch Orders for Table
// ==========================
$start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
$end_date   = isset($_POST['end_date']) ? $_POST['end_date'] : '';

$sql = "SELECT o.order_id, c.name, o.total_amount, o.total_coin, o.total_quantity, o.ordered_date, o.status
        FROM tbl_orders o
        INNER JOIN tbl_customer c ON o.customer_id = c.customer_id";
if($start_date && $end_date){
    $sql .= " WHERE o.ordered_date BETWEEN '$start_date' AND '$end_date'";
}
$sql .= " ORDER BY o.order_id DESC";
$result = $obj->executequery($sql);

include("header.php");
?>

<div class="container" style="padding-top:50px; max-width:1200px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="card-title text-success fw-bold mb-4 text-center">Orders Report</h3>

            <form method="POST" class="p-3 mb-4 border rounded-3 bg-light-subtle">
                <div class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label for="start_date" class="form-label fw-bold">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="<?php echo $start_date; ?>">
                    </div>
                    <div class="col-md-4">
                        <label for="end_date" class="form-label fw-bold">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="<?php echo $end_date; ?>">
                    </div>
                    <div class="col-md-4 d-flex gap-2">
                        <button type="submit" class="btn btn-gradient-primary w-100">Generate</button>
                        <button type="submit" name="export_excel" class="btn btn-gradient-success w-100">Export</button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="text-white" style="background: linear-gradient(135deg, #43a047, #66bb6a);">
                        <tr>
                            <th>Sl. No</th>
                            <th>Customer Name</th>
                            <th>Total Quantity</th>
                            <th>Ordered Date</th>
                            <th>Status</th>
                            <th>Products</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    if($result && mysqli_num_rows($result) > 0){
                        $s=1;
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>
                                    <td>$s</td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['total_quantity']}</td>
                                    <td>".date("d-m-Y", strtotime($row['ordered_date']))."</td>
                                    <td>{$row['status']}</td>
                                    <td>
                                        <button class='btn btn-sm btn-gradient-primary' data-bs-toggle='collapse' data-bs-target='#products{$row['order_id']}'>
                                            View Details
                                        </button>
                                    </td>
                                  </tr>";
                            $s++;

                            // Fetch products for this order
                            $orderId = $row['order_id'];
                            $prod_sql = "SELECT p.product_name, d.quantity, d.price, d.coin 
                                         FROM tbl_order_details d
                                         INNER JOIN tbl_product p ON d.product_id = p.product_id
                                         WHERE d.order_id = '$orderId'";
                            $prod_res = $obj->executequery($prod_sql);

                            echo "<tr class='collapse' id='products{$row['order_id']}'>
                                    <td colspan='6' class='p-3 bg-light'>
                                        <table class='table table-sm table-bordered mb-0'>
                                            <thead class='table-secondary'>
                                                <tr>
                                                    <th>Product Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Coins</th>
                                                </tr>
                                            </thead>
                                            <tbody>";
                            if($prod_res && mysqli_num_rows($prod_res) > 0){
                                while($prod = mysqli_fetch_assoc($prod_res)){
                                    echo "<tr>
                                            <td>{$prod['product_name']}</td>
                                            <td>{$prod['quantity']}</td>
                                            <td>{$prod['price']}</td>
                                            <td>{$prod['coin']}</td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' class='text-center'>No products found for this order.</td></tr>";
                            }
                            echo "        </tbody>
                                        </table>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6' class='text-center p-4'>No orders found for the selected date range.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Card Hover Effect */
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    /* Table Hover Effects */
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(198, 239, 206, 0.3);
    }
    table.table-hover>tbody>tr:hover:not(.collapse) {
        background-color: rgba(134, 211, 140, 0.4);
    }
    /* Gradient Buttons */
    .btn-gradient-primary {
        background: linear-gradient(135deg, #43a047, #66bb6a);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-gradient-primary:hover {
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        transform: scale(1.05);
        color: #fff;
    }
    .btn-gradient-success {
        background: linear-gradient(135deg, #1b5e20, #388e3c);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-gradient-success:hover {
        background: linear-gradient(135deg, #003300, #1b5e20);
        transform: scale(1.05);
        color: #fff;
    }
</style>

<?php include("footer.php"); ?>
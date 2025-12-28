<?php
session_start();
include("../dboperation.php");
include("header.php");

$obj = new dboperation();

// Fetch all orders with customer name
$sql = "SELECT o.order_id, o.customer_id, c.name AS customer_name, 
               o.total_amount, o.total_coin, o.total_quantity, 
               o.ordered_date, o.status
        FROM tbl_orders o
        INNER JOIN tbl_customer c ON o.customer_id = c.customer_id
        ORDER BY o.order_id DESC";

$result = $obj->executequery($sql);
?>

<div class="container" style="padding-top:50px; max-width:1200px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="card-title text-success fw-bold mb-4 text-center">All Orders</h3>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="text-white" style="background: linear-gradient(135deg, #43a047, #66bb6a);">
                        <tr>
                            <th>SL.No</th>
                            <th>Customer Name</th>
                            <th>Total Quantity</th>
                            <th>Ordered Date</th>
                            <th>Status</th>
                            <th>Products</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$i}</td>
                                        <td>{$row['customer_name']}</td>
                                        <td>{$row['total_quantity']}</td>
                                        <td>" . date("d-m-Y", strtotime($row['ordered_date'])) . "</td>
                                        <td>{$row['status']}</td>
                                        <td>
                                            <button class='btn btn-gradient-primary btn-sm' data-bs-toggle='collapse' data-bs-target='#products{$row['order_id']}'>
                                                View Products
                                            </button>
                                        </td>
                                      </tr>";
                                $i++;

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
                                if ($prod_res && mysqli_num_rows($prod_res) > 0) {
                                    while ($prod = mysqli_fetch_assoc($prod_res)) {
                                        echo "<tr>
                                                <td>{$prod['product_name']}</td>
                                                <td>{$prod['quantity']}</td>
                                                <td>{$prod['price']}</td>
                                                <td>{$prod['coin']}</td>
                                              </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>No products found for this order</td></tr>";
                                }
                                echo "        </tbody>
                                            </table>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center p-4'>No orders found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
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
        border-radius: 0.35rem;
        border: none;
    }

    .btn-gradient-primary:hover {
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        transform: scale(1.05);
        color: #fff;
    }

    /* Card Hover Effect */
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
</style>

<?php include("footer.php"); ?>
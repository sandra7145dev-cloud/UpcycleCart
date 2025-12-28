<?php
session_start();
include("../dboperation.php");
include("header.php");

$obj = new dboperation();

$sql = "SELECT c.name, p.total_amount, p.total_coin, p.status, p.payment_date
        FROM tbl_payment p
        INNER JOIN tbl_orders o ON p.order_id = o.order_id
        INNER JOIN tbl_customer c ON o.customer_id = c.customer_id
        ORDER BY p.payment_id DESC";

$result = $obj->executequery($sql);
?>

<div class="container" style="padding-top:50px; max-width:1200px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="card-title text-success fw-bold mb-4 text-center">All Payments</h3>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="text-white" style="background: linear-gradient(135deg, #43a047, #66bb6a);">
                        <tr>
                            <th>Sl.No</th>
                            <th>Customer Name</th>
                            <th>Total Price</th>
                            <th>Total Coin</th>
                            <th>Payment Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            $s = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$s}</td>
                                        <td>{$row['name']}</td>
                                        <td>₹{$row['total_amount']}</td>
                                        <td>{$row['total_coin']}</td>
                                        <td>" . date("d-m-Y, g:i a", strtotime($row['payment_date'])) . "</td>
                                        <td><span class='badge bg-success rounded-pill'>{$row['status']}</span></td>
                                      </tr>";
                                $s++;
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center p-4'>No payment records found</td></tr>";
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

    table.table-hover tbody tr:hover {
        background-color: rgba(134, 211, 140, 0.4);
    }

    /* Card Hover Effect */
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    /* Badge styling */
    .badge {
        padding: 0.5em 0.9em;
        font-size: 0.85rem;
        font-weight: 600;
    }
</style>

<?php include("footer.php"); ?>
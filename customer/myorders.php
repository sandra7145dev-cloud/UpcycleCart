<?php
include("header.php");
$id = $_SESSION["customer_id"];

$sql = "SELECT d.order_id, d.quantity, d.price, d.coin, p.product_name, p.product_image, o.ordered_date, o.status 
        FROM tbl_order_details d 
        INNER JOIN tbl_orders o ON d.order_id = o.order_id 
        INNER JOIN tbl_product p ON d.product_id = p.product_id 
        WHERE o.customer_id=$id";
        
$result = $obj->executequery($sql);
?>

<style>
body {
    background: #f4fff5;
    font-family: 'Open Sans', sans-serif;
    overflow-x: hidden;
}

.main-content {
    padding-top: 80px; 
    padding-bottom: 40px;
}

h4 {
    color: #2d6a4f;
    font-weight: 700;
    text-align: center;
    margin-bottom: 40px;
    letter-spacing: 1px;
}

.card {
    border: none;
    border-radius: 15px;
    background: linear-gradient(135deg, #d8f3dc, #b7e4c7);
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 128, 0, 0.2);
}

.card img {
    border-radius: 15px 0 0 15px;
}

.card-title {
    color: #1b4332;
    font-weight: 700;
    font-size: 1.3rem;
    margin-bottom: 10px;
}

.card-text {
    color: #2d6a4f;
    font-weight: 500;
    margin-bottom: 8px;
}

.status {
    display: inline-block;
    padding: 5px 14px;
    border-radius: 20px;
    font-weight: 600;
    text-transform: capitalize;
    font-size: 0.9rem;
}

.status.Pending {
    background: #fff3cd;
    color: #856404;
}

.status.Completed {
    background: #d1e7dd;
    color: #0f5132;
}

.status.Cancelled {
    background: #f8d7da;
    color: #842029;
}

.coin-text {
    font-weight: 600;
    color: #40916c;
    margin-top: 8px;
}

@media (max-width: 768px) {
    .card img {
        border-radius: 15px 15px 0 0;
        height: 200px;
    }
}
</style>

<div class="container main-content">
    <h4><i class="fa fa-box me-2 text-success"></i>Your Ordered Items</h4>
    
    <?php while($display = mysqli_fetch_array($result)) { ?>
    <div class="card mb-4 shadow-sm">
        <div class="row g-0 align-items-center">
            <div class="col-md-3">
                <img src="../Uploads/<?php echo $display['product_image']; ?>" 
                     class="img-fluid rounded-start" 
                     alt="<?php echo $display['product_name']; ?>" 
                     style="height: 180px; object-fit: cover; width: 100%;">
            </div>
            <div class="col-md-9">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $display['product_name']; ?></h5>
                    <p class="card-text mb-1"><strong>Quantity:</strong> <?php echo $display['quantity']; ?></p>
                    <p class="card-text mb-1"><strong>Price:</strong> ₹<?php echo $display['price']; ?></p>
                    <p class="card-text mb-1 coin-text"><i class="fa-solid fa-coins text-warning me-1"></i> Coin Value: <?php echo $display['coin']; ?> coins</p>
                    <p class="card-text mb-1"><strong>Order Date:</strong> <?php echo date("d-m-Y", strtotime($display['ordered_date'])); ?></p>
                    <p class="card-text mb-0">
                        <strong>Status:</strong> 
                        <span class="status <?php echo ucfirst($display['status']); ?>">
                            <?php echo $display['status']; ?>
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
</div>

<?php
include("footer.php");
?>
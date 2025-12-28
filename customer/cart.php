<?php
include('header.php');

$cus_id = $_SESSION['customer_id']; 
$sql = "SELECT * FROM tbl_cart c 
        INNER JOIN tbl_product p ON c.product_id = p.product_id 
        WHERE customer_id='$cus_id'";
$result = $obj->executequery($sql);

$total_quantity = 0;
$total_price = 0;
$total_coin = 0;

$sql2 = "SELECT * FROM  tbl_customer c
         INNER JOIN tbl_ward w on c.ward_id=w.ward_id 
         WHERE customer_id='$cus_id'";
$result2 = $obj->executequery($sql2);
$display2 = mysqli_fetch_array($result2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Upcycle Cart - My Cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #e6f9e6;
            font-family: 'Open Sans', sans-serif;
            padding-top: 0px; 
        }

        .card {
            border: none;
            border-radius: 12px;
            transition: all 0.3s ease;
        }
        .card:hover {
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }

        .img-fluid {
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .img-fluid:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .quantity {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 6px;
            overflow: hidden;
        }
        .quantity input {
            width: 50px;
            text-align: center;
            border: none;
            font-weight: 600;
        }
        .quantity button {
            width: 30px;
            height: 30px;
            background-color: #2f6e2f;
            color: white;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .quantity button:hover {
            background-color: #4caf50;
        }

        .coin-balance {
            display: inline-flex;
            align-items: center;
            background: #fff9e6;
            border-radius: 30px;
            padding: 6px 14px;
            font-weight: 600;
            font-size: 15px;
            color: #d48806;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 8px;
        }
        .coin-balance i {
            color: gold;
            margin-right: 6px;
        }

        .btn-outline-danger {
            transition: all 0.3s ease;
        }
        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-success {
            background: linear-gradient(135deg,#2f6e2f,#4caf50);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-success:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(47, 110, 47, 0.4);
        }

        .summary-card {
            background: linear-gradient(135deg, #ffffff, #d9ffe0);
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .summary-card h5 {
            color: #2f6e2f;
        }
        .summary-card hr {
            border-top: 2px dashed #2f6e2f;
        }
        .summary-card .coin-balance {
            justify-content: space-between;
            width: 100%;
        }

        @media (max-width: 768px) {
            .summary-card.position-sticky {
                position: static !important;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>

<form action="order.php" method="POST">
    <div class="container my-5">
        <div class="row">

            <div class="col-lg-8">
                <?php while ($display = mysqli_fetch_array($result)) {
                    $quantity = $display['quantity'];
                    $price = $display['product_price'] * $quantity;
                    $coin = $display['product_coin'] * $quantity;

                    $total_quantity += $quantity;
                    $total_price += $price;
                    $total_coin += $coin;
                    ?>
                    <div class="card shadow-sm p-4 mb-3">
                        <div class="row g-3 align-items-center">

                            <div class="col-md-3">
                                <img src="../uploads/<?php echo $display['product_image']; ?>" alt="Product" class="img-fluid">
                            </div>

                            <div class="col-md-6">
                                <h5 class="mb-1 fw-bold"><?php echo $display['product_name']; ?></h5>
                                <p class="text-muted small mb-1"><?php echo $display['brand'] ?? 'Brand Name'; ?></p>
                                <h6 class="text-success mb-2">₹ <?php echo $display['product_price']; ?></h6>
                                <div class="coin-balance">
                                    <i class="fas fa-bolt"></i>
                                    <?php echo $display['product_coin']; ?> E-coins
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="text-muted small">
                                        <i class="bi bi-cash-coin text-success"></i> COD available
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-3 text-end">
                                <div class="quantity mx-auto mb-2" style="max-width: 120px;">
                                    <button type="button" disabled>−</button>
                                    <input type="text" value="<?php echo $quantity ?>" readonly>
                                    <button type="button" disabled>+</button>
                                </div>
                                <input type="hidden" name="product_id[]" value="<?php echo $display['product_id']; ?>">
                                <input type="hidden" name="quantity[]" value="<?php echo $quantity; ?>">
                                <input type="hidden" name="price[]" value="<?php echo $price; ?>">
                                <input type="hidden" name="coin[]" value="<?php echo $coin; ?>">
                                <a href="cart_delete.php?cart_id=<?php echo $display['cart_id'] ?>" class="btn btn-outline-danger btn-sm" title="Remove Item"><i class="bi bi-trash"></i></a>
                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>

            <div class="col-lg-4">
                <div class="summary-card mb-4">
                    <h5 class="fw-bold mb-3">Deliver To</h5>
                    <p class="mb-1 fw-bold"><?php echo $display2["name"] ?></p>
                    <p class="mb-1 text-muted"><?php echo $display2["address"] ?></p>
                    <p class="mb-1 text-muted"><?php echo $display2["ward_name"] ?></p>
                    <p class="mb-0 text-muted"><?php echo $display2["phone_no"] ?></p>
                </div>

                <div class="summary-card position-sticky" style="top: 100px;">
                    <h5 class="fw-bold mb-3">Price Details</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Price (<?php echo $total_quantity ?> items)</span>
                        <span>₹ <?php echo $total_price ?></span>
                    </div>
                    <div class="coin-balance mb-2">
                        <span>Total E-coins</span>
                        <div>
                           <i class="fas fa-bolt text-warning"></i>
                           <span class="fw-bold"><?php echo $total_coin ?></span>
                        </div>
                    </div>
                    <hr>
                    <div class="fw-bold mb-3">
                        <div class="d-flex justify-content-between">
                            <span>Total Amount</span>
                            <span>₹ <?php echo $total_price ?></span>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span>Total E-coins</span>
                            <span>
                                <i class="fas fa-bolt text-warning"></i>
                                <?php echo $total_coin ?>
                            </span>
                        </div>
                    </div>

                    <input type="hidden" name="total_quantity" value="<?php echo $total_quantity; ?>">
                    <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                    <input type="hidden" name="total_coin" value="<?php echo $total_coin; ?>">

                    <button class="btn btn-success w-100 py-2" name="order">Place Order</button>
                </div>
            </div>

        </div>
    </div>
</form>

</body>
</html>
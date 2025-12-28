<?php
include('header.php');
$sql = "SELECT * FROM tbl_cart c 
       inner join tbl_product p 
       on c.product_id=p.product_id 
       where customer_id='$cus_id'";
$result = $obj->executequery($sql);

$sql2 = "SELECT * FROM  tbl_customer c
INNER JOIN tbl_ward w on c.ward_id=w.ward_id 
       where customer_id='$cus_id'";
$result2 = $obj->executequery($sql2);
$display2 = mysqli_fetch_array($result2);




$total = 0;
$total_price = 0;
$total_coin = 0;
$error = mysqli_error($obj->con);
echo "$error";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House - Tea Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    
    
        <style>
            body {
                background-color: #a9eba3ff;
                
            }
        </style>
</head>

<body>
    

    <!-- <form action="cart_action.php" method="POST"> -->
    <div class="container my-5">
        <div class="row">

            <!-- LEFT SIDE: Products -->
            <div class="col-md-8">
                <?php while ($display = mysqli_fetch_array($result)) {
                    $total += $display['quantity'];
                    $total_price += $display['product_price'] * $display['quantity'];
                    $total_coin += $display['product_coin'] * $display['quantity'];
                    ?>
                    <div class="card shadow-sm p-4 mb-3 border rounded">
                        <div class="row g-3 align-items-center">

                            <!-- Product Image -->
                            <div class="col-md-3">
                                <a href="addtocart.php?product_id=<?php echo $display['product_id']; ?>">
                                    <img src="../uploads/<?php echo $display['product_image']; ?>" alt="Product"
                                        class="img-fluid rounded" style="height:200px; width:200px; object-fit:cover;">
                                </a>
                            </div>

                            <!-- Product Details -->
                            <div class="col-md-6">
                                <h5 class="mb-1 fw-bold"><?php echo $display['product_name']; ?></h5>
                                <p class="text-muted small mb-1"><?php echo $display['brand'] ?? 'Brand Name'; ?></p>
                                <h6 class="text-success mb-2">₹ <?php echo $display['product_price']; ?></h6>
                                <div class="coin-balance mb-3">
                                    <i class="fa-solid fa-bolt text-warning"></i>
                                    <span class="fw-bold"><?php echo $display['product_coin']; ?> E-coins</span>
                                </div>

                                <!-- Quantity Box -->
                                <div class="d-flex align-items-center">
                                    <span class="fw-bold me-2">Qty:</span>
                                    <span class="border rounded bg-light px-3 py-1 fw-bold">
                                        <?php echo $display['quantity'] ?>
                                    </span>
                                </div>
                            </div>

                            <!-- Delete / Action -->
                            <div class="col-md-3 text-end">
                                <input type="hidden" name="product_id" value="<?php echo $display['product_id']; ?>">
                                <a href="cart_delete.php?cart_id=<?php echo $display['cart_id'] ?>;"
                                    class="btn btn-outline-danger btn-sm" style="height:40px;width:60px"><i
                                        class="bi bi-trash"></i></a>

                            </div>

                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- RIGHT SIDE: Price Details -->
            <div class="col-md-4">
                <div id="myydiv" class="card shadow-sm p-4 border rounded mb-3 " style="margin-top:- 80px;">
                    <h5 class="fw-bold mb-3">Deliver To...</h5>
                    <hr>
                    <div class="d-flex flex-column mb-2">
                        <p class="mb-2"><?php echo $display2["name"] ?></p>
                        <p class="mb-2"><?php echo $display2["address"] ?></p>
                        <p class="mb-2"><?php echo $display2["ward_name"] ?></p>
                        <p class="mb-2"><?php echo $display2["phone_no"] ?></p>
                    </div>

                    <!-- <div class="d-flex justify-content-between mb-2">
                            <span>Delivery Charges</span>
                            <span class="text-success">Free</span>
                        </div> -->
                    <div class="fw-bold mb-3">

                    </div>
                </div>

                <div id="myydiv2" class="card shadow-sm p-4 border rounded " style="margin-top: -10px;">
                    <h5 class="fw-bold mb-3">Price Details</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Price (<?php echo $total ?>)</span>
                        <span>₹ <?php echo $total_price ?></span>
                    </div>
                    <div class="coin-balance d-flex justify-content-between mb-2">
                        <span>E-coins</span>
                        <i class="fa-solid fa-bolt text-warning"
                            style="font-size: 16px;margin-left:280px;margin-bottom:20px"></i>
                        <span class="fw-bold"><?php echo $total_coin ?></span>
                    </div>

                    
                    <hr>
                    <div class="fw-bold mb-3">
                        <!-- Total Amount -->
                        <div class="d-flex justify-content-between">
                            <span>Total Amount</span>
                            <span>₹ <?php echo $total_price ?></span>
                        </div>

                        <!-- Total Coins -->
                        <div class="d-flex justify-content-between mt-2">
                            <span>Total E-coins</span>
                            <span>
                                <i class="fa-solid fa-bolt text-warning"></i>
                                <?php echo $total_coin ?>
                            </span>
                        </div>
                    </div>
                    <button class="btn btn-success w-100">Place Order</button>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- </form> -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>


   

    <!-- quantitybox -->
    <script>
        function increase() {
            let qty = document.getElementById("qty");
            qty.value = parseInt(qty.value) + 1;
        }

        function decrease() {
            let qty = document.getElementById("qty");
            if (parseInt(qty.value) > 1) {
                qty.value = parseInt(qty.value) - 1;
            }
        }
    </script>
</body>

</html>
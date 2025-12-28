<?php
include('header.php');

$sql = "select * from tbl_product";
$result = $obj->executequery($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Upcycle Cart - Our Store</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <style>
        body { background-color: #f8f6f1; font-family: 'Open Sans', sans-serif; }
        .page-header { background: linear-gradient(120deg, #f3eac2, #c9e4c5); border-bottom: 2px solid #a7c957; }
        .page-header h1 { font-family: 'Playfair Display', serif; color: #3b3b3b !important; text-shadow: 1px 1px 2px #c0c0c0; }
        .store-item { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(10px); border-radius: 25px; overflow: hidden; transition: all 0.4s ease; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); }
        .store-item:hover { transform: translateY(-10px); box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15); }
        .store-item img { border-bottom: 3px solid #a7c957; transition: transform 0.4s ease; }
        .store-item:hover img { transform: scale(1.05); }
        .store-item h4 { font-family: 'Playfair Display', serif; font-weight: 700; color: #333; }
        .store-item p { font-size: 15px; color: #666; min-height: 60px; }
        .store-item .text-primary { color: #a7c957 !important; font-weight: 600; }
        .store-item .text-secondary { color: #ff7b54 !important; }
        .coin-balance { font-size: 14px; color: #d4a017; font-weight: 600; }
        .store-overlay { position: absolute; bottom: 20px; left: 0; right: 0; opacity: 0; transition: opacity 0.3s ease-in-out; }
        .store-item:hover .store-overlay { opacity: 1; }
        .btn-dark { background: linear-gradient(135deg, #4a6741, #2e4830); border: none; font-weight: 500; transition: 0.3s; }
        .btn-dark:hover { background: linear-gradient(135deg, #5f8258, #3c5e42); transform: scale(1.05); }
        .btn-primary { background: linear-gradient(135deg, #a7c957, #6a994e); border: none; }
        .btn-primary:hover { background: linear-gradient(135deg, #8cbf5f, #527a3e); }
        .section-title p { font-size: 18px; color: #7a7a7a; }
        .footer { background: #2c2c2c !important; color: #ccc; }
        .footer h4 { color: #a7c957 !important; }
        .footer a:hover { color: #a7c957 !important; }
    </style>
</head>

<body>
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-2 text-dark mb-4 animated slideInDown">Our Products</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item text-dark" aria-current="page">Store</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Explore Our Finest Collection</p>
            </div>
            
            <form action="payment.php" method="POST">
                <div class="row g-4 mt-4">
                    <?php while ($display = mysqli_fetch_array($result)) { ?>
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="store-item position-relative text-center p-3">
                                <img class="img-fluid" style="height:300px;width:100%;border-radius:20px"
                                     src="../uploads/<?php echo $display['product_image']; ?>" alt="Product Image">

                                <div class="p-3">
                                    <div class="text-center mb-3">
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                        <small class="fa fa-star text-primary"></small>
                                    </div>

                                    <h4><?php echo $display['product_name']; ?></h4>
                                    <p><?php echo $display['description']; ?></p> 
                                    <h4 class="text-primary">₹<?php echo $display['product_price']; ?> /-</h4>
                                    <div class="coin-balance">
                                        <i class="fa fa-bolt"></i> <?php echo $display['product_coin']; ?> Coins
                                    </div>
                                    <h5 class="text-secondary mt-2">
                                        <?php
                                        if($display['product_stock'] <= 0) {
                                            echo '<span style="color:red;font-weight:bold;">Out of Stock</span>';
                                        } else {
                                            echo $display['product_stock'] . ' Left in Stock';
                                        }
                                        ?>
                                    </h5>
                                </div>

                                <input type="hidden" name="total_quantity" value="1">
                                <input type="hidden" name="total_price" value="<?php echo $display['product_price']; ?>">
                                <input type="hidden" name="total_coin" value="<?php echo $display['product_coin']; ?>">


                                <?php if($display['product_stock'] > 0) { ?> 
                                    <div class="store-overlay">
                                        <a href="addtocart.php?product_id=<?php echo $display["product_id"]; ?>"
                                           class="btn btn-dark rounded-pill py-2 px-4 m-2 shadow" name="cart">Add to Cart <i
                                                class="fa fa-cart-plus ms-2"></i></a>
                                    </div>
                                <?php } else { ?>
                                    <div class="store-overlay">
                                        <button class="btn btn-secondary rounded-pill py-2 px-4 m-2 shadow" disabled>Out of Stock </button>
                                    </div>
                                <?php } ?>
                            </div> </div> <?php } ?>
                </div> </form>

            
        </div>
    </div>
    
    <?php include_once('footer.php'); ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
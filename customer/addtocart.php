<?php
include('header.php');
$pid = $_GET["product_id"];
$sql = "SELECT * FROM tbl_product p where product_id='$pid'";
$result = $obj->executequery($sql);

$sql2="SELECT quantity FROM tbl_cart WHERE product_id='$pid' AND customer_id='$cus_id'";
$result2 = $obj->executequery($sql2);
$default_qun=1;
if(mysqli_num_rows($result2)>0){
    $cartitem=mysqli_fetch_assoc($result2);
    $default_qun=$cartitem['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Upcycle Cart - Product Details</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

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
        body {
            background-color: #e6f9e6;
            font-family: 'Open Sans', sans-serif;
        }

        .border.rounded.p-4.shadow-sm.bg-light {
            background: linear-gradient(135deg, #ffffff, #d9ffe0);
            border: none;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .border.rounded.p-4.shadow-sm.bg-light:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.25);
        }

        .display-6 {
            font-weight: 700;
            color: #2f6e2f;
        }

        .text-success {
            font-weight: 600;
            font-size: 1.5rem;
        }

        .fs-5.fw-medium.fst-italic.text-primary {
            color: #155724;
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
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .coin-balance:hover {
            background: #fff4cc;
        }

        .coin-balance i {
            color: gold;
            font-size: 1.2em;
            margin-right: 6px;
        }

        .quantity {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 6px;
            overflow: hidden;
        }

        .quantity input {
            border: none;
            width: 50px;
            text-align: center;
            font-weight: 600;
            font-size: 1rem;
        }

        .quantity button {
            background-color: #2f6e2f;
            color: white;
            border: none;
            width: 30px;
            height: 30px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .quantity button:hover {
            background-color: #4caf50;
        }

        .btn-dark {
            background: linear-gradient(135deg, #2f6e2f, #4caf50);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-dark:hover {
            background: linear-gradient(135deg, #4caf50, #2f6e2f);
            transform: scale(1.05);
        }

        .img-fluid {
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .img-fluid:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .footer {
            background: linear-gradient(135deg, #2f6e2f, #4caf50);
            color: #fff;
        }

        .footer a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer a:hover {
            color: #d9ffcc;
        }

        .back-to-top {
            background: #2f6e2f !important;
            border: none;
            transition: all 0.3s ease;
        }

        .back-to-top:hover {
            background: #4caf50 !important;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<form action="cart_action.php" method="POST">
    <?php while ($display = mysqli_fetch_array($result)) { ?>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 justify-content-center align-items-center">
                    <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                        <div class="border rounded p-3 shadow-sm bg-white">
                            <img class="img-fluid" src="../uploads/<?php echo $display['product_image']; ?>" alt="Product Image" style="height:500px;width:100%;object-fit:cover;">
                        </div>
                    </div>

                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                        <div class="border rounded p-4 shadow-sm bg-light">
                            <p class="fs-5 fw-medium fst-italic text-primary">Featured Product</p>
                            <h1 class="display-6"><?php echo $display['product_name']; ?></h1>
                            <h4 class="text-success">₹ <?php echo $display['product_price']; ?>/-</h4>
                            <h5 class="my-2">OR</h5>
                            <div class="coin-balance mb-3">
                                <i class="fa-solid fa-bolt"></i><?php echo $display['product_coin']; ?> E-coins
                            </div>

                            <div class="d-flex align-items-center mb-3">
                                <label for="qty" class="me-3 fw-bold">Quantity:</label>
                                <div class="quantity">
                                    <button type="button" onclick="decrease()">−</button>
                                    <input type="text" id="qty" value="<?php echo $default_qun; ?>" name="qty">
                                    <button type="button" onclick="increase()">+</button>
                                </div>
                            </div>

                            <input type="hidden" name="product_id" value="<?php echo $display['product_id']; ?>">
                            <button type="submit" name="cart" class="btn btn-dark rounded-pill py-2 px-4 m-2">
                                Add to Cart <i class="fa fa-cart-plus ms-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</form>

<div class="container-fluid footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Our Office</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                <div class="d-flex pt-3">
                    <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-square btn-primary rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Quick Links</h4>
                <a class="btn btn-link text-white" href="">About Us</a>
                <a class="btn btn-link text-white" href="">Contact Us</a>
                <a class="btn btn-link text-white" href="">Our Services</a>
                <a class="btn btn-link text-white" href="">Terms & Condition</a>
                <a class="btn btn-link text-white" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Business Hours</h4>
                <p class="mb-1">Monday - Friday</p>
                <h6 class="text-light">09:00 am - 07:00 pm</h6>
                <p class="mb-1">Saturday</p>
                <h6 class="text-light">09:00 am - 12:00 pm</h6>
                <p class="mb-1">Sunday</p>
                <h6 class="text-light">Closed</h6>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-light mb-4">Newsletter</h4>
                <p>Subscribe to get the latest updates!</p>
                <div class="position-relative w-100">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                    <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                &copy; <a class="fw-medium" href="#">Upcycle Cart</a>, All Right Reserved.
            </div>
            <div class="col-md-6 text-center text-md-end">
                Designed By <a class="fw-medium" href="https://htmlcodex.com">HTML Codex</a>
            </div>
        </div>
    </div>
</div>
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<script src="js/main.js"></script>

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
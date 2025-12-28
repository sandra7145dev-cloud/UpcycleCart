<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["customer_id"])) {
    echo "<script>
        alert('Please login first');
        window.location.href = '../Guest/login.php';
    </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<?php 
include_once("../dboperation.php");
$obj = new dboperation();
$cus_id = $_SESSION["customer_id"];

$sql = "select name from tbl_customer where customer_id='$cus_id'";
$result = $obj->executequery($sql);
$name = '';

if ($result !== false) {
    while($n=mysqli_fetch_array($result))
    {
        $name=$n['name'];
    }
}

$sql1 = "select * from tbl_wallet where customer_id='$cus_id'";
$result1 = $obj->executequery($sql1);
?>
<head>
    <meta charset="utf-8">
    <title>Upcycle cart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="index/img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <link href="index/lib/animate/animate.min.css" rel="stylesheet">
    <link href="index/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="index/css/bootstrap.min.css" rel="stylesheet">

    <link href="index/css/style.css" rel="stylesheet">

    <style>
        .sticky-top {
            background: linear-gradient(90deg, #c2e59c, #64b3f4) !important; 
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
        }

        .navbar {
            transition: all 0.3s ease-in-out;
            background-color: transparent !important;
        }

        .navbar:hover {
            background: linear-gradient(90deg, #b4df9d, #7dc9ff) !important;
        }
        
        .navbar-nav-group .nav-link {
            font-weight: 600;
            letter-spacing: 0.5px;
            color: #2c2c2c !important; 
            margin: 0 10px;
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar-nav-group .nav-link:hover {
            color: #155724 !important;
        }

        .navbar-nav-group .nav-link::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            left: 50%;
            bottom: 0;
            background-color: #155724;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav-group .nav-link:hover::after {
            width: 70%;
        }

        .dropdown-menu {
            border-radius: 10px;
            border: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            animation: dropdownFade 0.3s ease;
        }

        @keyframes dropdownFade {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .dropdown-item {
            font-weight: 500;
            color: #333;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background-color: #e0f3d8;
            color: #155724;
        }

        .btn-light.text-success.fw-semibold {
            background: linear-gradient(90deg, #7bc67e, #40916c) !important;
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
            color: #fff !important; 
        }
        
        .btn-light.text-success.fw-semibold:hover {
            background: linear-gradient(90deg, #52b788, #2d6a4f) !important;
            transform: scale(1.05);
        }

        .coin-balance {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            padding: 6px 14px;
            font-weight: 600;
            font-size: 15px;
            color: #155724;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            margin-top: 0 !important; 
        }

        .coin-balance:hover {
            background: rgba(255, 255, 255, 0.5);
        }

        .coin-balance i {
            color: gold;
            font-size: 1.1em;
            margin-right: 6px;
            margin-top: 0 !important; 
        }
        
        .navbar-icons .nav-link {
            font-size: 1.1rem; 
            padding: 8px;
            margin-right: 15px; 
            color: #2c2c2c !important; 
            transition: color 0.3s;
        }

        .navbar-icons .nav-link:hover {
            color: #155724 !important;
        }

        .navbar-nav-group .nav-link.active {
            color: #155724 !important;
            font-weight: 700;
        }

        .navbar-light .navbar-brand img {
            border: 3px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>

<body>
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg py-2 navbar-light"> 
                <a href="index.php" class="navbar-brand d-flex align-items-center">
                    <img class="img-fluid" src="index/img/logo.jpg" alt="Logo" style="border-radius:50px; width:80px; height:80px;margin-top: -40px;">
                    <span class="ms-2 fw-bold text-dark" style="font-size:1.6rem; letter-spacing:1px;margin-top: -45px;">Upcycle Cart</span>
                </a>

                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
                    <div class="d-flex align-items-center navbar-nav-group"> 
                        
                        <ul class="navbar-nav mb-2 mb-lg-0 flex-row">
                            <li class="nav-item"><a href="index.php" class="nav-link fw-semibold active">HOME</a></li>
                            <li class="nav-item"><a href="#about" class="nav-link fw-semibold">ABOUT</a></li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle fw-semibold" href="#" id="donationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    PICKUP
                                </a>
                                <ul class="dropdown-menu shadow-sm border-0">
                                    <li><a class="dropdown-item" href="index.php#category">REQUEST</a></li>
                                    <li><a class="dropdown-item" href="request_status.php">STATUS</a></li>
                                </ul>
                            </li>
                            
                            <li class="nav-item"><a href="store.php" class="nav-link fw-semibold">STORE</a></li>
                        </ul>
                        
                        <a href="cart.php" class="nav-link fw-semibold navbar-icons"><i class="fa fa-shopping-cart text-warning"></i></a>

                        <?php 
                        if ($result1 !== false && mysqli_num_rows($result1) > 0) { 
                            $display = mysqli_fetch_array($result1);
                        ?>
                            <div class="coin-balance me-3">
                                <i class="fa-solid fa-bolt me-1"></i><?php echo $display['coin']; ?>
                            </div>
                        <?php } ?>

                        <div class="dropdown">
                            <button class="btn btn-light text-success fw-semibold dropdown-toggle px-3" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i><?php echo $name ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                <li><a class="dropdown-item" href="myorders.php"><i class="fas fa-box me-2 text-success"></i>My Orders</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="../logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    </body>
</html>
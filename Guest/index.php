<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>UpcycleCart</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="index/img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="index/lib/animate/animate.min.css" rel="stylesheet">
    <link href="index/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="index/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="index/css/style.css" rel="stylesheet">

    <style>
        .sticky-top {
            background: linear-gradient(90deg, #a8e063, #56ab2f);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            border-bottom: 2px solid rgba(255, 255, 255, 0.25);
        }

        .navbar {
            transition: all 0.3s ease-in-out;
        }

        .navbar:hover {
            background: linear-gradient(90deg, #b2f37b, #6bbe4d);
        }

        .navbar-nav .nav-link {
            font-weight: 600;
            letter-spacing: 0.5px;
            margin: 0 12px;
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #1a3c20 !important;
        }

        .navbar-nav .nav-link::after {
            content: "";
            position: absolute;
            width: 0%;
            height: 2px;
            left: 50%;
            bottom: 0;
            background-color: #1a3c20;
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }

        .navbar-nav .nav-link:hover::after {
            width: 70%;
        }

        .btn-outline-success {
            background: linear-gradient(90deg, #56ab2f, #a8e063);
            border: none;
            font-weight: 600;
            color: #fff !important;
            border-radius: 25px;
            padding: 8px 18px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .btn-outline-success:hover {
            background: linear-gradient(90deg, #76c893, #4e944f);
            transform: translateY(-2px) scale(1.05);
            color: #fff !important;
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.3);
        }

        .navbar-nav .nav-link.active {
            color: #1a3c20 !important;
            font-weight: 700;
        }

        .navbar-light .navbar-brand img {
            border: 3px solid #ffffff;
            border-radius: 50px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }

        .navbar-light .navbar-brand img:hover {
            transform: rotate(-3deg) scale(1.05);
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.4);
        }
        
        .navbar-toggler {
            border: none;
            outline: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgb(86,171,47)' stroke-width='3' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
    </style>
</head>

<body>
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light py-2">
                <a href="index.php" class="navbar-brand">
                    <img class="img-fluid" src="index/img/logo.jpg" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto align-items-center">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="#about" class="nav-item nav-link">About</a>
                        <a href="login.php" class="nav-item nav-link">Pickup</a>
                        <a href="login.php" class="nav-item nav-link">Store</a>
                        <a href="#contact" class="nav-item nav-link">Contact</a>
                        <a href="login.php" class="btn btn-outline-success ms-3">
                            <i class="fas fa-user me-1"></i> Login / Signup
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid px-0 mb-5">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="index/img/hbg3.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Recycle Today, Live Brighter Tomorrow</h1>
                                    <a href="#about" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="index/img/bg2.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7 text-center">
                                    <h1 class="display-1 text-dark mb-4 animated zoomIn">Recycle Today, Live Brighter Tomorrow</h1>
                                    <a href="#about" class="btn btn-light rounded-pill py-3 px-5 animated zoomIn">Explore More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row g-3">
                        <div class="col-6 text-end">
                            <img class="img-fluid bg-white w-100 mb-3 wow fadeIn" data-wow-delay="0.1s" src="index/img/a6.jpg" style="height: 375px;" alt="">
                            <img class="img-fluid bg-white w-50 wow fadeIn" data-wow-delay="0.2s" src="index/img/a7.jpg" style="height: 190px;" alt="">
                        </div>
                        <div class="col-6">
                            <img class="img-fluid bg-white w-50 mb-3 wow fadeIn" data-wow-delay="0.3s" src="index/img/a3.jpg" style="height: 190px;" alt="">
                            <img class="img-fluid bg-white w-100 wow fadeIn" data-wow-delay="0.4s" src="index/img/a2.jpg" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="section-title">
                        <p class="fs-5 fw-medium fst-italic text-primary">About Us</p>
                        <h1 class="display-6">The Remarkable Journey of UpcycleCart Over 5 Years</h1>
                    </div>
                    <div class="row g-3 mb-4">
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="index/img/a1.jpg" alt="">
                        </div>
                        <div class="col-sm-8">
                            <h5>Celebrating 5 years of impact in recycling awareness</h5>
                            <p class="mb-0">Our initiative has consistently encouraged sustainable living through responsible recycling. Over the years, we have empowered communities to embrace eco-conscious habits.</p>
                        </div>
                    </div>
                    <div class="border-top mb-4"></div>
                    <div class="row g-3">
                        <div class="col-sm-8">
                            <h5>Leading the way in recycled product innovation and sales</h5>
                            <p class="mb-0">We take pride in offering high-quality goods crafted from recycled materials. Our store has become a trusted platform for promoting ethical, zero-waste consumer choices.</p>
                        </div>
                        <div class="col-sm-4">
                            <img class="img-fluid bg-white w-100" src="index/img/a4.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl contact py-5" id="contact">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-medium fst-italic text-primary">Contact Us</p>
                <h1 class="display-6">Contact us right now</h1>
            </div>
            <div class="row justify-content-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-8">
                    <p class="text-center mb-5">At UpcycleCart, we believe that sustainable change begins at the community level.
                        Our platform is designed to help municipalities, residents, and item collectors work together toward a cleaner and greener environment.

                        If you have questions about recycling schedules, pickup requests, or eco-store purchases, we’re here to assist you. We also welcome feedback and suggestions from residents and local bodies to improve our municipal recycling initiatives.</p>
                    <div class="row g-5">
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-envelope fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">upcyclecart.thodupuzha@gmail.com</p>
                            <p class="mb-0">support.upcyclecart@gmail.com</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-phone fa-2x text-white"></i>
                            </div>
                            <p class="mb-2">+91 75025 09667</p>
                            <p class="mb-2">+91 98765 43210</p>
                        </div>
                        <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                            <div class="btn-square mx-auto mb-3">
                                <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                            </div>
                            <p class="mb-0">UpcycleCart Support Desk, Thodupuzha Municipality Office</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>
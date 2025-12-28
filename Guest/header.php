<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tea House</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="index/img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <link href="index/lib/animate/animate.min.css" rel="stylesheet">
    <link href="index/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <link href="index/css/bootstrap.min.css" rel="stylesheet">

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
            <nav class="navbar navbar-expand-lg navbar-light  py-2">
                <a href="index.php" class="navbar-brand">
                    <img class="img-fluid" src="index/img/logo.jpg" alt="Logo">
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto align-items-center">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
                        <a href="index.php#about" class="nav-item nav-link">About</a>
                        <a href="login.php" class="nav-item nav-link">Pickup</a>
                        <a href="login.php" class="nav-item nav-link">Store</a>
                        <a href="index.php#3" class="nav-item nav-link">Contact</a>

                        <a href="login.php" class="btn btn-outline-success ms-3">
                            <i class="fas fa-user me-1"></i> Login / Signup
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    </body>

</html>
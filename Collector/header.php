<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$currentPage = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION["collector_id"]) && $currentPage != 'login.php') {
    header("Location: ../Guest/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Moonlight CSS Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/fontAwesome.css">
    <link rel="stylesheet" href="css/light-box.css">
    <link rel="stylesheet" href="css/templatemo-main.css">
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    <style>
        .light-grey-box {
            background-color: #6cec45ff;
            padding: 20px;
            border-radius: 10px;
            border: 1px solid #e0e0e0;
        }

        .stylish-box {
            background: linear-gradient(135deg, #f9fafb, #f3f4f6);
            border-radius: 16px;
            padding: 24px;
            margin: 20px auto;
            max-width: 700px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid rgba(229, 231, 235, 0.6);
            font-family: "Inter", sans-serif;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .stylish-box:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }

        .stylish-box h3 {
            margin-bottom: 12px;
            font-size: 1.4rem;
            font-weight: 600;
            color: #111827;
        }

        .stylish-box p {
            font-size: 1rem;
            color: #374151;
        }
    </style>
</head>

<body>

    <nav>
        <div class="logo">
            <img src="img/logoup.jpg" alt="Logo" style="width:125px;height: 100px;">
        </div>
        <div class="mini-logo">
            <img src="img/mini_logo.png" alt="Mini Logo">
        </div>
        <ul>
            <li><a href="#1"><i class="fa fa-home"></i> <em>Home</em></a></li>
            <li><a href="#2"><i class="fa fa-pencil"></i> <em>Pickups</em></a></li>
            <li><a href="#3"><i class="fa fa-image"></i> <em>Status</em></a></li>
            <li>
                <form action="../logout.php" method="post" style="width:30px;height:40px;">
                    <button type="submit" class="btn btn-danger" style="width:100%; text-align:left;">
                        <i class="fa fa-sign-out"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<?php
// Start session at the very top
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upcycle Cart</title>
    <link rel="shortcut icon" type="image/png" href="./assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="./assets/css/styles.min.css" />

    <style>
        /* 🌿 Body & Wrapper */
        body {
            background-color: #e8f5e9;
            font-family: 'Open Sans', sans-serif;
            color: #2e7d32;
        }

        .page-wrapper {
            background-color: #f1f8f3;
        }

        /* 🌿 Top Strip */
        .app-topstrip {
            background: linear-gradient(90deg, #4caf50, #81c784);
            color: #fff;
            border-bottom: 2px solid #2e7d32;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .app-topstrip h3 {
            font-weight: 600;
            font-style: italic;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2e7d32, #66bb6a);
            border: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1b5e20, #4caf50);
            transform: scale(1.05);
            color: #fff;
        }

        /* 🌿 Sidebar */
        .left-sidebar {
            background: linear-gradient(180deg, #4caf50, #81c784);
            color: #fff;
            border-right: 2px solid #2e7d32;
        }

        .brand-logo img {
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .sidebar-nav .sidebar-item {
            margin-bottom: 8px;
        }

        .sidebar-nav .sidebar-link {
            color: #ffffffcc;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .sidebar-nav .sidebar-link:hover {
            background: rgba(46, 125, 50, 0.2);
            border-radius: 10px;
            color: #fff;
        }

        .sidebar-nav h2 {
            font-weight: 700;
            color: #1b5e20;
            margin-top: 15px;
            margin-bottom: 5px;
            padding-left: 25px;
            font-size: 16px;
        }

        .round-16 {
            background: rgba(255, 255, 255, 0.2);
        }

        .round-16 i {
            color: #ffffff;
        }

        /* 🌿 Header */
        .app-header {
            background: linear-gradient(90deg, #81c784, #4caf50);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 10px 20px;
        }

        .app-header .navbar {
            padding: 0;
        }

        /* 🌿 Sidebar toggler */
        .close-btn i {
            color: #fff;
        }

        .close-btn:hover {
            color: #1b5e20;
        }

        /* 🌿 Scrollbar Custom */
        .scroll-sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .scroll-sidebar::-webkit-scrollbar-thumb {
            background: #2e7d32;
            border-radius: 10px;
        }

        .scroll-sidebar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

        <div class="app-topstrip py-6 px-3 w-100 d-lg-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center justify-content-center gap-5 mb-2 mb-lg-0">
                 </div>
            <div class="d-lg-flex align-items-center gap-2">
                <h3 class="text-white mb-2 mb-lg-0 fs-5 text-center">“Reimagine Waste, Embrace Sustainability”</h3>
                <div class="d-flex align-items-center justify-content-center gap-2">
                    <div class="">
                        <a class="btn btn-primary d-flex align-items-center gap-1" href="../logout.php">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <aside class="left-sidebar">
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="#" class="text-nowrap logo-img">
                        <img src="assets/images/logos/logo.jpg" style="border-radius:50px; width:80px; height:80px;">
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-6"></i>
                    </div>
                </div>

                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Menu</span>
                        </li>
                        
                        <h2>Registrations</h2>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="ward_registration.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Ward Registration</span></div>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link" href="itemcollector_reg.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Item Collector</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="category.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Add Category</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="subcategory_reg.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Add SubCategory</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="product.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Add Products</span></div>
                            </a>
                        </li>

                        <h2>View Pages</h2>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="request_view.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Request View</span></div>
                            </a>
                        </li>
                         <li class="sidebar-item">
                            <a class="sidebar-link" href="itemcollector_view.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">View Item Collectors</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="categoryview.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">View Category</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="subcategoryview.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">View SubCategory</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="productview.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">View Products</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="order_view.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Order View</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="wardview.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Ward View</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="paymentview.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Payment View</span></div>
                            </a>
                        </li>

                        <h2>Reports</h2>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="report1.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Product Order Report</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="reportbar.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Monthly Reports</span></div>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="reportpie.php">
                                <div class="d-flex align-items-center gap-3"><div class="round-16 d-flex align-items-center justify-content-center"><i class="ti ti-circle"></i></div><span class="hide-menu">Other Reports</span></div>
                            </a>
                        </li>
                    </ul>
                </nav>
                </div>
            </aside>
        <div class="body-wrapper">
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                     <ul class="navbar-nav">
                        <li class="nav-item d-block d-xl-none">
                            <a class="nav-link sidebartoggler " id="headerCollapse" href="javascript:void(0)">
                               <i class="ti ti-menu-2"></i>
                            </a>
                        </li>
                    </ul>
                </nav>
            </header>
            <div class="container-fluid"></div>
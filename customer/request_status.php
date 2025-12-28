<?php
include("header.php");
$id = $_SESSION["customer_id"];
$s=1;
$sql = "SELECT r.request_id, r.item_quantity, r.coin AS request_coin, r.request_date, 
               r.collection_date, r.status,
               c.category_name, 
               s.subcategory_name, 
               co.collector_name
        FROM tbl_request r
        INNER JOIN tbl_category c ON r.category_id = c.category_id
        INNER JOIN tbl_item_collector co ON r.collector_id = co.collector_id
        INNER JOIN tbl_subcategory s ON r.subcategory_id = s.subcategory_id
        WHERE r.customer_id='$id'";
$result=$obj->executequery($sql);

$primary_color = '#6b8e23'; 
$secondary_color = '#f0fff0'; 
$header_bg_color = '#a2c86e'; 
$text_dark = '#383e42';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            background-color: <?php echo $secondary_color; ?>; 
        }

        .status-container {
            margin-top: 100px; 
            padding: 30px;
        }

        .request-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff; 
            transition: transform 0.3s ease;
        }

        .request-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            color: <?php echo $primary_color; ?>;
            font-weight: 700;
            border-bottom: 2px solid #e0e0e0;
            padding-bottom: 10px;
        }

        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #ddd;
        }

        .request-table thead th {
            background-color: <?php echo $header_bg_color; ?>;
            color: #ffffff; 
            font-weight: 600;
            text-transform: uppercase;
            border-bottom: 1px solid #ddd !important;
        }

        .request-table tbody td {
            color: <?php echo $text_dark; ?>;
            vertical-align: middle;
            font-size: 14px;
        }

        .request-table tbody tr:nth-child(even) {
            background-color: #f7fcf5; 
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 13px;
        }
        
        .status-Pending {
            background-color: #fffacd; 
            color: #daa520; 
            border: 1px solid #daa520;
        }
        
        .status-Completed {
            background-color: #d9ead3; 
            color: #38761d; 
            border: 1px solid #38761d;
        }

        .status-Collected {
            background-color: #c9daf8; 
            color: #1c4587; 
            border: 1px solid #1c4587;
        }

    </style>
</head>
<body>

    <div class="container status-container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card request-card">
                    <div class="card-body">
                        <div class="d-md-flex align-items-center mb-4">
                            <div>
                                <h4 class="card-title">🌱 Your Donation Request Status</h4>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0 request-table align-middle">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-3">Sl.no</th>
                                        <th scope="col" class="px-3">Category</th>
                                        <th scope="col" class="px-3">Subcategory</th>
                                        <th scope="col" class="px-3">Requested Date</th>
                                        <th scope="col" class="px-3">Collection Date</th>
                                        <th scope="col" class="px-3">Collector Name</th>
                                        <th scope="col" class="px-3"><i class="fa-solid fa-bolt me-1 text-warning"></i>Coin</th>
                                        <th scope="col" class="px-3">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($result !== false) {
                                        while($display=mysqli_fetch_array($result))
                                        {
                                            $status_class = 'status-' . str_replace(' ', '', $display["status"]);
                                    ?>
                                    <tr>
                                        <td class="px-3"><?php echo $s++;?></td>
                                        <td class="px-3"><?php echo $display["category_name"];?></td>
                                        <td class="px-3"><?php echo $display["subcategory_name"];?> </td>
                                        <td class="px-3"><?php echo $display["request_date"];?></td>
                                        <td class="px-3"><?php echo $display["collection_date"];?> </td>
                                        <td class="px-3"><?php echo $display["collector_name"];?></td>
                                        <td class="px-3 fw-bold"><?php echo $display["request_coin"];?> </td>
                                        <td class="px-3">
                                            <span class="status-badge <?php echo $status_class; ?>">
                                                <?php echo $display["status"];?> 
                                            </span>
                                        </td>
                                    </tr>
                                    <?php 
                                        } 
                                    } else {
                                        echo '<tr><td colspan="8" class="text-center text-danger py-4">Error: Failed to fetch request data. Check your database tables (tbl_request, tbl_item_collector, etc.) or connection.</td></tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
</body>
</html>

<?php
include("footer.php");
?>
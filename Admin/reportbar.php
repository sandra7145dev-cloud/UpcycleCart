<?php
session_start();
include("../dboperation.php");
include("header.php");
$obj = new dboperation();

// Handle month filter from GET
$selected_month = isset($_GET['month']) ? $_GET['month'] : '';

// ============================
// Fetch data for bar chart (Gross per month)
// ============================
$chart_sql = "SELECT DATE_FORMAT(ordered_date, '%Y-%m') as month, SUM(total_amount) as gross
              FROM tbl_orders";

// Apply month filter if selected
if ($selected_month) {
    $chart_sql .= " WHERE DATE_FORMAT(ordered_date, '%Y-%m') = '$selected_month'";
}

$chart_sql .= " GROUP BY month ORDER BY month ASC";
$chart_res = $obj->executequery($chart_sql);

$months = [];
$gross = [];

if ($chart_res && mysqli_num_rows($chart_res) > 0) {
    while ($row = mysqli_fetch_assoc($chart_res)) {
        $months[] = date("M Y", strtotime($row['month'] . "-01")); // Format for display
        $gross[] = $row['gross'];
    }
}

// Fetch distinct months for dropdown
$month_list_sql = "SELECT DISTINCT DATE_FORMAT(ordered_date, '%Y-%m') as month_val, 
                  DATE_FORMAT(ordered_date, '%M %Y') as month_display 
                  FROM tbl_orders ORDER BY month_val DESC";
$month_list_res = $obj->executequery($month_list_sql);
?>

<div class="container" style="padding-top:50px; max-width:1200px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="card-title text-success fw-bold mb-4 text-center">Monthly Gross Report</h3>

            <form method="GET" class="mb-4 d-flex justify-content-center align-items-center gap-2">
                <label for="month" class="form-label fw-bold mb-0">Filter by Month:</label>
                <select name="month" id="month" class="form-select" style="width: auto;">
                    <option value="">All Months</option>
                    <?php if ($month_list_res && mysqli_num_rows($month_list_res) > 0) {
                        while ($m = mysqli_fetch_assoc($month_list_res)) {
                            $selected = ($selected_month == $m['month_val']) ? 'selected' : '';
                            echo "<option value='{$m['month_val']}' {$selected}>{$m['month_display']}</option>";
                        }
                    } ?>
                </select>
                <button type="submit" class="btn btn-gradient-primary">Filter</button>
            </form>

            <div class="chart-container" style="position: relative; height:400px;">
                <canvas id="grossChart"></canvas>
            </div>
        </div>
    </div>
</div>

<style>
    /* Card Hover Effect */
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
    /* Gradient Buttons */
    .btn-gradient-primary {
        background: linear-gradient(135deg, #43a047, #66bb6a);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-gradient-primary:hover {
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        transform: scale(1.05);
        color: #fff;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grossChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($months); ?>,
            datasets: [{
                label: 'Monthly Gross Amount (₹)',
                data: <?php echo json_encode($gross); ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.7)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                borderRadius: 5
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value, index, values) {
                            return '₹' + value.toLocaleString();
                        }
                    },
                    title: {
                        display: true,
                        text: 'Gross Amount (₹)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += '₹' + context.parsed.y.toLocaleString();
                            }
                            return label;
                        }
                    }
                }
            }
        }
    });
</script>

<?php include("footer.php"); ?>
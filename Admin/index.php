<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();

$sql_request = "SELECT status, COUNT(*) as count FROM tbl_request GROUP BY status";
$r_request = $obj->executequery($sql_request);

$request_statuses = [];
$request_counts = [];
while ($row = mysqli_fetch_assoc($r_request)) {
    $request_statuses[] = $row['status'];
    $request_counts[] = $row['count'];
}

$sql_payment = "SELECT status, COUNT(*) as count FROM tbl_payment GROUP BY status";
$r_payment = $obj->executequery($sql_payment);

$payment_statuses = [];
$payment_counts = [];
while ($row = mysqli_fetch_assoc($r_payment)) {
    $payment_statuses[] = $row['status'];
    $payment_counts[] = $row['count'];
}
?>

<div class="container" style="padding-top:50px; max-width:1200px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="card-title text-success fw-bold mb-5 text-center">Analytics Dashboard</h3>
            <div class="row text-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h5 class="text-secondary fw-bold mb-3">Requests by Status</h5>
                    <div class="chart-container" style="position: relative; height:350px;">
                         <canvas id="requestPieChart"></canvas>
                    </div>
                </div>

                <div class="col-lg-6">
                    <h5 class="text-secondary fw-bold mb-3">Payments by Status</h5>
                     <div class="chart-container" style="position: relative; height:350px;">
                        <canvas id="paymentPieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctxRequest = document.getElementById('requestPieChart').getContext('2d');
    new Chart(ctxRequest, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($request_statuses); ?>,
            datasets: [{
                data: <?php echo json_encode($request_counts); ?>,
                backgroundColor: [
                    'rgba(75, 192, 192, 0.8)',  
                    'rgba(255, 206, 86, 0.8)',  
                    'rgba(255, 99, 132, 0.8)',  
                    'rgba(54, 162, 235, 0.8)',  
                    'rgba(153, 102, 255, 0.8)',  
                    'rgba(255, 159, 64, 0.8)'    
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { 
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });

    const ctxPayment = document.getElementById('paymentPieChart').getContext('2d');
    new Chart(ctxPayment, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($payment_statuses); ?>,
            datasets: [{
                data: <?php echo json_encode($payment_counts); ?>,
                backgroundColor: [
                    'rgba(40, 167, 69, 0.8)',   
                    'rgba(255, 193, 7, 0.8)',   
                    'rgba(220, 53, 69, 0.8)'    
                ],
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14
                        }
                    }
                }
            }
        }
    });
</script>

<?php
include("footer.php");
?>
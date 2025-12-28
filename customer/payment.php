<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include("../dboperation.php");

    $quantity = $_SESSION['total_quantity'];
    $price = $_SESSION['total_amount'];
    $coin = $_SESSION['total_coin'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Payment Gateway</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
            --border-radius: 10px;
            --box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .payment-container {
            background-color: white;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            margin: 2rem auto;
            max-width: 900px;
        }

        .payment-header {
            background: var(--primary);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        .payment-body {
            padding: 2rem;
        }

        .payment-option {
            border: 2px solid #e9ecef;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .payment-option:hover {
            border-color: var(--primary);
            transform: translateY(-5px);
            box-shadow: var(--box-shadow);
        }

        .payment-option.active {
            border-color: var(--primary);
            background-color: rgba(67, 97, 238, 0.05);
        }

        .payment-icon {
            font-size: 2rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .card-input {
            border: 1px solid #ced4da;
            border-radius: 5px;
            padding: 0.75rem;
            margin-bottom: 1rem;
            transition: border-color 0.3s;
        }

        .card-input:focus {
            border-color: var(--primary);
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-group {
            flex: 1;
        }

        .qr-code {
            background: white;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 200px;
            margin: 0 auto;
        }

        .qr-code img {
            max-width: 100%;
            height: auto;
        }

        .btn-pay {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            width: 100%;
            margin-top: 1.5rem;
        }

        .btn-pay:hover {
            background: var(--secondary);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .security-note {
            text-align: center;
            margin-top: 1.5rem;
            color: #6c757d;
            font-size: 0.9rem;
        }

        .security-note i {
            color: var(--success);
            margin-right: 0.5rem;
        }

        .payment-details {
            background-color: #f8f9fa;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .coin-balance {
            background-color: gold;
            padding: 10px;
            border-radius: 8px;
            color: black;
            font-weight: bold;
        }

        .tmt {
            background-color: #4361ee;
            padding: 10px;
            border-radius: 8px;
            color: black;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .payment-body {
                padding: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
      
        <form action="paymentaction.php" method="POST">
<input type="hidden" name="order_id" value="<?php echo $_SESSION['current_order_id']; ?>">
            <div class="payment-container">
                <div class="payment-header">
                    <h2><i class="fas fa-lock me-2"></i>Secure Payment</h2>
                    <p class="mb-0">Complete your purchase securely</p>
                </div>

                <div class="payment-body">
                    <div class="payment-details">
                        <div class=" tmt d-flex justify-content-between">
                            <span>Total Amount:</span>
                            <strong><?php echo $price ?>/-</strong>
                        </div>
                        <div class="coin-balance d-flex justify-content-between">
                            <span>Total E-coins:</span>
                            <strong><?php echo $coin ?></strong>
                        </div>
                    </div>

                    <h4 class="mb-3">Select Payment Method</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="payment-option active" id="cardOption">
                                <div class="payment-icon">
                                    <i class="far fa-credit-card"></i>
                                </div>
                                <h5>Credit/Debit Card</h5>
                                <p class="text-muted">Pay with your card securely</p>

                                <div id="cardForm">
                                    <div class="mb-3">
                                        <label for="cardNumber" class="form-label">Card Number</label>
                                        <input type="text" class="form-control card-input" id="cardNumber"
                                            placeholder="1234 5678 9012 3456">
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group">
                                            <label for="expiryDate" class="form-label">Expiry Date</label>
                                            <input type="text" class="form-control card-input" id="expiryDate"
                                                placeholder="MM/YY">
                                        </div>
                                        <div class="form-group">
                                            <label for="cvv" class="form-label">CVV</label>
                                            <input type="text" class="form-control card-input" id="cvv"
                                                placeholder="123">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="cardholderName" class="form-label">Cardholder Name</label>
                                        <input type="text" class="form-control card-input" id="cardholderName"
                                            placeholder="Card Holder Name">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="payment-option " id="googlePayOption">
                                <div class="payment-icon">
                                    <i class="fab fa-solid fa-bolt"></i>
                                </div>
                                <h5 class="coin-balance">E-coin</h5>

                                <div id="googlePayForm" class="d-none">
                                    <div class="qr-code">
                                        <img src="index/img/supercoin.png" alt="Super Coin ">

                                        <strong class="mt-2 small">Pay using E-coins</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="total_price" value="<?php echo $price ?>">
                    <input type="hidden" name="total_coin" value="<?php echo $coin ?>">
                    <input type="hidden" name="quantity" value="<?php echo $quantity ?>">
                    <div style="display:flex; justify-content:center; gap:20px;">
                        <div style="width:400px">
                            <button class="btn btn-pay w-100" name="cash">
                                <i class="fas fa-lock me-2"></i>Pay Now <?php echo $price ?>/- </button>
                        </div>
                        <div style="width:400px">
                            <button class=" coin-balance btn btn-pay w-100" name="coin">
                                <i class="fas  fa-solid fa-bolt"></i>Pay Now <?php echo $coin ?>
                            </button>
                        </div>
                    </div>




                    <div class="security-note">
                        <i class="fas fa-shield-alt"></i> Your payment information is securely encrypted
                    </div>
                </div>
            </div>
    </div>


    </form>

    <!-- Bootstrap JS -->
    <script>
        document.getElementById('cardOption').addEventListener('click', function () {
            document.getElementById('cardOption').classList.add('active');
            document.getElementById('googlePayOption').classList.remove('active');
            document.getElementById('googlePayForm').classList.add('d-none');
            document.getElementById('cardForm').classList.remove('d-none');
        });

        document.getElementById('googlePayOption').addEventListener('click', function () {
            document.getElementById('googlePayOption').classList.add('active');
            document.getElementById('cardOption').classList.remove('active');
            document.getElementById('cardForm').classList.add('d-none');
            document.getElementById('googlePayForm').classList.remove('d-none');
        });

    
    </script> 
</body>

</html>
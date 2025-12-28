<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Successful</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #d4fc79 0%, #96e6a1 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .success-container {
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 12px 30px rgba(0,0,0,0.25);
            max-width: 900px;
            width: 80%;
            display: flex;
            flex-direction: row;
            overflow: hidden;
        }

        .success-left {
            background: #28a745;
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 8rem;
        }

        .success-right {
            flex: 2;
            padding: 3rem 4rem;
        }

        .success-right h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .success-right p {
            font-size: 1.2rem;
            margin-bottom: 1.2rem;
        }

        .btn-home {
            background-color: #28a745;
            color: white;
            border-radius: 50px;
            padding: 0.75rem 2.5rem;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-home:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.3);
        }

        @media (max-width: 992px) {
            .success-container {
                flex-direction: column;
                width: 90%;
            }
            .success-left {
                font-size: 6rem;
                padding: 2rem 0;
            }
            .success-right {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-left">
            <i class="fas fa-check-circle"></i>
        </div>

        <div class="success-right">
            <h1>Order Successful!</h1>
            <p>Thank you for your purchase. Your order has been placed successfully.</p>
            <p><strong>“Give, reuse, repeat: the simple cycle of a zero-waste lifestyle.”</strong></p>
            <a href="index.php" class="btn btn-home"><i class="fas fa-home me-2"></i>Go to Home</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
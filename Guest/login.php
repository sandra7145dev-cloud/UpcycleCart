<!doctype html>
<html lang="en">
    <head>

        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="login/css/style.css">
        <link href="index/css/style.css" rel="stylesheet">

        <style>
            .js-fullheight {
                background: linear-gradient(to top, #7e5e3b 0%, #46554b 100%) !important;
                height: 100vh !important;
                overflow: auto !important;
            }

            .ftco-section {
                padding-top: 100px !important; 
                padding-bottom: 50px !important; 
            }

    
            .login-wrap {
                background: none !important; 
                padding: 0 !important;
                box-shadow: none !important; 
                max-width: 400px; 
                margin: 0 auto;
            }

            .heading-section {
                color: #ffffff !important; 
                font-size: 32px; 
                margin-bottom: 30px !important; 
                text-shadow: 1px 1px 3px rgba(0,0,0,0.5); 
            }

            /* Input Fields */
            .form-group input[type="text"],
            .form-group input[type="password"] {
                width: 100% !important; 
                height: 50px !important; 
                border-radius: 25px !important; 
                border: 1px solid rgba(255, 255, 255, 0.5); 
                padding: 10px 20px !important;
                font-size: 16px;
                background-color: rgba(255, 255, 255, 0.15); 
                color: #ffffff !important; 
                margin-bottom: 20px;
            }
            
            .form-group input::placeholder {
                color: rgba(255, 255, 255, 0.7) !important; 
            }

            
            .form-group input[style] {
                all: unset !important; 
            }

            
            .field-icon {
                position: absolute;
                top: 50%;
                right: 20px; 
                transform: translateY(-100%);
                color: #ffffff; 
                cursor: pointer;
                z-index: 10;
            }

            /* LogIn Button */
            .form-group .btn {
                background: #e9c46a !important; 
                border: 1px solid #e9c46a !important;
                color: #ffffff !important;
                font-weight: 600;
                height: 50px !important;
                border-radius: 25px !important; 
                text-transform: uppercase;
                letter-spacing: 1px;
                font-size: 16px;
            }
            .form-group .btn:hover {
                background: #d4b05b !important; 
            }

            .form-group.d-md-flex {
                color: #ffffff; 
                margin-top: -10px; 
            }

            
            .text-md-right a {
                color: #ffffff !important; 
            }

            
            .checkbox-wrap {
                color: #ffffff !important;
            }

            
            .w-100.text-center {
                color: #ffffff !important;
                margin-top: 15px;
            }

            
            .social a {
                background: rgba(255, 255, 255, 0.15); 
                border: 1px solid rgba(255, 255, 255, 0.5);
                width: 50px !important;
                height: 50px !important;
                border-radius: 50% !important; 
                padding: 0 !important;
                line-height: 50px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 20px;
                color: #ffffff;
            }
            
        </style>
    </head>
    <?php
    include("header.php"); 
    ?>
    <body class="img js-fullheight">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                         <h2 class="heading-section">Login</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap"> 

                            <form action="loginaction.php" class="signin-form" method="POST">
                                <div class="form-group">
                                    <input type="text" placeholder="Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" placeholder="Password" name="password" required>
                                    <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3 " name="submit">LOG IN</button>
                                </div>
                                
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">
                                            <span style="font-size:14px;">Remember Me</span>
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    
                                </div>
                            </form>
                            
                            <p class="w-100 text-center" style="font-size:14px; margin-bottom: 10px;"> New here? Join us </p>
                            
                            <div class="social d-flex justify-content-center align-items-center text-center">
                                <a href="customerreg.php" class="px-2 py-2 mr-md-1 rounded" title="Register"><span>👤</span></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
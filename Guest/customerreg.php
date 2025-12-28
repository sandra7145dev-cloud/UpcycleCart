<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Upcycle Cart Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

        <link rel="stylesheet" href="css/style.css">

        <style>
            .wrapper {
                background-image: linear-gradient(to right bottom, #c6e4b4, #e9c46a); 
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                padding: 30px;
            }

            .wrapper .inner {
                background: rgba(139, 69, 19, 0.9); 
                padding: 40px;
                border-radius: 15px;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5); 
                max-width: 1200px;
                width: 100%;
                display: flex;
                flex-wrap: wrap; 
            }

            .wrapper .inner .image-holder {
                width: 50%;
                padding: 20px;
            }
            .wrapper .inner .image-holder img {
                border-radius: 10px;
                width: 100%;
                height: auto;
            }

            .wrapper .inner form {
                width: 50%;
                padding-left: 50px; 
            }

            .wrapper .inner h3 {
                color: #ffffff; 
                font-family: 'Poppins-Medium';
                font-size: 24px;
                margin-bottom: 25px;
                text-transform: uppercase;
                letter-spacing: 2px;
            }

            .wrapper .inner .form-wrapper input,
            .wrapper .inner .form-wrapper select {
                border: none;
                border-bottom: 2px solid rgba(255, 255, 255, 0.5); 
                background: transparent;
                color: #ffffff; 
            }
            .wrapper .inner .form-wrapper input::placeholder {
                color: rgba(255, 255, 255, 0.7); 
            }
            .wrapper .inner .form-wrapper .zmdi {
                color: #c6e4b4; 
            }
            
            
            .wrapper .inner .form-wrapper select option {
                color: #000000; 
                background: #f0f0f0; 
            }
            
            .wrapper .inner button {
                background: #50723c; 
                border: none;
                padding: 12px 25px;
                font-weight: 700;
                border-radius: 5px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            }
            .wrapper .inner button:hover {
                background: #6a9550; 
            }

            @media (max-width: 991px) {
                .wrapper .inner {
                    flex-direction: column;
                }
                .wrapper .inner .image-holder,
                .wrapper .inner form {
                    width: 100%;
                    padding-left: 0;
                }
                .wrapper .inner .image-holder {
                    margin-bottom: 30px;
                }
            }
        </style>
    </head>
<?php
include("../dboperation.php");

$obj=new dboperation;
    $sql="select ward_id,ward_name from tbl_ward ";
    $res=$obj->executequery($sql); 
?>
    <body>

        <div class="wrapper" > 
            <div class="inner">
                <div class="image-holder">
                    <img src="images/registration-form-2.png" alt="Upcycle Cart Image"> 
                </div>
                
                <form action="customer_regaction.php" method="POST">
                    <h3>Registration Form</h3>
                    
                    <div class="form-wrapper">
                        <input type="text" name="cname" placeholder="Name" class="form-control" pattern="[A-Z][a-zA-Z\s]*" title="Name must start with a capital letter and contain only letters and spaces" required>
                    </div>
                    
                    <div class="form-wrapper">
                        <input type="email" name="eadd" placeholder="Email Address" class="form-control" >
                        <i class="zmdi zmdi-email"></i>
                    </div>
                    
                    <div class="form-wrapper">
                        <input type="text" name="cnum" placeholder="Contact Number" class="form-control" required pattern="[6-9][0-9]{9}" title="Enter a valid 10-digit mobile number starting with 6,7,8, or 9">
                        <i class="zmdi zmdi-account"></i>
                    </div>
                    
                    <div class="form-wrapper">
                        <input type="text" name="add" placeholder="Address" class="form-control" required>
                        <i class="zmdi zmdi-home"></i>
                    </div>
                    
                    <div class="form-wrapper">
                        <select name="ward" id="" class="form-control">
                            <option value="">Select Ward </option>
                        <?php while ($ward= mysqli_fetch_assoc($res)) { ?>
                            <option value="<?php echo $ward['ward_id']; ?>">
                              <?php echo $ward['ward_name']; ?>
                            </option>
                             <?php } ?>
                        </select>
                        <i class="zmdi zmdi-caret-down" style="font-size: 17px"></i>
                    </div>
                    
                    <div class="form-wrapper">
                        <input type="text" name="uname" placeholder="Username" class="form-control" Required>
                    </div>
                    
                    <div class="form-wrapper">
                        <input type="password" name="pass" placeholder="Password" class="form-control" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$" 
                        title="Password must be at least 6 characters, include 1 letter, 1 number, 1 special character, and no spaces">
                        <i class="zmdi zmdi-lock"></i>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="submit">Register
                        <i class="zmdi zmdi-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
        
    </body>
</html>
<?php
include_once('header.php');
include_once("../dboperation.php");
$obj = new dboperation();
$cid = $_GET["category_id"];

$sql1 = "SELECT * from tbl_subcategory s inner join tbl_category c on s.category_id=c.category_id where s.category_id='$cid' ";
$result1 = $obj->executequery($sql1);
?>
<!-- Store Start -->
<div class="container-xxl py-5">
    <div class="container">
        <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
            <h1 class="display-6">Donate And Earn Super Coins</h1>
        </div>
        <div class="row g-4">
            <?php while ($row = mysqli_fetch_array($result1)) { ?>
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <form action="cust_req_action.php" method="POST">
                        <div class="store-item position-relative text-center">
                            <img class="rounded float-start" src="../uploads/<?php echo $row["subcategory_image"]; ?>"
                                alt="image" style="width:120px;">
                            <div class="p-4">
                                <h4 class="mb-3"><?php echo $row["subcategory_name"]; ?></h4>
                                <h4 class="text-primary"><?php echo $row["coin"]; ?> Coins</h4>
                                <input type="number" name="quantity" placeholder="Enter the qauntity">
                                <input type="hidden" name="subcategory_id" value="<?php echo $row['subcategory_id']; ?>">

                                <input type="hidden" name="category_id" value="<?php echo $row['category_id']; ?>">

                            </div>
                            <div>
                                <button class="btn btn-primary rounded-pill py-2 px-4 m-2" name="request">Submit <i
                                        class="fa fa-arrow-right ms-2"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            <?php } ?>

            
        </div>
    </div>
</div>
<!-- </form> -->
<!-- Store End -->

<!-- <?php
// include_once("footer.php");
?> -->
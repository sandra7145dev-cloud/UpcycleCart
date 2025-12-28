<?php
include('header.php');
include("../dboperation.php");

$obj = new dboperation;
$sql = "select category_id,category_name from tbl_category ";
$res = $obj->executequery($sql);
?>

<div class="container" style="padding-top:50px; max-width:700px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-5" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="mb-4 text-center text-success fw-bold">Add New Product</h3>
            <form action="productaction.php" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="category" class="form-label fw-semibold text-dark">Choose Category</label>
                    <select class="form-select border-success rounded-3" name="category" id="category" required>
                        <option value="">Select Category</option>
                        <?php while ($category = mysqli_fetch_assoc($res)) { ?>
                            <option value="<?php echo $category['category_id']; ?>">
                                <?php echo $category['category_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="product" class="form-label fw-semibold text-dark">Product Name</label>
                    <input type="text" class="form-control border-success rounded-3" id="product" name="product" required>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold text-dark">Product Image</label>
                    <input type="file" class="form-control border-success rounded-3" id="photo" name="photo" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold text-dark">Description</label>
                    <textarea class="form-control border-success rounded-3" id="description" name="description" rows="4" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-semibold text-dark">Price</label>
                    <input type="number" class="form-control border-success rounded-3" id="price" name="price" required>
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label fw-semibold text-dark">Stock</label>
                    <input type="number" class="form-control border-success rounded-3" id="stock" name="stock" required>
                </div>

                <div class="mb-3">
                    <label for="coin" class="form-label fw-semibold text-dark">Coin</label>
                    <input type="number" class="form-control border-success rounded-3" id="coin" name="coin" required>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-gradient-success rounded-pill px-5 py-2" name="submit">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    /* Green gradient button */
    .btn-gradient-success {
        background: linear-gradient(135deg, #43a047, #66bb6a);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-gradient-success:hover {
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        transform: scale(1.05);
        color: #fff;
    }

    /* Card shadow hover */
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
</style>

<?php
include('footer.php');
?>
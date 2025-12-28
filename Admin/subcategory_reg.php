<?php
include_once('header.php');
include_once('../dboperation.php');
$obj = new dboperation();

$sql = "select category_id,category_name from tbl_category";
$res = $obj->executequery($sql);
?>

<div class="container" style="padding-top:50px; max-width:700px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="mb-4 text-center text-success fw-bold">Add New Subcategory</h3>
            <form action="subcategoryaction.php" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="category" class="form-label fw-semibold text-dark">Choose Category</label>
                    <select class="form-select border-success" name="category" id="category" required>
                        <option value="">-- Select a Category --</option>
                        <?php while ($cat = mysqli_fetch_assoc($res)) { ?>
                            <option value="<?php echo $cat['category_id']; ?>">
                                <?php echo $cat['category_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="subcat" class="form-label fw-semibold text-dark">Subcategory Name</label>
                    <input type="text" name="subcat" class="form-control border-success" id="subcat" required>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold text-dark">Subcategory Image</label>
                    <input type="file" class="form-control border-success" id="photo" name="photo" required>
                </div>

                <div class="mb-3">
                    <label for="coin" class="form-label fw-semibold text-dark">Coin Value</label>
                    <input type="number" name="coin" class="form-control border-success" id="coin" min="0" required>
                </div>

                <div class="mb-3">
                    <label for="quantity" class="form-label fw-semibold text-dark">Quantity</label>
                    <input type="number" name="quantity" class="form-control border-success" id="quantity" min="0" required>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-gradient-success btn-lg px-5" name="submit">
                        Submit
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<style>
    .btn-gradient-success {
        background: linear-gradient(135deg, #43a047, #66bb6a);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        border: none;
    }

    .btn-gradient-success:hover {
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        transform: scale(1.05);
        color: #fff;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .form-control.border-success:focus, .form-select.border-success:focus {
        border-color: #2e7d32;
        box-shadow: 0 0 0 0.25rem rgba(67, 160, 71, 0.25);
    }
</style>

<?php
include('footer.php');
?>
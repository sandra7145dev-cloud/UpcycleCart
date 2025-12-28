<?php
include("header.php");
include_once("../dboperation.php");

$obj = new dboperation();
$sql = "select * from tbl_category";
$result = $obj->executequery($sql);
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#categoryid").change(function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "getproduct.php",
                    method: "POST",
                    data: { categoryid: category_id },
                    success: function(response) {
                        $("#product").html(response);
                    },
                    error: function() {
                        $("#product").html('<tr><td colspan="8" class="text-center text-danger">An error occurred while fetching products.</td></tr>');
                    }
                });
            } else {
                $("#product").html('<tr><td colspan="8" class="text-center text-muted">Please select a category to view its products.</td></tr>');
            }
        });
    });
</script>

<div class="container" style="padding-top:50px; max-width:1200px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="card-title text-success fw-bold mb-4 text-center">View Products</h3>

            <div class="mb-4">
                <label for="categoryid" class="form-label fw-bold">Select Category:</label>
                <select class="form-select form-select-lg" name="categoryid" id="categoryid" required>
                    <option value="">-- Select a Category --</option>
                    <?php
                    while ($r = mysqli_fetch_array($result)) { ?>
                        <option value="<?php echo $r["category_id"]; ?>">
                            <?php echo $r["category_name"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="text-white" style="background: linear-gradient(135deg, #43a047, #66bb6a);">
                        <tr>
                            <th>Sl.No</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Coin</th>
                            <th>Stock</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="product">
                        <tr>
                            <td colspan="8" class="text-center text-muted p-4">Please select a category to view its products.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Table Hover Effects */
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(198, 239, 206, 0.3);
    }

    table.table-hover tbody tr:hover {
        background-color: rgba(134, 211, 140, 0.4);
    }

    /* Gradient Buttons */
    .btn-gradient-primary {
        background: linear-gradient(135deg, #43a047, #66bb6a);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        border-radius: 0.35rem;
        border: none;
    }

    .btn-gradient-primary:hover {
        background: linear-gradient(135deg, #2e7d32, #4caf50);
        transform: scale(1.05);
        color: #fff;
    }
     .btn-gradient-danger {
        background: linear-gradient(135deg, #d32f2f, #f44336);
        color: #fff;
        font-weight: 600;
        transition: all 0.3s ease;
        border-radius: 0.35rem;
         border: none;
    }

    .btn-gradient-danger:hover {
        background: linear-gradient(135deg, #b71c1c, #d32f2f);
        transform: scale(1.05);
        color: #fff;
    }

    /* Card Hover Effect */
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
</style>

<?php include("footer.php"); ?>
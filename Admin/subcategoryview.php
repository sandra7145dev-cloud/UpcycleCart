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
        $("#cat").change(function() {
            var cat_id = $(this).val();
            if (cat_id) {
                $.ajax({
                    url: "getsubcategory.php",
                    method: "POST",
                    data: { catid: cat_id },
                    success: function(response) {
                        $("#subcat").html(response);
                    },
                    error: function() {
                        $("#subcat").html('<tr><td colspan="6" class="text-center text-danger">Error occurred while fetching subcategories!</td></tr>');
                    }
                });
            } else {
                 $("#subcat").html('<tr><td colspan="6" class="text-center text-muted">Please select a category to view its subcategories.</td></tr>');
            }
        });
    });
</script>

<div class="container" style="padding-top:50px; max-width:1200px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="card-title text-success fw-bold mb-4 text-center">View Subcategories</h3>

            <div class="mb-4">
                <label for="cat" class="form-label fw-bold">Select Category:</label>
                <select class="form-select form-select-lg" name="catid" id="cat" required>
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
                            <th>Subcategory Name</th>
                            <th>Coin</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="subcat">
                        <tr>
                            <td colspan="6" class="text-center text-muted p-4">Please select a category to view its subcategories.</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(198, 239, 206, 0.3);
    }

    table.table-hover tbody tr:hover {
        background-color: rgba(134, 211, 140, 0.4);
    }

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

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }
</style>

<?php include("footer.php"); ?>
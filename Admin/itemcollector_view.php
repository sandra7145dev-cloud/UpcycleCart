<?php
session_start();
include("../dboperation.php");
include("header.php");

$obj = new dboperation();
$sql = "select * from tbl_ward";
$result = $obj->executequery($sql);
?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#ward").change(function() {
            var ward_id = $(this).val();
            $.ajax({
                url: "getcollector.php",
                method: "POST",
                data: {
                    wardid: ward_id
                },
                success: function(response) {
                    $("#collector").html(response);
                },
                error: function() {
                    $("#collector").html("<tr><td colspan='6' class='text-center text-danger'>Error occurred while getting collectors!</td></tr>");
                }
            });
        });
    });
</script>

<div class="container" style="padding-top:50px; max-width:1200px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="card-title text-success fw-bold mb-4 text-center">View Item Collector</h3>

            <div class="mb-4">
                <label for="ward" class="form-label fw-bold">Select Ward:</label>
                <select class="form-select form-select-lg" name="wardid" id="ward" required>
                    <option value="">-- Select a Ward --</option>
                    <?php
                    while ($r = mysqli_fetch_array($result)) { ?>
                        <option value="<?php echo $r["ward_id"]; ?>">
                            <?php echo $r["ward_name"]; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="text-white" style="background: linear-gradient(135deg, #43a047, #66bb6a);">
                        <tr>
                            <th>Sl.No</th>
                            <th>Collector Name</th>
                            <th>Email</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="collector">
                        <tr>
                            <td colspan="6" class="text-center text-muted">Please select a ward to see the collectors.</td>
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
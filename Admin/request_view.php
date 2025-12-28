<?php
include("header.php");
include("../dboperation.php");
$obj = new dboperation();

// Fetch unique statuses from tbl_request
$sql_status = "SELECT DISTINCT status FROM tbl_request";
$r_status = $obj->executequery($sql_status);
?>

<script src="../jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $("#status").change(function() {
        var status_val = $(this).val();
        $.ajax({
            url: "getrequest.php",
            method: "POST",
            data: { status: status_val },
            success: function(response) {
                $("#requests").html(response);
            },
            error: function() {
                $("#requests").html("<tr><td colspan='9' class='text-center text-danger'>Error fetching data!</td></tr>");
            }
        });
    });
});


</script>

<div class="container" style="padding-top:50px; max-width:1200px;margin-left:30px">
  <div class="card shadow-sm border-0 rounded-4">
    <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
      <h3 class="card-title text-success fw-bold mb-4 text-center">Item Collection Requests</h3>

      <div class="form-group mb-4">
        <label class="fw-semibold">Select Status</label>
        <select class="form-select" name="status" id="status" style="border-radius:8px;">
          <option value="">--------Select Status-----------</option>
          <?php while ($display = mysqli_fetch_array($r_status)) { ?>
              <option value="<?php echo $display["status"]; ?>">
                  <?php echo ucfirst($display["status"]); ?>
              </option>
          <?php } ?>
        </select>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
          <thead class="text-white" style="background: linear-gradient(135deg, #43a047, #66bb6a);">
            <tr>
              <th>Sl.no</th>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Ward</th>
              <th>Category</th>
              <th>Sub Category</th>
              <th>Item Quantity</th>
              <th>Request Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody id="requests">
            <tr><td colspan="9" class="text-center text-muted">Please select a status to view requests</td></tr>
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
  }
  .btn-gradient-primary:hover {
    background: linear-gradient(135deg, #2e7d32, #4caf50);
    transform: scale(1.05);
    color: #fff;
  }
  .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
  }
</style>

<?php
include("footer.php");
?>

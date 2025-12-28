<?php
include('header.php');
include("../dboperation.php");

$obj = new dboperation;
$sql = "select ward_id,ward_name from tbl_ward ";
$res = $obj->executequery($sql);
?>

<div class="container" style="padding-top:50px; max-width:700px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-5" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="mb-4 text-center text-success fw-bold">Item Collector Registration</h3>
            <form action="itemcollector_action.php" method="post">

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold text-dark">Collector Name</label>
                    <input type="text" class="form-control border-success rounded-3" id="name" name="colname" pattern="[A-Z][a-zA-Z\s]*" title="Name must start with a capital letter and contain only letters and spaces" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold text-dark">Email</label>
                    <input type="email" class="form-control border-success rounded-3" id="email" name="cemail" required>
                </div>

                <div class="mb-3">
                    <label for="number" class="form-label fw-semibold text-dark">Contact Number</label>
                    <input type="tel" class="form-control border-success rounded-3" id="number" name="cnum" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-semibold text-dark">Address</label>
                    <input type="text" class="form-control border-success rounded-3" id="address" name="address" required>
                </div>

                <div class="mb-3">
                    <label for="ward" class="form-label fw-semibold text-dark">Ward</label>
                    <select class="form-select border-success rounded-3" name="ward" id="ward" required>
                        <option value="">Select Ward</option>
                        <?php while ($ward = mysqli_fetch_assoc($res)) { ?>
                            <option value="<?php echo $ward['ward_id']; ?>">
                                <?php echo $ward['ward_name']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="uname" class="form-label fw-semibold text-dark">Username</label>
                    <input type="text" class="form-control border-success rounded-3" id="uname" name="uname" required>
                </div>

                <div class="mb-3">
                    <label for="pword" class="form-label fw-semibold text-dark">Password</label>
                    <input type="password" class="form-control border-success rounded-3" id="pword" name="pword" required pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$" title="Password must be at least 6 characters, include 1 letter, 1 number, and 1 special character">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-gradient-success rounded-pill px-5 py-2" name="submit">
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
</style>

<?php
include('footer.php');
?>
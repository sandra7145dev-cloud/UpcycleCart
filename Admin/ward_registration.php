<?php
include('header.php');
include("../dboperation.php");
?>

<div class="container" style="padding-top:50px; max-width:700px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-5" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="mb-4 text-center text-success fw-bold">Add New Ward</h3>
            <form action="wardaction.php" method="POST">
                
                <div class="mb-3">
                    <label class="form-label fw-semibold text-dark">Muncipality Name</label>
                    <p class="form-control-plaintext ps-1 fs-5"><b>THODUPUZHA</b></p>
                </div>
                
                <div class="mb-3">
                    <label for="ward" class="form-label fw-semibold text-dark">Enter Ward Name</label>
                    <input type="text" id="ward" name="ward" placeholder="Enter ward name" class='form-control border-success rounded-3' required>
                </div>
                
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-gradient-success rounded-pill px-5 py-2" name='submit'>
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
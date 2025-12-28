<?php
include('header.php');
?>

<div class="container" style="padding-top:50px; max-width:700px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-5" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="mb-4 text-center text-success fw-bold">Add New Category</h3>
            <form action="categoryaction.php" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="category" class="form-label fw-semibold text-dark">Category Name</label>
                    <input type="text" class="form-control border-success rounded-3" id="category" name="cname" required>
                </div>

                <div class="mb-3">
                    <label for="photo" class="form-label fw-semibold text-dark">Category Image</label>
                    <input type="file" class="form-control border-success rounded-3" id="photo" name="photo" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold text-dark">Description</label>
                    <textarea name="description" class="form-control border-success rounded-3" id="description" rows="4" required></textarea>
                </div>

                <div class="text-center mt-4 d-grid gap-3 d-sm-flex justify-content-sm-center">
                    <button type="submit" class="btn btn-gradient-success rounded-pill px-5 py-2" name="submit">
                        Submit
                    </button>
                    <a href="categoryview.php" class="btn btn-outline-success rounded-pill px-5 py-2">View Category</a>
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
        border: none;
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
    
    /* Style for the secondary outline button */
    .btn-outline-success {
        font-weight: 600;
        transition: all 0.3s ease;
    }
    
    .btn-outline-success:hover {
         transform: scale(1.05);
    }
</style>

<?php
include('footer.php');
?>
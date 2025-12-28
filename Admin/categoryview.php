<?php
include("header.php");
include("../dboperation.php");

$obj = new dboperation();
$s = 1;
$sql = "select * from tbl_category";
$result = $obj->executequery($sql);
?>

<div class="container" style="padding-top:50px; max-width:1200px;">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4" style="background: linear-gradient(135deg, #e8f5e9, #c8e6c9);">
            <h3 class="card-title text-success fw-bold mb-4 text-center">All Categories</h3>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="text-white" style="background: linear-gradient(135deg, #43a047, #66bb6a);">
                        <tr>
                            <th>Sl.No</th>
                            <th>Category Name</th>
                            <th>Description</th>
                            <th>Category Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result && mysqli_num_rows($result) > 0) {
                            while ($display = mysqli_fetch_array($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $s++; ?></td>
                                    <td><?php echo $display["category_name"]; ?></td>
                                    <td><?php echo $display["category_description"]; ?></td>
                                    <td>
                                        <img src="../uploads/<?php echo $display["category_image"]; ?>" alt="<?php echo $display["category_name"]; ?>" style="width:100px; height:auto; border-radius: 8px; object-fit: cover;">
                                    </td>
                                    <td>
                                        <a href="category_edit.php?category_id=<?php echo $display["category_id"]; ?>" class="btn btn-gradient-primary btn-sm" onclick="return confirm('Do you want to make changes?')">Edit</a><br><br>
                                        <a href="category_delete.php?category_id=<?php echo $display["category_id"]; ?>" class="btn btn-gradient-danger btn-sm" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No categories found</td></tr>";
                        }
                        ?>
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
        transform
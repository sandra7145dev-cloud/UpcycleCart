<?php
include_once('header.php');
include_once('../dboperation.php');
$obj=new dboperation();

if(isset($_GET["category_id"]))
{
    $catid=$_GET["category_id"];
    $sql="select * from tbl_category where category_id='$catid'";
    $res=$obj->executequery($sql);
    $display=mysqli_fetch_array($res);
}
?>
<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="categoryedit_action.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="category" class="form-label">Category Name</label>
                      <input type="text" class="form-control" id="category" name="cname" value="<?php echo $display['category_name']??'';?>" >
                      
                    </div>
                    <div class="mb-3">
                      <label for="category" class="form-label">Category Image</label>
                      <br>
                      <img src="../uploads/<?php echo $display['category_image']??'';?>" alt="image" style="width:120px;">
                      <input type="file" class="form-control" id="photo" name="photo" style="margin-top:5px;">

                    </div>
                    <div class="mb-3">
                      <label for="description" class="form-label">Description</label>
                      <textarea name="description" class="form-control" id="description"  ><?php echo $display['category_description']??'';?></textarea>
                    </div>
                    <input type="hidden" name="category_id" value="<?php echo $display["category_id"]??'';?>">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </form>
                </div>
              </div>
  <?php
include('footer.php');
?> 
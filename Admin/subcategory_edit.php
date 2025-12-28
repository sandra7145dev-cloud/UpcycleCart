<?php
include_once('header.php');
include_once('../dboperation.php');
$obj=new dboperation();

if(isset($_GET["subcat_id"]))
{
    $sid=$_GET["subcat_id"];
    $sql="select * from tbl_subcategory where subcategory_id='$sid'";
    $res=$obj->executequery($sql);
    $display=mysqli_fetch_array($res);
     $sql1="select category_id,category_name from tbl_category";
   $res1=$obj->executequery($sql1);

    
// $error=mysqli_error($obj->$con);
// echo "$error";

}

   

?>
<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="subcategoryedit_action.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                           <label for="dropdown">Choose Category:</label>
                <select class="form-select" name="category" id="dropdown" required>
                    <?php while ($category= mysqli_fetch_assoc($res1)) { 
                      $select=($category['category_id']==$display['category_id'])?'selected':'';
                      ?>
                        <option value="<?php echo $category['category_id']; ?>"<?php echo $select;?>>
                          <?php echo $category['category_name']; ?>
                         
                        </option>
                         <?php } ?>
                </select>
                    </div>
                    <div class="mb-3">
                      <label for="subname" class="form-label">sub Category Name</label>
                      <input type="text" class="form-control" id="submnae" name="sname" value="<?php echo $display['subcategory_name']??'';?>" >
                    </div>
                <div class="mb-3">
                      <label for="subcategory" class="form-label">Image</label>
                      <br>
                      <img src="../uploads/<?php echo $display['subcategory_image']??'';?>" alt="image" style="width:120px;">
                      <input type="file" class="form-control" id="photo" name="photo" style="margin-top:5px;">

                    </div>
                     
                     
                     <div class="mb-3">
                      <label for="coin" class="form-label">coin</label>
                      <textarea name="coin" class="form-control" id="coin"  ><?php echo $display['coin']??'';?></textarea>
                    </div>
                     <div class="mb-3">
                      <label for="quan" class="form-label">Quantity</label>
                      <textarea name="quan" class="form-control" id="quan"  ><?php echo $display['quantity']??'';?></textarea>
                    </div>
                    
                    <input type="hidden" name="subcategory_id" value="<?php echo $display["subcategory_id"]??'';?>">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </form>
                </div>
              </div>
  <?php
include('footer.php');
?> 
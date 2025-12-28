<?php
include_once('header.php');
include_once('../dboperation.php');
$obj=new dboperation();

if(isset($_GET["product_id"]))
{
    $pid=$_GET["product_id"];
    $sql="select p.*,c.category_name from tbl_product p inner join tbl_category c on p.category_id=c.category_id where p.product_id='$pid'";
    $res=$obj->executequery($sql);
    $display=mysqli_fetch_array($res);
    
// $error=mysqli_error($obj->$con);
// echo "$error";

}

   $sql1="select category_id,category_name from tbl_category";
   $res1=$obj->executequery($sql1);

?>
<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="productedit_action.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="product" class="form-label">Product Name</label>
                      <input type="text" class="form-control" id="product" name="pname" value="<?php echo $display['product_name']??'';?>" >
                    </div>
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
                      <label for="description" class="form-label">Description</label>
                      <textarea name="desc" class="form-control" id="description"  ><?php echo $display['description']??'';?></textarea>
                    </div>
                     <div class="mb-3">
                      <label for="price" class="form-label">price</label>
                      <textarea name="prdctprice" class="form-control" id="price"  ><?php echo $display['product_price']??'';?></textarea>
                    </div>
                     <div class="mb-3">
                      <label for="coin" class="form-label">coin</label>
                      <textarea name="prcoin" class="form-control" id="coin"  ><?php echo $display['product_coin']??'';?></textarea>
                    </div>
                     <div class="mb-3">
                      <label for="stock" class="form-label">Stock</label>
                      <textarea name="prstock" class="form-control" id="stock"  ><?php echo $display['product_stock']??'';?></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="category" class="form-label">Image</label>
                      <br>
                      <img src="../uploads/<?php echo $display['product_image']??'';?>" alt="image" style="width:120px;">
                      <input type="file" class="form-control" id="photo" name="photo" style="margin-top:5px;">

                    </div>
                    <input type="hidden" name="product_id" value="<?php echo $display["product_id"]??'';?>">
                    <input type="hidden" name="category_id" value="<?php echo $display["category_id"]??'';?>">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </form>
                </div>
              </div>
  <?php
include('footer.php');
?> 
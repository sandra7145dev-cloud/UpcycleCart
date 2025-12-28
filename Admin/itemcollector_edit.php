<?php
include_once('header.php');
include_once('../dboperation.php');
$obj=new dboperation();
?>

<?php
if(isset($_GET["collector_id"]))
{
    $cid=$_GET["collector_id"];
  
    $sql="select * from tbl_item_collector where collector_id='$cid'";
    $res=$obj->executequery($sql);
    $display=mysqli_fetch_array($res);
$sql2="select * from tbl_ward";
$r=$obj->executequery($sql2);
// $error=mysqli_error($obj->$con);
// echo "$error";

}

   

?>
<div class="card" style="padding-top:150px">
                <div class="card-body">
                  <form action="itemcollector_editaction.php" method="post" >
                    <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control" id="name" name="colname" value="<?php echo $display['collector_name']??'';?>" >
                    </div>
                     <div class="mb-3">
                      <label for="email" class="form-label">Email</label>
                      <textarea name="cemail" class="form-control" id="email"  ><?php echo $display['collector_email']??'';?></textarea>
                    </div>
                     <div class="mb-3">
                      <label for="number" class="form-label">Contact Number</label>
                      <textarea name="cnum" class="form-control" id="number"  ><?php echo $display['collector_phnno']??'';?></textarea>
                    </div>
                     <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <textarea name="address" class="form-control" id="address"  ><?php echo $display['collector_address']??'';?></textarea>
                    </div>
                    
                    <div class="mb-3">
                          
                           <label for="dropdown">Select Ward:</label>
                <select class="form-select" name="ward" id="dropdown" required>
                    <?php while ($ward= mysqli_fetch_assoc($r)) { 
                      $select=($ward['ward_id']==$display['ward_id'])?'selected':'';
                      ?>
                        <option value="<?php echo $ward['ward_id']; ?>"<?php echo $select;?>>
                          <?php echo $ward['ward_name']; ?>
                         
                        </option>
                         <?php } ?>
                </select>
                    
                    </div>
                     <div class="mb-3">
                      <label for="uname" class="form-label">Username</label>
                      <textarea name="uname" class="form-control" id="uname"  ><?php echo $display['username']??'';?></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="pword" class="form-label">Password</label>
                      <textarea name="pword" class="form-control" id="pword"  ><?php echo $display['password']??'';?></textarea>
                    </div>
                    
                    <input type="hidden" name="collector_id" value="<?php echo $display["collector_id"]??'';?>">
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                  </form>
                </div>
              </div>
  <?php
include('footer.php');
?> 
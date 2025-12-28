<?php
include("header.php");
include("../dboperation.php");
$obj=new dboperation();

$s=1;
$sql="select * from tbl_ward";
$result=$obj->executequery($sql);
?>
            <div class="col-12" style="margin-top:100px";>
              <div class="card">
                <div class="card-body">
                  <div class="d-md-flex align-items-center">
                    <div>
                      <h4 class="card-title"><b>ward Details</b></h4>
                      
                    </div>
                  </div>
                  <div class="table-responsive mt-4">
                    <table class="table mb-0 text-nowrap varient-table align-middle fs-3">
                      <thead>
                       
                        <tr>
                          <th scope="col" class="px-0 text-muted">
                            Sl.no
                          </th>
                          <th scope="col" class="px-0 text-muted"> Ward Name</th>
                          
                          <th scope="col" class="px-0 text-muted ">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          while($display=mysqli_fetch_array($result))

                        {
                          ?>
                        <tr>
                          <td class="px-0"><?php echo $s++;?></td>
                          <td class="px-0"><?php echo $display["ward_name"];?></td>
                          <td>
                            <a href="ward_edit.php?ward_id=<?php echo $display["ward_id"];?>" class="btn btn-primary" onclick="return confirm('Do you want to make changes?')">Edit</a>
                            
                            <a href="ward_delete.php?ward_id=<?php echo $display["ward_id"];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                            
                           </td>
                       </tr>
                          <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <?php
include("footer.php");
?>
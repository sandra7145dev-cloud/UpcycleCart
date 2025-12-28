<?php
	if(isset($_POST["wardid"])) 
	{
		$wid = $_POST["wardid"];

		include_once("../dboperation.php");
        $sql="select * from tbl_item_collector where ward_id=$wid";
        $obj=new dboperation();
        $result=$obj->executequery($sql);
        $s=1;
?>

<?php
while($row=mysqli_fetch_array($result))
{
?>

<tr>
    
        <td class="px-1"><?php echo $s++;?></td>
                          <td class="px-1"><?php echo $row["collector_name"];?></td>
                          <td class="px-1"><?php echo $row["collector_email"];?></td>
                          <td class="px-1"><?php echo $row["collector_phnno"];?> </td>
                          <td class="px-1"><?php echo $row["collector_address"];?> </td>
       
        <td>
          <a href="itemcollector_edit.php?collector_id=<?php echo $row["collector_id"];?>" class="btn btn-primary">Edit</a>
          <a href="itemcollector_delete.php?collector_id=<?php echo $row["collector_id"];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
      </tr>
      
      
      
      <?php
}
	}
?>

		
	


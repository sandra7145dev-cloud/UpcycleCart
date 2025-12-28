<?php
	if(isset($_POST["catid"])) 
	{
		$categoryid = $_POST["catid"];

		include_once("../dboperation.php");
        $sql="select * from tbl_subcategory where category_id=$categoryid";
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
                          <td class="px-1"><?php echo $row["subcategory_name"];?></td>
                          <td class="px-1"><?php echo $row["coin"];?> </td>
                          <td class="px-1"><?php echo $row["quantity"];?> </td>
                           <td ><img src="../uploads/<?php echo $row["subcategory_image"];?>" alt="image" style="width:150px";> </td>
       
        <td>
          <a href="subcategory_edit.php?subcat_id=<?php echo $row["subcategory_id"];?>" class="btn btn-primary">Edit</a>
          <a href="subcategory_delete.php?subcat_id=<?php echo $row["subcategory_id"];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
      </tr>
      
      
      
      <?php
}
	}
?>

		
	


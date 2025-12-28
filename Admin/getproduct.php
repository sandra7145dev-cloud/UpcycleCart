<?php
	if(isset($_POST["categoryid"])) 
	{
		$categoryid = $_POST["categoryid"];

		include_once("../dboperation.php");
        $sql="select * from tbl_product where category_id=$categoryid";
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
                          <td class="px-1"><?php echo $row["product_name"];?></td>
                          <td class="px-1"><?php echo $row["description"];?> </td>
                          <td class="px-1"><?php echo $row["product_price"];?> </td>
                          <td class="px-1"><?php echo $row["product_coin"];?> </td>
                          <td class="px-1"><?php echo $row["product_stock"];?> </td>
                           <td ><img src="../uploads/<?php echo $row["product_image"];?>" alt="image" style="width:150px";> </td>
       
        <td>
          <a href="product_edit.php?product_id=<?php echo $row["product_id"];?>" class="btn btn-primary">Edit</a>
          <a href="product_delete.php?product_id=<?php echo $row["product_id"];?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
        </td>
      </tr>
      
      
      
      <?php
}
	}
?>

		
	


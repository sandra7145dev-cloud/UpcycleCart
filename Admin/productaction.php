<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$category = $_POST["category"];
$product = $_POST["product"];
$image=$_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/".$image);
$description = $_POST["description"];
$price = $_POST["price"];
$stock = $_POST["stock"];
$coin = $_POST["coin"];
$sqlquery="select * from tbl_product where product_name='$product'";
$result=$obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows>0)
{
    echo "<script>alert('Already Exist');window.location='product.php'</script>";
}
else
{
$sql="insert into tbl_product(category_id,product_name,description,product_price,product_image,product_stock,product_coin)values('$category','$product','$description','$price','$image','$stock','$coin')";
$res=$obj->executequery($sql);
if($res==1)
{
echo "<script>alert('Insertion Successful');window.location='product.php'</script>"; 
}
}
}
// $error=mysqli_error($obj->con);
// echo "$error";
?>
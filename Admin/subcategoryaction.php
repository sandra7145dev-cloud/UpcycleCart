<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$cname = $_POST["category"];
$sname = $_POST["subcat"];
$coin=$_POST["coin"];
$quan=$_POST["quantity"];
$image=$_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/".$image);
$sqlquery="select * from tbl_subcategory where subcategory_name='$sname'";
$res=$obj->executequery($sqlquery);
$rows=mysqli_num_rows($res);
if($rows>0)
{
    echo "<script>alert('Already Exist');window.location='subcategory_reg.php'</script>";
}
else
{
$sqlquery ="insert into  tbl_subcategory (category_id,subcategory_name,subcategory_image,coin,quantity)values('$cname','$sname','$image','$coin','$quan')";
$result= $obj->executequery($sqlquery);
    if ($result==1)
    {
     echo "<script>alert('Insertion Successful');window.location='subcategory_reg.php'</script>"; 
    }
    else
    {
   echo "<script>alert('Insertion Failed!!'); window.location='subcategory_reg.php'</script>";
    }
}
}
$error=mysqli_error($obj->con);
 echo "$error";
?>
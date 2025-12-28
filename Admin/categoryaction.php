<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$cname = $_POST["cname"];
$cdesc = $_POST["description"];
$image=$_FILES["photo"]["name"];
move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/".$image);
$sqlquery="select * from tbl_category where category_name='$cname'";
$res=$obj->executequery($sqlquery);
$rows=mysqli_num_rows($res);
if($rows>0)
{
    echo "<script>alert('Already Exist');window.location='categoryregister.php'</script>";
}
else
{
$sqlquery ="insert into  tbl_category (category_name,category_description,category_image)values('$cname','$cdesc','$image')";
$result= $obj->executequery($sqlquery);
    if ($result==1)
    {
     echo "<script>alert('Insertion Successful');window.location='category.php'</script>"; 
    }
    else
    {
   echo "<script>alert('Insertion Failed!!'); window.location='category.php'</script>";
    }
}
}
?>
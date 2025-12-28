<?php

include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
     $pid=$_POST['product_id'];
    $product_name=$_POST['pname'];
     $catid=$_POST['category'];
    $product_description=$_POST['desc'];
    $product_price=$_POST['prdctprice'];
    $product_coin=$_POST['prcoin'];
    $product_stock=$_POST['prstock'];
    $productimg=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../Uploads/".$productimg);
    if($productimg=='')
    {
    $sql1="UPDATE tbl_product set product_name='$product_name',category_id='$catid',`description`='$product_description',product_price='$product_price',product_coin='$product_coin',product_stock='$product_stock' where product_id='$pid'";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_product set product_name='$product_name',category_id='$catid', product_image='$productimg',`description`='$product_description',product_price='$product_price',product_coin='$product_coin',product_stock='$product_stock' where product_id='$pid'";
    $result=$obj->executequery($sql);
    }
    if ($result == 1){
     echo "<script>alert('Saved Succesfully');window.location='productview.php' </script>";
    }
    else{
      // echo "<script>alert('Registration failed');window.location='productview.php' </script>";
    }
    $error=mysqli_error($obj->con);
     echo "$error";
}
?>
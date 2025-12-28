<?php
include("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["product_id"])) {
  $pid=$_GET["product_id"];

   $sql="select * from tbl_product where product_id=$pid";
  $res=$obj->executequery($sql);
  $display=mysqli_fetch_array($res);


  // Store the image filenames in an array
  $imageFiles = ["../uploads/" . $display["product_image"]];


   // Delete each image file from the array
  foreach ($imageFiles as $file) 
  {
    if (file_exists($file)) {
        unlink($file);
    }
  }
  
  $sql="delete   from tbl_product where product_id=$pid";
  $res=$obj->executequery($sql);
 
  
  }

   echo "<script>alert('Deleted Successfully!!');window.location='productview.php'</script>";

?>
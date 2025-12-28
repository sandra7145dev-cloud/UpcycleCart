<?php

include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
  $sid=$_POST["subcategory_id"];
     $cid=$_POST["category"];
    $sname=$_POST["sname"];
    $coin=$_POST["coin"];
    $quantity=$_POST['quan'];
    $subcatimg=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../Uploads/".$subcatimg);
    if($subcatimg=='')
    {
    $sql1="UPDATE tbl_subcategory set category_id='$cid', subcategory_name='$sname',coin='$coin',quantity='$quantity' where subcategory_id='$sid'";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_subcategory set category_id='$cid', subcategory_name='$sname', subcategory_image='$subcatimg',coin='$coin',quantity='$quantity' where subcategory_id='$sid'";
    $result=$obj->executequery($sql);
    }
    if ($result == 1){
     echo "<script>alert('Saved Succesfully');window.location='subcategoryview.php' </script>";
    }
    else{
      echo "<script>alert('Registration failed');window.location='subcategoryview.php' </script>";
    }
     $error=mysqli_error($obj->con);
      echo "$error";
}
?>
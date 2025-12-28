<?php

include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
     $id=$_POST['category_id'];
    $Category_name=$_POST['cname'];
    $Category_description=$_POST['description'];
    $Categoryimg=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"], "../Uploads/".$Categoryimg);
    if($Categoryimg=='')
    {
    $sql1="UPDATE tbl_category set Category_name='$Category_name',category_description='$Category_description' where Category_id=$id";
    $result=$obj->executequery($sql1);
    }
    else{
        $sql="UPDATE tbl_category set Category_name='$Category_name', Category_image='$Categoryimg',category_description='$Category_description' where Category_id=$id";
    $result=$obj->executequery($sql);
    }
    if ($result == 1){
     echo "<script>alert('Saved Succesfully');window.location='categoryview.php' </script>";
    }
    else{
     echo "<script>alert('Registration failed');window.location='categoryview.php' </script>";
    }
    // $error=mysqli_error($obj->con);
    // echo "$error";
}
?>
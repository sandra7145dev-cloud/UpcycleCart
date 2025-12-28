<?php

include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
     $wid=$_POST['ward_id'];
    $ward_name=$_POST['ward'];
   //  $dist=$_POST['dst'];
    $sql="UPDATE tbl_ward set ward_name='$ward_name' where ward_id='$wid'";
    $result=$obj->executequery($sql);
    
    if ($result == 1){
     echo "<script>alert('Saved Succesfully');window.location='wardview.php' </script>";
    }
    else{
       echo "<script>alert('Registration failed');window.location='wardview.php' </script>";
    }
    $error=mysqli_error($obj->con);
     echo "$error";
}
?>
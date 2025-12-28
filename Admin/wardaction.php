<?php

include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
     $ward=$_POST['ward'];
    $sql="insert into tbl_ward (ward_name)values('$ward')";
    $sqlquery="select * from tbl_ward where ward_name='$ward'";
    $result=$obj->executequery($sqlquery);
    if (mysqli_num_rows($result)>0){
     echo "<script>alert('Already Exist');window.location='ward_registration.php' </script>";
    }
    else{
        $res=$obj->executequery($sql);
        if($res==1)
        {
          echo "<script>alert('Location inserted successfully');window.location='ward_registration.php' </script>";   
        }
    }
    // $error=mysqli_error($obj->con);
    // echo "$error";
}
?>
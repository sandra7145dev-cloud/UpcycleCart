<?php

include_once("../dboperation.php");
$obj=new dboperation();
if (isset($_POST['submit']))
{
     $cid=$_POST['collector_id'];
    $collector_name=$_POST['colname'];
     $cemail=$_POST['cemail'];
    $colnum=$_POST['cnum'];
    $coladd=$_POST['address'];
    // $dist=$_POST['districtid'];
    $loc=$_POST['ward'];
    $uname=$_POST['uname'];
    $pword=$_POST['pword'];
    
    
        $sql="UPDATE tbl_item_collector set collector_name='$collector_name',collector_email='$cemail', collector_phnno='$colnum',collector_address='$coladd',ward_id='$loc',username='$uname',`password`='$pword' where collector_id='$cid'";
    $result=$obj->executequery($sql);
    
    if ($result == 1){
     echo "<script>alert('Saved Succesfully');window.location='itemcollector_view.php' </script>";
    }
    else{
       echo "<script>alert('Registration failed');window.location='itemcollector_view.php' </script>";
    }
    $error=mysqli_error($obj->con);
     echo "$error";
}
?>
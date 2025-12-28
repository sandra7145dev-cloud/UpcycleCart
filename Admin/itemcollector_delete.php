<?php
include("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["collector_id"])) {
  $cid=$_GET["collector_id"];

  
  $sql="delete   from tbl_item_collector where collector_id=$cid";
  $res=$obj->executequery($sql);
 
  
  if($res==1)
{
   echo "<script>alert('Deleted Successfully!!');window.location='itemcollector_view.php'</script>";
}
else{
   echo "<script>alert('Deletion Failed!!');window.location='itemcollector_view.php'</script>";
}
}
?>
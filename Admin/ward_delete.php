<?php
include("../dboperation.php");
$obj=new dboperation();

if(isset($_GET["ward_id"])) {
  $wid=$_GET["ward_id"];
  
  $sql="delete   from tbl_ward where ward_id=$wid";
  $res=$obj->executequery($sql);
 
  
  if($res==1)
{
   echo "<script>alert('Deleted Successfully!!');window.location='wardview.php'</script>";
}
else{
  echo "<script>alert('Deletion Failed!!');window.location='wardview.php'</script>";
}
}

?>
<?php
include_once("../dboperation.php");
$obj = new dboperation();
if(isset($_POST['submit']))
{
$colname = $_POST["colname"];
$email = $_POST["cemail"];
$num=$_POST["cnum"];
$add = $_POST["address"];
$wid = $_POST["ward"];
$uname = $_POST["uname"];
$pword = $_POST["pword"];
$sqlquery="select * from tbl_item_collector where collector_email='$email'or username='$uname'";
$result=$obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows>0)
{
    echo "<script>alert('Already Exist');window.location='itemcollector_reg.php'</script>";
}
else
{
$sql="insert into tbl_item_collector(collector_name,collector_email,collector_phnno,collector_address,ward_id,username,password)values('$colname','$email','$num','$add','$wid','$uname','$pword')";
$res=$obj->executequery($sql);
if($res==1)
{
echo "<script>alert('Insertion Successful');window.location='itemcollector_reg.php'</script>"; 
}
}
}
 $error=mysqli_error($obj->con);
 echo "$error";
?>
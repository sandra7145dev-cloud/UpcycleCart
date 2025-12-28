<?php
include_once("../dboperation.php");
$obj = new dboperation();

if(isset($_POST['submit']))
{
$cname = $_POST["cname"];
$email = $_POST["eadd"];
$num=$_POST["cnum"];
$add = $_POST["add"];
$wid = $_POST["ward"];
$uname = $_POST["uname"];
$pword = $_POST["pass"];


$sqlquery="select * from tbl_customer where email='$email'or username='$uname'";
$result=$obj->executequery($sqlquery);
$rows=mysqli_num_rows($result);
if($rows>0)
{
    echo "<script>alert('Customer Already Exist');window.location='customerreg.php'</script>";
}
else
{
$sql="insert into tbl_customer(name,email,phone_no,address,ward_id,username,password)values('$cname','$email','$num','$add','$wid','$uname','$pword')";
$res=$obj->executequery($sql);
$customerid=mysqli_insert_id($obj->con);

$sql1="insert into tbl_wallet(customer_id,coin)values('$customerid',0)";
$exc=$obj->executequery($sql1);
$walletid = mysqli_insert_id($obj->con);

$sql2= "update tbl_customer set wallet_id='$walletid' where customer_id='$customerid'";
$ex2=$obj->executequery($sql2);
if($ex2==1)
{
    $bodyContent = "Dear $cname, Your registering is sucessfully completed in the website. You can access the UpcycleCart website now.";
            $mailtoaddress = $email;
            require('phpmailer.php');
echo "<script>alert('Registration Successful');window.location='index.php'</script>"; 
}
}
}
 $error=mysqli_error($obj->con);
 echo "$error";
?>
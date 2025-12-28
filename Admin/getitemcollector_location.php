<?php
	if(isset($_POST["wardid"])) 
	{
		$districtid = $_POST["wardid"];

		include_once("../dboperation.php");
        $sql="select * from tbl_ward where ward_id=$districtid";
        $obj=new dboperation();
        $result=$obj->executequery($sql);
        $s=1;
    }
    echo "<option value=''>Select ward</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['ward_id'] . "'>" . $row['ward_name'] . "</option>";
    }

?>



		
	



<?php

$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');

		// $dept = $_POST['deptname'];
		// $sem = $_POST['sem'];
		 $dept = 'CSE';
		$sem =1;

	 $sql = "SELECT is_on FROM live_class where sem = $sem AND dept_name = '$dept'";
		echo "$sql";
		$result = mysqli_query($db,$sql);
		
		if($row = mysqli_fetch_array($result))
			{	
				 $result_array = array(  "hasStarted"=>$row['is_on']);
				 echo json_encode($result_array);
			}
	

?>



<?php

$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');

		$dept = $_POST['dept_name'];
		$sem = $_POST['sem'];
		//  $dept = 'CSE';
		// $sem =1;

	 $sql = "SELECT sub_name FROM subject where sem = $sem AND dept_name = '$dept'";
		echo "$sql";
		$subject_result = mysqli_query($db,$sql);
		$subject_array =array();
		while($subject_row = mysqli_fetch_array($subject_result))
			{	
				$subject_array[] = $subject_row['sub_name'];
			}
		$result_array = array(  "subject"=>$subject_array );

		echo json_encode($result_array);

?>


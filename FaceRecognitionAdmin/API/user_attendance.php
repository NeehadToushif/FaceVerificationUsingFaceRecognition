
<?php

$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');

	$stud_id = preg_replace('/\s+/', '', $_POST['stud_id']);
	// $stud_id = '041';
	

	$sql =  "SELECT sub_name,COUNT(*) as 'attandance_count' FROM attandance where  stud_id = '$stud_id' GROUP BY sub_name ";
	$result = mysqli_query($db,$sql);
	$result_array = array();
	$final_array = array();
	$i =0;
	while($row = mysqli_fetch_array($result)) {
		$result_array[] = array("subject_title"=>$row['sub_name'],"attandance_count"=>$row['attandance_count'] );
		echo "$result_array[$i]";
		$i++;
		$final_array[] = $result_array;
	}
	$final_array = array("subjectWise_attn"=>$result_array);
	echo json_encode($final_array);

?>



<?php

$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');

	$stud_id = $_POST['stud_id'];
	// $stud_id = '041';

	$stud_password = $_POST['stud_pass'];
	// $stud_password = 'n';
	// $sql =  "SELECT stud_name,stud_id,dept_name,semCOUNT(*) as 'number_of_attandance' FROM attandance where  sub_id = '$Subject' GROUP BY stud_id ";
	// $result = mysqli_query($db,$sql);


	 $mysql_qry = "SELECT stud_name,stud_id,dept_name,sem,photo FROM student where stud_id = $stud_id AND stud_pass = '$stud_password'";
    // $mysql_qry = "SELECT * FROM student where stud_id = $stud_id";
	$result = mysqli_query($db,$mysql_qry);
	echo $mysql_qry;

	if($result!=null && $row = mysqli_fetch_array($result)) {
		
		$encoded_image =  $row["photo"] ;
		$dept = $row['dept_name'];
		$sem = $row['sem'];
		$name = $row['stud_name'];
		$id = preg_replace('/\s+/', '', $row["stud_id"]);
		$sql = "SELECT sub_name FROM subject where sem = $sem AND dept_name = '$dept'";
		echo "$sql";
		$subject_result = mysqli_query($db,$sql);
		$subject_array =array();
		$c=0;

		while($subject_row = mysqli_fetch_array($subject_result))
			{	
				$subject_array[] = $subject_row['sub_name'];
				$c++;

			}
			
			for($i=0;$i<$c;$i++)
			{
				echo $subject_array[$i];
			}
		$result_array = array( 'status'=>"success",'id' => $id,"name"=>$name,"dept"=>$dept,"sem"=>$sem, "image" => $encoded_image, "subject"=>$subject_array );

		
	}
	else{
		$result_array = array( 'status'=>"failed");
	}


		echo json_encode($result_array);
	

?>


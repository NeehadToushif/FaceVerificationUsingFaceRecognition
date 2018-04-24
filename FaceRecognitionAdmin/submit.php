<?php
//submit.php

$sub_name = $_POST['sub_name'];
// $sub_name = 'c++';
if(isset($sub_name)){
	$connect=mysqli_connect("localhost","root","","face_recognition");
	$query="SELECT stud_id,stud_name,Count(*) as attendance_count FROM face_recognition.attendance WHERE sub_name = '$sub_name' GROUP BY stud_id";
	
	$result=mysqli_query($connect,$query);
	$output="";
	$output.=<<<Table
		<thead class="table-inverse">
				<tr>
					<th >Registration_No</th>
					<th >Stud_Name</th>
					<th >Attendance Count</th>
				</tr>
				</thead>
	"
Table;
	if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$output .=<<<Table
			<tr>			
					<td>{$row["stud_id"]}</td>
					<td>{$row["stud_name"]}</td>
					<td>{$row["attendance_count"]}</td>
					
				</tr>
Table;
		}
	}
	else{
		$output .=<<<Table
			<tr>
			<td colspan="5">No Order Found</td>
			</tr>
Table;
	}
	echo $output;

}
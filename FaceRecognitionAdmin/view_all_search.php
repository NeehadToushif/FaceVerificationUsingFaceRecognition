<?php

if(isset($_POST["id"])){
	$connect=mysqli_connect("localhost","root","","face_recognition");
	$query="SELECT * FROM face_recognition.student WHERE stud_id = ".$_POST["id"];
	$result=mysqli_query($connect,$query);
	$output="";
	$output.=<<<TableHeader
		<thead class="thead-inverse">
				<tr>
                            <th>Reg No.</th>
                            <th>Student Name</th>
                            <th>Department Name</th>
                            <th>Semester</th>
                        </tr>
	"
TableHeader;

		if(mysqli_num_rows($result)>0){
		while($row = mysqli_fetch_array($result)){
			$output .=<<<TableRow
			<tr>			
					<td>{$row['stud_id']}</td>
                    <td>{$row['stud_name']}</td>
                    <td>{$row['dept_name']}</td>
                    <td>{$row['sem']}</td>
				</tr>
TableRow;

  }
}
else{
		$output .=<<<TableRow
			<tr>
			<td colspan="5">No Student Found</td>
			</tr>
TableRow;
        }
	$output .='</thead>';
	echo $output;
}            

?>


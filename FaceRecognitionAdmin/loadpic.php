<?php
$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');


  $user_name = $_POST["user_name"];
  //$user_name = 42;

// $user_pass = $_POST["password"];
//$mysql_qry = "select * from testdb where stud_id like '$user_name' and password like '$user_pass';";

$mysql_qry = "SELECT stud_id,photo FROM student where stud_id= ".$user_name.";";

$result = mysqli_query($db,$mysql_qry);


if($result!=null && $row = mysqli_fetch_array($result)) {
$encoded_image = base64_encode( $row["photo"] );

$result = array( 'id' => $row["stud_id"], "image" => $encoded_image );

echo json_encode($result);

echo $result;
// while ($row = mysqli_fetch_array($result)) {
// 	printf("%s",$row["stud_id"]);
// 		//echo '<img src="data:image/jpeg;base64,'.base64_encode( $row["photo"] ).'"/>';
// 	}
}
else {
	echo "login not success";
}

?>

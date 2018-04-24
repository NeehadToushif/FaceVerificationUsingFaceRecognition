<?php
$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');


// $user_name = $_POST["user_name"];
// $sub_id = $_POST["sub_id"];
// $stud_name = 'neehad';
// $stud_id = '041';
// $sub_id = 'CS1';
// $sub_name = 'c++'
$stud_name = $_POST["stud_name"];
$stud_id = $_POST["stud_id"];
$sub_id = $_POST["sub_id"];
$sub_name = $_POST["sub_name"];

$mysql_qry = "INSERT INTO attandance (stud_name,stud_id,sub_id,sub_name,date) VALUES ('$stud_name', '$stud_id','$sub_id',$sub_name, NOW())";

echo $mysql_qry;

$result = mysqli_query($db,$mysql_qry) or die(mysqli_error($db));

if($result){
	return "success";
}
else
 return "not successful";
?>

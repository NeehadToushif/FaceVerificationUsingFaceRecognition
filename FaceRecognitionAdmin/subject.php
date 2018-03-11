<?php

$db=mysqli_connect('localhost','root','') or die('unable to connect .check the munachully parametrs');


mysqli_select_db($db,'face_recognition') or die(mysqli_error($db));

if($db){

	if(isset($_POST["submit"])) {
	$sql = "INSERT INTO subject (sub_id,sub_name,sem,dept_name) VALUES ('
	".$_POST["sub_id"]."','"
	.$_POST["sub_name"]."','"
	.$_POST["sem"]."','"
	.$_POST["branch"]."'"
	.") ";

	echo $sql;

	mysqli_query($db,$sql) or die(mysqli_error($db));
}
 

}
?>
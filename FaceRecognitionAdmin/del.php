

<?php
require_once "include/db_connect.php";


echo $id = $_GET['id'];
$del_qry = "DELETE FROM student WHERE stud_id = $id";
$result = mysqli_query($db,$del_qry);
if($result){
	echo "successfully deleted";
	//go to view all student
}
?>

<?php
require_once "include/db_connect.php";
echo "somthing";

echo $id = $_GET['id'];

if(isset($_POST['submit']))
{
	$stud_name = $_POST['stud_id'];
	$dept_name = $_POST['dept_name'];
	$sem = $_POST['sem'];
	$edit_qry = mysqli_query("UPDATE student SET stud_name = $stud_name, dept_name = $dept_name, sem = $sem WHERE stud_id = $id");
	if(!$edit_qry){
		echo mysql_error();
	}
	else{
		//go back to view all page
	}
}
?>

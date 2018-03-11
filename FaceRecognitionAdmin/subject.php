<?php
<<<<<<< HEAD

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
=======
require_once "include/db_connect.php";
require_once "include/validate.php";

$sub_id = $sub_name = $sem = $dept = "";
$sub_id_err = $sub_name_err = $sem_err = $dept_err = "";

if (isset($_POST["submit"])) {

    if (empty($_POST["sub_id"])) {
        $sub_id_err = "Subject ID is required";
    } else {
        $sub_id = validateData($_POST["sub_id"]);
    }

    if (empty($_POST["sub_name"])) {
        $sub_name_err = "Subject name is required";
    } else {
        $sub_name = validateData($_POST["sub_name"]);
        if (validateUsername($sub_name)) {
            $sub_name_err = "Please enter a valid subject name";
        }
    }

    if (empty($_POST["sem"])) {
        $sem_err = "Sem is required";
    } else {
        $sem = validateData($_POST["sem"]);
    }

    if (empty($_POST["dept"])) {
        $dept_err = "Department is required";
    } else {
        $dept = validateData($_POST["dept"]);
    }

    /*    $sql = "INSERT INTO subject (sub_id,sub_name,sem,dept_name) VALUES ('"
            . $_POST["sub_id"] . "','"
            . $_POST["sub_name"] . "','"
            . $_POST["sem"] . "','"
            . $_POST["branch"] . "'"
            . ") ";*/


    if (empty($sub_id_err) && empty($sub_name_err) && empty($sem_err) && empty($dept_err)) {
        $sql = "INSERT INTO 
                subject (sub_id,sub_name,sem,dept_name) 
            VALUES 
                ('$sub_id','$sub_name','$sem','$dept')";

        mysqli_query($db, $sql) or die(mysqli_error($db));
    }
}

>>>>>>> 05004f7af20c96ba61b1dccbc9d780fc6557c6f8
?>
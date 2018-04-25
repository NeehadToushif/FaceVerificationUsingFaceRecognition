<?php
$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');
                       

// confirm that the 'id' variable has been set
if (isset($_POST['id']))
{
// get the 'id' variable from the URL
$id = $_POST['id'];
// delete record from database
$query="DELETE FROM face_recognition.subject WHERE sub_id = '$id'";
$result = mysqli_query($db, $query);


if($result)
	echo "success";
else 
	echo "failed";           

}


<?php
$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');
$sem=$_POST['sem'];
$dept_name=$_POST['dept_name'];

/*$sem = 2;
$dept_name = 'EEE';*/

$sql="SELECT * FROM subject WHERE sem=$sem AND dept_name='$dept_name'";
$sub_array= array();

$result=mysqli_query($db,$sql);
while($row=mysqli_fetch_array($result)){
	array_push($sub_array, $row['sub_name']);
   }
 echo json_encode(array("sub"=>$sub_array));   
    
	
?>
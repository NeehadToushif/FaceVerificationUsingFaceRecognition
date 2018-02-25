<?php
$db=mysqli_connect('localhost','root','') or die('unable to connect .check the munachully parametrs');
mysqli_select_db($db,'face_recognition') or die(mysqli_error($db));

if(isset($_POST['submit'])){
	//header('Location:TeacherRegter.php');
$TeacherId=$_POST['id'];
$Name=$_POST['Name'];
$Password=$_POST['Password'];
$Designation=$_POST['Designation'];
$Dept_name=$_POST['Dept_name'];
$gender=$_POST['type'];



$query="INSERT INTO teacher(tea_id,tea_name,tea_pass,tea_desi,dept_name,tea_gender) VALUES ($TeacherId,'$Name','$Password','$Designation','$Dept_name','$gender')";
mysqli_query($db, $query) or die(mysqli_error($db));
}
?>



<html>
<head>
      <title>regitation</title>
	  <link rel="stylesheet" href="Tec_reg.css">
	  
</head>
<body>
<header>
     <h1>TeacherRegistation</h1>
</header>
<nav>
<form action="TeacherRegter.php" method="post">
    
  <label for="TeacherId" class="hidden-label">TeacherId</label>
  <input type="text" name="id" id="TeacherId" placeholder="TeacherId">
    
	
  <label for="Name" class="hidden-label">Name</label>
  <input type="Name" name="Name" id="Name" placeholder="Name">
  
  <label for="password" name="Password" class="hidden-label">Password</label>
  <input type="Password" name="Password" id="Password" placeholder="Password">
  
  
  <label for="Designation" name="Designation" class="hidden-label">Designation</label>
  <input type="text" name="Designation" id="Designation" placeholder="Enater Designation">
   
   
   <select>
  <?php
 $query="SELECT * FROM deperment";
 $result=mysqli_query($db, $query) or die(mysqli_error($db));
 while($row=mysqli_fetch_assoc($result)){
 $dept=$row['dept_name'];

	echo "<option>$dept</option>";

 }
  ?>
</select>  
  
   <input type="radio" name="type" value="m" checked="checked"/>Male<br/>
   <input type="radio" name="type" value="f" checked="checked"/>Female<br/>

	  <input type="submit" name="submit" value="sign-in">
	 
</form>
</nav>
</body>
</html>
<?php

$db=mysqli_connect('localhost','root','') or die('unable to connect .check the munachully parametrs');


mysqli_select_db($db,'face_recognition') or die(mysqli_error($db));

if($db){


	if(isset($_POST["submit"])) {
		

		   $image = $_FILES['photo']['tmp_name'];
		   //echo $image
        $imgContent = addslashes(file_get_contents($image));
        //echo $imgContent."\n";

	$sql = "INSERT INTO student (stud_id,stud_name,stud_pass,dept_name,sem,photo) VALUES ('
	".$_POST["reg"]."','"
	.$_POST["name"]."','"
	.$_POST["password"]."','"
	.$_POST["branch"]."',"
	.$_POST["batch"].",'"
	.$imgContent

	."') ";

// 	$sql = <<<QUERY
// INSERT INTO 
// 		student (stud_id,stud_name,stud_pass,dept_name,sem,photo) 
// VALUES ('{$_POST["reg"]}', '{}'


// QUERY;
	//echo $sql;

	mysqli_query($db,$sql) or die(mysqli_error($db));

//	echo "Success";

}
 

}
?>

<html>
<head>
    <title>regitation</title>
	<link rel="stylesheet" href="reg.css">
</head>
<body>
<header>
     <h1>STUDENT</h1>
</header>
<nav>
<form action = "register.php" method="post" enctype="multipart/form-data">
  <label for="name" class="hidden-label">Name</label>
  <input type="name" name="name" id="name" placeholder="name">
  
  <label for="reg" class="hidden-label">Registration no</label>
  <input type="text" name="reg" id="reg" placeholder="registration">
  

  
  <label for="password" name="password" class="hidden-label">Password</label>
  <input type="password" name="password" id="passoword" placeholder="Password">
   
   <label for="re-password" class="hidden-label">Re-Password</label>
   <input type="re-password" name="re-password" id="re-password" placeholder="re-password">
   
   <label for="branch" class="hidden-label">Branch</label>
	 <select name="branch" id="branch">
	      <option>initially view</option>
		  <option>CSE</option>
          <option>EEE</option>		  
          <option>ECE</option>		  
          <option>civil</option>		  
          <option>Aerospace</option>
     </select>
	 
	 <label for="batch" class="hidden-label">Year</label>
	 <input type="name" class="batch" name="batch" placeholder="batch">

   <label for = "photo" > Photo:  </label>
   <input type ="file" name= "photo" id = "photo" >
	  <input type="submit" value="sign-in" name="submit" id="submit">
	 
</form>
</nav>
</body>
</html>
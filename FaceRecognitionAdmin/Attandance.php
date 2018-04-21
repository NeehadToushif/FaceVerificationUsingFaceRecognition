<?php
require_once "include/db_connect.php";
	global $host;
	global $username;
	global $pasasword;
	?>


<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/index.css">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Attandance System</title>

</head>

<body>
<?php
require_once "html/header.html";
?>
<!--homeSection-->
<section id="action" class="py-4 mb-4 bg-light">

<div class="container">
    <div class="row">

            <div class="col-md-6 ml-auto">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="search">
                    <span class="input-group-btn">
									    <button class="btn btn-primary">Search</button>
									</span>
                </div>
            </div>
        </div>
    </div>



</section>
<div id="home-section">
        <div class="home-inner">
            <div class="container-fuild">
                <div class="row">
                    <div class="col-lg-8 d-none d-lg-block">


                        <table class="table table-striped">
					   <thead class="thead-inverse">
					     <tr>
						   <th>Subject Id</th>
						   <th>Student Id</th>
						   <th>Date</th>
						 </tr>
						</thead>

						<tbody>
						<?php

	if(isset($_GET["search"])){
	$search=$_GET['search'];

	$sql="SELECT * FROM student WHERE
	(Date LIKE '%".$search."%') OR
	(stud_name LIKE '%".$search."%') OR (Batch LIKE '%".$search."%')
	OR (sem LIKE '%".$search."%') OR (dept_name LIKE '%".$search."%')
	or (stud_id LIKE '%".$search."%')";

	} elseif(isset($_GET['submit'])){

		$sub_id='CSE70A';// how to get data from the input
		$DataTo='2018/03/01';//"
		$DateFrom='2018/03/08';//"

$sql="SELECT COUNT(*) as 'number_of_attendance' FROM attendance where sub_id = 'CSE70A' and date between '2018/03/01' and '2018/03/08'";
	 }	else{
		$sql = "SELECT * FROM attendance";}
    //echo $sql;
	$result = mysqli_query($db, $sql) or die(mysqli_error($db));

	while ($row=mysqli_fetch_assoc($result)){

	?>
	<?php
if($result){

	 while ($row = mysqli_fetch_array($result)) {
	 printf("%s",$row["number_of_attendance"]);
	 echo "</br>";

	 }
		?>
						  <tr>
							<td><?phpecho $row['sub_id']?></td>
							 <td><?phpecho $row['stud_id']?></td>
							 <td><?phpecho $row['date']?></td>
						  </tr>

<?php	}}?>
					     </tbody>
                         </table>
                    </div>

                    <div class="col-lg-4">
                        <div class="card text-center card-form">
						         <h4>Fill Up The From</h4>
                                <p>Only for teachers and Admin</p>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="get">
                                      <div class="form-group">
								  <!--<label for="title">subjectId</label>-->
								  <input type="text" name="SubjectId" class="form-control" placeholder="Subject Id"\>
								 </div>
								 <div class="form-group">
								  <!--<label for="title">date to</label>-->
								  <input type="date" name="DateTo" class="form-control" placeholder="Date To"\>
								 </div>
								 <div class="form-group">
								  <!--<label for="title">date from</label>-->
								  <input type="date" name="DateFrom" class="form-control" placeholder="Date from"\>
								 </div>

                                    <input type="submit" value="submit" class="btn btn-outline-light btn-block" name="submit">
                                </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--Author Section-->


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
/**
 * Created by PhpStorm.
 * User: garim
 * Date: 11-03-2018
 * Time: 17:19
 */
require_once "include/db_connect.php";

$sql = "SELECT stud_id,stud_name, dept_name, sem FROM student";

$result = mysqli_query($db, $sql) or die(mysqli_error($db));

$db->close();
?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>All_Student</title>
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <a href="home.html" class="navbar-brand"><strong>FaceReconization</strong> Darshboard</a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">


            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown mr-3">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user"></i> welcome brand
                    </a>

                    <div class="dropdown-menu">
                        <a href="profile.html" class="dropdown-item">
                            <i class="fa fa-user"></i>Profie
                        </a>

                        <a href="setting.html" class="dropdown-item">
                            <i class="fa fa-gear"></i> Setting
                        </a>
                    </div>
                </li>


                <li class="nav-item">
                    <a href="login.html" class="nav-link">
                        <i class="fa fa-user"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<header id="main-header" class="py-2 bg-info text-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1><i class="fa fa-pencil"></i>All Student</h1>
            </div>
        </div>
    </div>
</header>


<!--action-->
<section id="action" class="py-4 mb-4 bg-light">

<div class="container">
    <div class="row">
        <div class="col-md-2">
            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addpoststdmodel">
                <i class="fa fa-plus"></i> Add Student
            </a>
        </div>





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




<!--post-->
<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                        <tr>
                            <th>Registration No.</th>
                            <th>Student Name</th>
                            <th>Department Name</th>
                            <th>Semester</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($result) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $table_row = <<<TableRow
<tr>                <td>{$row['stud_id']}</td>
                    <td>{$row['stud_name']}</td>
                    <td>{$row['dept_name']}</td>
                    <td>{$row['sem']}</td>
                    <td><a href="#" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>
                        <a href="#" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a>
                    </td>
                </tr>

TableRow;
                                echo $table_row;
                            }
                        } ?>
                        </tbody>
                    </table>

                    <nav class="ml-4">
                        <ul class="pagination">
                            <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                            <li class="page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="page-item"><a href="#" class="page-link">2</a></li>
                            <li class="page-item"><a href="#" class="page-link">3</a></li>
                            <li class="page-item"><a href="#" class="page-link">next</a></li>
                        </ul>
                    </nav>

                </div>
            </div>
        </div>
    </div>
</section>


<!---footer-->
<footer id="main-footer" class="bg-dark text-white mt-5 p-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <p class="lead text-center">Copyright &copy:10.03.2018 </p>
            </div>
        </div>
    </div>
</footer>


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
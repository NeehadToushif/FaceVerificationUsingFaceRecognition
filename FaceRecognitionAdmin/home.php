<?php
include_once "include/db_operations.php";
//echo '<script>console.log("Hi")</script>';
if (isset($_POST['submit'])) {
    switch ($_POST['submit']) {
        case 'Save student':
            addStudent();
            break;
        case 'Save teacher':
            addTeacher();
            break;
        case 'Save subject':
            addSubject();
            break;
        case 'Save branch':
            addBranch();
            break;
    }
}

?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/modal.css" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Home</title>
</head>
<body>
<?php include_once 'html/header.html'; ?>

<!--Actions-->
<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addpoststdmodel">
                    <i class="fa fa-plus"></i>Add Student
                </a>
            </div>
            <!--<div class="col-md-3">
                <a href="#" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#addpostteamodel">
                    <i class="fa fa-plus"></i>Add Teachers
                </a>
            </div>-->
            <div class="col-md-4">
                <a href="#" class="btn btn-success btn-block" data-toggle="modal" data-target="#addpostbramodel">
                    <i class="fa fa-plus"></i>Add Branch
                </a>
            </div>
            <div class="col-md-4">
                <a href="#" class="btn btn-secondary btn-block" data-toggle="modal" data-target="#addpostsubmodal">
                    <i class="fa fa-plus"></i>Add Subject
                </a>
            </div>
        </div>
    </div>
</section>

<!-- models student-->
<?php include_once "html/student_model.php"; ?>

<!-- models teacher-->
<?php /*include_once "html/teacher_model.html"; */?>

<!-- models Branch-->
<?php include_once "html/branch_model.html"; ?>

<!---Models Subject-->
<?php include_once "html/subject_model.php"; ?>

<!--post-->
<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Post</h4>
                    </div>
                    <table class="table table-striped">
                        <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Date post</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td Scope="row"></td>
                            <td>Post one</td>
                            <td>Webdevlopement</td>
                            <td>okay</td>
                            <td><a href="details.html" class="btn btn-secondary">
                                    <i class="fa fa-angle-double-right"></i>
                                    Details</a></td>
                        </tr>
                        <tr>
                            <td Scope="row"></td>
                            <td>Post one</td>
                            <td>Webdevlopement</td>
                            <td>okay</td>
                            <td><a href="details.html" class="btn btn-secondary">
                                    <i class="fa fa-angle-double-right"></i>
                                    Details</a></td>
                        </tr>
                        <tr>
                            <td Scope="row"></td>
                            <td>Post one</td>
                            <td>Webdevlopement</td>
                            <td>okay</td>
                            <td><a href="details.html" class="btn btn-secondary">
                                    <i class="fa fa-angle-double-right"></i>
                                    Details</a></td>
                        </tr>
                        <tr>
                            <td Scope="row"></td>
                            <td>Post one</td>
                            <td>Webdevlopement</td>
                            <td>okay</td>
                            <td><a href="details.html" class="btn btn-secondary">
                                    <i class="fa fa-angle-double-right"></i>
                                    Details</a></td>
                        </tr>
                        <tr>
                            <td Scope="row"></td>
                            <td>Post one</td>
                            <td>Webdevlopement</td>
                            <td>okay</td>
                            <td><a href="details.html" class="btn btn-secondary">
                                    <i class="fa fa-angle-double-right"></i>
                                    Details</a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            <div class="col-md-3">
                <div class="card text-center bg-info text-white mb-3">
                    <div class="card-body">
                        <h3>TOTAL STUDENT</h3>
                        <h1 class="display-4">
                            <i class="fa fa-pencil"></i>6
                        </h1>
                        <a href="view_all.php?view=Student" class="btn btn-outline-light btn-sm">VIEW</a>
                    </div>
                </div>

                <div class="card text-center bg-warning text-white mb-3">
                    <div class="card-body">
                        <h3>TOTAL BRANCH</h3>
                        <h1 class="display-4">
                            <i class="fa fa-users"></i>6
                        </h1>
                        <a href="view_all.php?view=Branch" class="btn btn-outline-light btn-sm">VIEW</a>
                    </div>
                </div>

                <div class="card text-center bg-primary text-white mb-3">
                    <div class="card-body">
                        <h3>TOTAL SUBJECT</h3>
                        <h1 class="display-4">
                            <i class="fa fa-folder-open-o"></i>6
                        </h1>
                        <a href="view_all.php?view=Subject" class="btn btn-outline-light btn-sm">VIEW</a>
                    </div>
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
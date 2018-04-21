<?php
include_once 'include/db_connect.php';
include_once "include/validate.php";

$tea_id = $tea_pass = "";
$tea_id_err = $tea_pass_err = "";

if(isset($_POST['submit'])) {
    if(isset($_POST['id'])) {
        $tea_id = $_POST['id'];
    } else {
        $tea_id_err = "Please enter a valid email";
    }

    if(isset($_POST['password'])) {
        $tea_pass = $_POST['password'];
    } else {
        $tea_pass_err = "Please enter a valid password";
    }

    if($tea_id_err == "" && $tea_pass_err == "") {
        $query = "SELECT COUNT(tea_id) AS count FROM teacher WHERE tea_id = $tea_id AND tea_pass = '$tea_pass'";

        echo $query;

        $result = mysqli_query($db, $query) or die(mysqli_error($db));

        $rows = mysqli_fetch_assoc($result);


        if($rows['count'] > 0) {
            header("Location: home.php");
        } else {
            echo "Invalid username and password";
        }
    }

}


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
    <title>Hello, world!</title>

</head>

<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top text-left">

    <a class="navbar-brand" href="#">Face Reconization</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


</nav>

<!--homeSection-->
<div id="home-section">
    <div class="dark-overlay">
        <div class="home-inner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 d-none d-lg-block">
                        <h1 class="display-4">Build your own <strong>Attandance Profile</strong> by your
                            <strong>self </strong></h1>
                        <div class="d-flex flex-row">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                To do attandance management you need a andriod phone
                            </div>

                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Download our appliaction form playstore
                            </div>

                        </div>
                        <div class="d-flex flex-row">
                            <div class="p-4 align-self-start">
                                <i class="fa fa-check"></i>
                            </div>
                            <div class="p-4 align-self-end">
                                Take a selfe and update your attandance
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card bg-primary text-center card-form">
                            <div class="card-body">
                                <h3>Sign In</h3>
                                <p>Only for teachers and Admin</p>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-lg" name="id" value="" placeholder="User ID">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-lg"
                                               name="password" value="" placeholder="Password">
                                    </div>
                                    <input type="submit" class="btn btn-outline-light btn-block" name="submit">
                                </form>
                            </div>
                        </div>
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

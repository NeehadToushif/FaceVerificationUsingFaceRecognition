<?php
require_once "include/db_connect.php";
require_once "include/validate.php";

$name = $password = $dept = $batch = "";
$name_err = $password_err = $dept_err = $batch_err = "";

if (isset($_POST["submit"])) {

    if (empty($_POST["name"])) {
        $name_err = "Name is required";
    } else {
        $name = validateData($_POST["name"]);
        if (validateUsername($name)) {
            $name_err = "Please enter a valid name";
        }
    }

    if (empty($_POST["password"])) {
        $password_err = "Password is required";
    } else {
        $password = validateData($_POST["password"]);
    }

    if (empty($_POST["dept"])) {
        $dept_err = "Department is required";
    } else {
        $dept = validateData($_POST["dept"]);
    }

    if (empty($_POST["batch"])) {
        $batch_err = "Batch is required";
    } else {
        $batch = validateData($_POST["batch"]);
    }

    $image = $_FILES['photo']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    /*$sql = "INSERT INTO student (stud_id,stud_name,stud_pass,dept_name,sem,photo) VALUES ('
        " . $_POST["reg"] . "','"
            . $_POST["name"] . "','"
            . $_POST["password"] . "','"
            . $_POST["branch"] . "',"
            . $_POST["batch"] . ",'"
            . $imgContent
            . "') ";*/

    if(empty($name_err) && empty($password_err) && empty($dept_err) && empty($batch_err)) {

        $sql = "INSERT INTO 
                student (stud_name, stud_pass, dept_name, sem, photo) 
            VALUES
                ('$name','$password','$dept',$batch,'$imgContent')";

        mysqli_query($db, $sql) or die(mysqli_error($db));
    }
}

?>

<html>
<head>
    <title>regitation</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
<header>
    <h1>STUDENT</h1>
</header>
<nav>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <label for="name" class="hidden-label">Name</label>
        <input type="text" name="name" id="name" placeholder="name">

        <label for="reg" class="hidden-label">Registration no</label>
        <input type="text" name="reg" id="reg" placeholder="registration">


        <label for="password" class="hidden-label">Password</label>
        <input type="password" name="password" id="password" placeholder="Password">

        <label for="re-password" class="hidden-label">Re-Password</label>
        <input type="text" name="re-password" id="re-password" placeholder="re-password">

        <label for="dept" class="hidden-label">Branch</label>
        <select name="dept" id="dept">
            <option>initially view</option>
            <option>CSE</option>
            <option>EEE</option>
            <option>ECE</option>
            <option>civil</option>
            <option>Aerospace</option>
        </select>

        <label for="batch" class="hidden-label">Year</label>
        <input type="text" class="batch" name="batch" placeholder="batch">

        <label for="photo"> Photo: </label>
        <input type="file" name="photo" id="photo">
        <input type="submit" value="sign-in" name="submit" id="submit">

    </form>
</nav>
</body>
</html>
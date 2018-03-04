<?php
require_once "include/db_connect.php";
require_once "include/validate.php";

$name = $dept_name = $designation = $password = $gender = "";
$name_err = $dept_err = $designation_err = $password_err = $gender_err = "";

if (isset($_POST['submit'])) {

    if(empty($_POST['name'])) {
        $name_err = "Name is required";
    } else {
        $name = validateData($_POST['name']);
        if(!validateUsername($name)) {
            $name_err = "Please enter a valid name";
        }
    }

    if(empty($_POST['password'])) {
        $password_err = "Password is required";
    } else {
        $password = validateData($_POST['password']);
    }

    if(empty($_POST['designation'])) {
        $designation_err = "Designation is required";
    } else {
        $designation = validateData($_POST['designation']);
    }

    if(empty($_POST['dept'])) {
        $dept_err = "Department is required";
    } else {
        $dept_name = validateData($_POST['dept']);
    }

    if (empty($_POST['gender'])) {
        $gender_err = "Gender is required";
    } else {
        $gender = validateData($_POST['gender']);
    }

    if (empty($name_err) && empty($password_err) && empty($designation_err) && empty($dept_err) && empty($gender_err)) {
        $query = "INSERT INTO 
                      teacher(tea_name,tea_pass,tea_desi,dept_name,tea_gender) 
                  VALUES 
                      ('$name','$password','$designation','$dept_name','$gender')";

        mysqli_query($db, $query) or die(mysqli_error($db));
    }
}

?>


<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="css/teacher.css">

</head>
<body>
<header>
    <h1>TeacherRegistation</h1>
</header>
<nav>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

        <label for="TeacherId" class="hidden-label">TeacherId</label>
        <input type="text" name="teacher_id" id="teacher_id" placeholder="TeacherId">


        <label for="name" class="hidden-label">Name</label>
        <input type="text" name="name" id="name" placeholder="Name">

        <label for="password" name="password" class="hidden-label">Password</label>
        <input type="Password" name="password" id="password" placeholder="Password">


        <label for="Designation" name="Designation" class="hidden-label">Designation</label>
        <input type="text" name="designation" id="designation" placeholder="Enater Designation">


        <select name="dept">
            <?php
            $query = "SELECT * FROM department";
            $result = mysqli_query($db, $query) or die(mysqli_error($db));
            while ($row = mysqli_fetch_assoc($result)) {
                $dept = $row['dept_name'];

                echo "<option>$dept</option>";

            }
            ?>
        </select>

        <input type="radio" name="gender" value="m" checked="checked"/>Male<br/>
        <input type="radio" name="gender" value="f" checked="checked"/>Female<br/>

        <input type="submit" name="submit" value="sign-in">
    </form>
</nav>
</body>
</html>
<?php
require_once "db_connect.php";

function addStudent()
{
    global $db;
    $image = $_FILES['image']['tmp_name'];
    //$image = $_FILES['image']['tmp_name'];
    $imgContent = addslashes(file_get_contents($image));

    // TODO: blob is not inserted
    $sql = "INSERT INTO
                student (stud_id, stud_name, stud_pass, dept_name, sem, photo)
              VALUES (
                ?, ?, ?, ?, ?, ?
              )";
    //echo $imgContent;
    /*$stmt = mysqli_prepare($db, $sql) or die(mysqli_error($db));

    mysqli_stmt_bind_param($stmt, 'ssssib',$_POST['reg_no'], $_POST['stud_name'], $_POST['stud_pass']
        , $_POST['dept_name'], $_POST['sem'], $imgContent);

    print_r($stmt);

    mysqli_stmt_execute($stmt);*/

    $stmt = $db->prepare($sql) or die(mysqli_error($db));



    $stmt->bind_param('ssssib',$_POST['reg_no'], $_POST['stud_name'], $_POST['stud_pass']
        , $_POST['dept_name'], $_POST['sem'], $imgContent);

    $stmt->execute();
    print_r($stmt->fullQuery);

    //mysqli_stmt_execute($stmt);
}

//insert into teacher
function addTeacher()
{
    global $db;
    $sql = "INSERT INTO teacher (tea_name,tea_pass,tea_desi,dept_name,tea_gender) VALUES ('
	" . $_POST["name"] . "','"
        . $_POST["password"] . "','"
        . $_POST["designation"] . "','"
        . $_POST["Branch"] . "','"
        . $_POST["sex"] . "') ";
    echo $sql;

    mysqli_query($db, $sql) or die(mysqli_error($db));
}

function addBranch()
{
    global $db;
    $sql = "INSERT INTO department VALUES ('{$_POST["branch_id"]}')";

    mysqli_query($db, $sql) or die(mysqli_error($db));
}

function addSubject()
{
    global $db;
    $sql = "INSERT INTO subject (sub_name,sub_id,sem,dept_name) VALUES ('{$_POST['sub_name']}','{$_POST["sub_id"]}',
{$_POST["sem"]},'{$_POST["dept_name"]}') ";

    mysqli_query($db, $sql) or die(mysqli_error($db));
}


function readDepartment() {
    global $db;
    $sql = "SELECT * FROM department";
    $result = mysqli_query($db, $sql) or die(mysqli_error($db));

    return $result;
}

?>

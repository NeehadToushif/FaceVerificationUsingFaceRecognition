<?php
$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $query="SELECT * FROM face_recognition.student WHERE stud_id='$id'";
    $result = mysqli_query($db,$query);
    $data="";

    $row = mysqli_fetch_assoc($result);
}
if( isset($_POST['submit']) )
{
    $id      = $_POST['id'];
    $sql = <<<UP
        UPDATE face_recognition.student SET stud_name='{$_POST['stud_name']}',stud_pass='{$_POST['stud_pass']}',dept_name='{$_POST['stud_dept']}',sem={$_POST['sem']},photo='{$_POST['image']}'  WHERE stud_id='{$id}';
UP;
    $result     = mysqli_query($db, $sql);

    if(result) {
        header("Location:  view_all.php?view=Student");
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

    <title></title>
</head>
<body>
<?php include_once 'html/header.html'; ?>


    
        <div class="modal-content">
            <div class="mode-header bg-primary text-white">
                <h5 class="modal-title">ADD STUDENT</h5>
                
            </div>
            <form action="edit_student.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="stud_name">Name</label>
                        <input type="text" id="stud_name" name="stud_name" class="form-control" placeholder="Name" value="<?php echo $row['stud_name'];?>">
                    </div>
                    <div class="form-group">
                        <label for="reg_no">Registation No.</label>
                        <input type="text" id="reg_no" name="id" class="form-control" placeholder="Registration No" value="<?php echo $row['stud_id'];?>">
                    </div>

                    <div class="form-group">
                        <label for="stud_pass">Password</label>
                        <input type="text" id="stud_pass" name="stud_pass" class="form-control" placeholder="Password" value="<?php echo $row['stud_pass'];?>">
                    </div>
                        <div class="form-group">
                        <label for="dept_name">Department</label>
                        <label>Branch :</label>
                            <input type="text" id="stud_pass" name="stud_dept" class="form-control" placeholder="Password" value="<?php echo $row['dept_name'];?>">
                    </div>

                    <div class="form-group">
                        <label for="sem">Semester</label>
                        <input type="text" id="sem" name="sem" class="form-control" placeholder="Semester" value="<?php echo $row['sem'];?>">
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="text" id="image" name="image" class="form-control-file" value="<?php echo $row['photo'];?>">
                        <small clan="form-text text-method">Max Size 5mb</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" value="Save student" class="btn btn-success"/>
                </div>
            </form>
        </div>


   

   <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
    <script src="https://markcell.github.io/jquery-tabledit/"></script>

</body>
</html>
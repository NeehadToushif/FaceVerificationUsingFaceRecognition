<?php
$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    
    $query="SELECT * FROM face_recognition.subject WHERE sub_id='$id';";
    $result = mysqli_query($db,$query);
    $data="";

    $row = mysqli_fetch_assoc($result);
}
if( isset($_POST['submit']) )
{
    $id      = $_POST['id'];
    $sql = <<<UP
        UPDATE face_recognition.subject SET sub_name='{$_POST['sub_name']}',sem='{$_POST['sem']}',dept_name='{$_POST['dept_name']}' WHERE sub_id='{$id}';
UP;
    $result     = mysqli_query($db, $sql);

    if(result) {
        header("Location:  view_all.php?view=SUBJECT");
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
                <h5 class="modal-title">ADD SUBJECT</h5>
                
            </div>
            <form action="edit_subject.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="stud_name">Subject ID</label>
                        <input type="text" id="sub_id" name="sub_id" class="form-control" placeholder="sub_id" value="<?php echo $row['sub_id'];?>">
                    </div>
                    <div class="form-group">
                        <label for="reg_no">Subject Name</label>
                        <input type="text" id="sub_name" name="sub_name" class="form-control" placeholder="sub_name" value="<?php echo $row['sub_name'];?>">
                    </div>

                    <div class="form-group">
                        <label for="stud_pass">Semester</label>
                        <input type="text" id="sem" name="sem" class="form-control" placeholder="sem" value="<?php echo $row['sem'];?>">
                    </div>
                        <div class="form-group">
                        <label for="dept_name">Department</label>
                        <label>Branch :</label>
                            <input type="text" id="dept_name" name="dept_name" class="form-control" placeholder="dept_name" value="<?php echo $row['dept_name'];?>">
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
<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/manage.css" type="text/css">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<?php include_once 'html/header.html'; ?>
<!-- models student-->
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="mode-header bg-primary text-white">
                <h5 class="modal-title">MANAGE STUDENT ATTENDANCE</h5>
                
            </div>
            <form action="home.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="stud_name">Name</label>
                        <input type="text" id="stud_name" name="stud_name" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <label for="reg_no">Registation No.</label>
                        <input type="text" id="reg_no" name="reg_no" class="form-control" placeholder="Registration No">
                    </div>

                    <div class="form-group">
                        <label for="dept_name">Department</label>
                        <label>Branch :</label>
                            <select name="Branch" class="form-control input-lg" id='branch' onchange="setBranch()">
                                <option value="-1">Select a department</option>
                                <option value="CSE">CSE</option>
                                <option value="IT">IT</option>
                                <option value="ME">MECHANICAL</option>
                                <option value="CE">CIVIL</option>
                                <option value="EEE">EEE</option>
                                <option value="ECE">ECE</option>
                                <option value="AE">AEROSPACE</option>
      
                            </select>
                    </div>

                    <div class="form-group">
                        <label for="sub_id">Subject ID</label>
                        <input type="text" id="sub_id" name="sub_id" class="form-control" placeholder="Subject ID">
                    </div>

                                       
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" value="Save student" class="btn btn-success" id="save"/>
                </div>
            </form>
        </div>
       </div> 
</body>
</html>
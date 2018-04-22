<div class="modal fade" id="addpoststdmodel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="mode-header bg-primary text-white">
                <h5 class="modal-title">ADD STUDENT</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span></button>
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
                        <label for="stud_pass">Password</label>
                        <input type="text" id="stud_pass" name="stud_pass" class="form-control" placeholder="Password">
                    </div>

                    <div class="form-group">
                        <label for="dept_name">Department</label>
                        <select name="dept_name" id="dept_name">
                            <?php
                            //include "../include/db_operations.php";

                            $rows = readDepartment();

                            while ($row = mysqli_fetch_assoc($rows)) {
                                echo '<option value="' . $row['dept_name'] . '">' . $row['dept_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="sem">Semester</label>
                        <input type="text" id="sem" name="sem" class="form-control" placeholder="Semester">
                    </div>

                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" id="image" name="image" class="form-control-file">
                        <small clan="form-text text-method">Max Size 5mb</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" value="Save student" class="btn btn-success"/>
                </div>
            </form>
        </div>
    </div>
</div>

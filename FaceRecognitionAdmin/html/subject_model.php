<div class="modal fade" id="addpostsubmodal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="mode-header bg-danger text-white">
                <h5 class="modal-title">ADD Subject</h5>
                <button class="close" data-dismiss="modal">
                    <span>&times;</span></button>
            </div>
            <form action="home.php" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="sub_name">Subject Name</label>
                        <input type="text" name="sub_name" id="sub_name" class="form-control"
                               placeholder="Subject name">
                    </div>

                    <div class="form-group">
                        <label for="sub_id">Subject Id</label>
                        <input type="text" name="sub_id" id="sub_id" class="form-control" placeholder="Subject Id">
                    </div>

                    <div class="form-group">
                        <label for="sem">Semester</label>
                        <input type="text" name="sem" id="sem" class="form-control" placeholder="Semester">
                    </div>

                    <div class="form-group">
                        <label for="dept_name">Department</label>
                        <select name="dept_name" id="dept_name">
                            <?php
                            include "../include/db_operations.php";

                            $rows = readDepartment();

                            while ($row = mysqli_fetch_assoc($rows)) {
                                echo '<option value="' . $row['dept_name'] . '">' . $row['dept_name'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit" value="Save subject" class="btn btn-success"/>
                </div>
            </form>
        </div>
    </div>
</div>
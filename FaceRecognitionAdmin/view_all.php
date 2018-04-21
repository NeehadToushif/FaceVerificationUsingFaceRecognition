<?php
/**
 * User: garim
 * Date: 11-03-2018
 * Time: 17:19
 */
ini_set('display_errors', 1);
error_reporting(E_ALL|E_STRICT);
require_once "include/db_connect.php";

if (isset($_GET['view'])) {
    switch ($_GET['view']) {
        case 'Subject':
            $sql = "SELECT * FROM subject";
            $table = <<<TableHeader
<thead class="thead-inverse">
                        <tr>
                            <th>Subject ID</th>
                            <th>Subject</th>
                            <th>Department</th>
                            <th>Sem</th>
                        </tr>
                        </thead>
<tbody>
TableHeader;
            break;
        case 'Branch':
            $sql = "SELECT * FROM department";
            $table = <<<TableHeader
<thead class="thead-inverse">
                        <tr>
                            <th>Department</th>
                        </tr>
                        </thead>
<tbody>
TableHeader;
            break;
        case 'Student':
            $sql = "SELECT * FROM student";
            $table = <<<TableHeader
<thead class="thead-inverse">
                        <tr>
                            <th>Reg No.</th>
                            <th>Student Name</th>
                            <th>Department Name</th>
                            <th>Semester</th>
                        </tr>
                        </thead>
<tbody>
TableHeader;
            break;
    }

    $result = mysqli_query($db, $sql) or die(mysqli_error($db));

    $db->close();
}


?>

<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>View <?php echo $_GET['view']; ?></title>

    <style type="text/css">
        .actions {
            float: right;
        }

    </style>
</head>
<body>
<?php include_once "html/header.html"; ?>

<!--action-->
<section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="row">
            <?php /*include "html/student_model.php"; */?>
            <div class="col-md-6 ml-auto">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="search">
                    <span class="input-group-btn">
									    <button class="btn btn-primary">Search</button>
									</span>
                </div>
            </div>
        </div>
    </div>
</section>


<!--post-->
<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>All <?php echo $_GET['view']; ?></h4>
                    </div>
                    <table class="table table-striped">
                        <?php
                        echo $table;
                        if ($result) {
                            switch ($_GET['view']) {
                                /********************************************************
                                 * Display student data
                                 *********************************************************/
                                case 'Student':
                                    while ($row = $result->fetch_assoc()) {
                                        $table = <<<TableRow
<tr>
<td>{$row['stud_id']}</td>
                    <td>{$row['stud_name']}</td>
                    <td>{$row['dept_name']}</td>
                    <td>{$row['sem']}</td>
                    <td class="actions"><a href="#" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>
                        <a href="#" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a>
                    </td>
                </tr>

TableRow;

                                        echo $table;
                                    }
                                    break;

                                /*********************************************************************
                                 * Display subject data
                                 ******************************************************************* */
                                case 'Subject':
                                    while ($row = $result->fetch_assoc()) {
                                        $table = <<<TableRow
<tr>
<td>{$row['sub_id']}</td>
                    <td>{$row['sub_name']}</td>
                    <td>{$row['dept_name']}</td>
                    <td>{$row['sem']}</td>
                    <td class="actions"><a href="#" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>
                        <a href="#" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a>
                    </td>
                </tr>

TableRow;

                                        echo $table;
                                    }
                                    break;

                                /**************************************************************
                                 * Display branch data
                                 ****************************************************************/
                                case 'Branch':
                                    while ($row = $result->fetch_assoc()) {
                                        $table = <<<TableRow
                <tr>
                    <td>{$row['dept_name']}</td>
                    <td class="actions"><a href="#" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span> Edit
                        </a>
                        <a href="#" class="btn btn-info btn-xs">
                            <span class="glyphicon glyphicon-remove"></span> Remove
                        </a>
                    </td>
                </tr>
TableRow;
                                        echo $table;
                                    }
                                    break;
                            }
                        }
                        ?>

                        </tbody>
                    </table>

                </div>
                </header>
            </div>
            <div class="container">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active">
      <span class="page-link">
        2
        <span class="sr-only">(current)</span>
      </span>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
</body>
</html>

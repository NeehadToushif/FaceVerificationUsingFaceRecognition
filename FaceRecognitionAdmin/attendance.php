<html>
<?php
$db=mysqli_connect('localhost','root','','face_recognition') or die('unable to connect .check the munachully parametrs');
?>
<head>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">     
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <style>
table {
    width:30%;
}

/*table, th, td {
  margin-left: 1100px;
  margin-top: -400px;
    border: 1px solid black;
    border-collapse: collapse;
}*/
/*th, td {
    padding: 15px;
    text-align: left;
}*/
/*table#t01 tr:nth-child(even) {
    background-color: #eee;
}
table#t01 tr:nth-child(odd) {
   background-color: #fff;
}
table#t01 th {
    background-color: black;
    color: white;
}
.card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    width: 40%;
}*/
</style>
	</head>


<body>
	<?php include_once 'html/header.html'; ?>
	<center><h1>View Attendance</h1></center>
  <br/>
  <br/>

<div class="col-lg-12 col-md-12">
  <div class="col-lg-4 col-md-4" style="float: left;">
    <div class="card">
    <div class="card-body">


    <label>Semester :</label>
    <select name="Semester" id='semester' class="form-control input-sm" onchange="setSem()">
    <option value="-1">Select a semester</option>
      <option value="1">I</option>
      <option value="2">II</option>
      <option value="3">III</option>
      <option value="4">IV</option>
      <option value="5">V</option>
      <option value="6">VI</option>
      <option value="7">VII</option>
      <option value="8">VIII</option>
    </select>
    <br>

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
    <br>

    <label>Subject :</label>
    <select name="subject" class="form-control input-lg" id='subject'>
      
      
    </select>
    <br>
      
    <button id="submit" name="submit" value="Enter Details">Submit</button>



    </div>
  </div>
</div>

<!-- <div class="col-lg-8 col-md-8" style="float: left;">
      <table class="table table-bordered">
        <tr>
          <th >Registration_No</th>
          <th >Stud_Name</th>
          <th >Attendance Count</th>
        </tr>
       
        
      </table>
  </div>   -->

  <section id="posts">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Attendance
                         <a href="mark_student.php?view=Manage Student" class="btn btn-info btn-xs" style='float:right' >
                         <span class="glyphicon glyphicon-remove"></span> Add Student
                        </a>
                        </h4>
                
                    </div>
                    <table class="table table-striped" id="table-data">

                      <tr>
                          <th >Registration_No</th>
                          <th >Stud_Name</th>
                          <th >Attendance Count</th>
                    </tr>
                                 

                        </tbody>
                    </table>

                </div>
                </header>
            </div>
</div>

<script type="text/javascript" src="./js/jquery-3.3.1-core.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js"></script>
<script type='text/javascript'>
      var isBranchSet = false;
      var isSemSet = false;
        
      function setBranch() {
      	isBranchSet = true;

		console.log("Sem: "+isSemSet);
      	console.log("Branch: "+isBranchSet);

      	if(isSemSet) {
      		// TODO: call the api
      		loadSubject();
      	}

      }

      function setSem() {
      	isSemSet = true;

      	console.log("Sem: "+isSemSet);
      	console.log("Branch: "+isBranchSet);

      	if(isBranchSet) {
      		// TODO: call the api
      		loadSubject();
      	}
      }

      function loadSubject() {
      	//var sub = ["Maths", "Data Structure", "Cloud Computing"]
        var sem = $('#semester').val();
         var dept_name = $('#branch').val();
         var obj = {
       sem:sem,
       dept_name:dept_name
   };

   console.log(obj);

$.ajax({ 
   type    : "POST",
   url     : "subjectList.php",
   dataType: "json",
   data: obj,  
   success:function(data) {
      console.log(data);

       var subcatSelect = document.getElementById("subject")
        //subcatSelect.onchange = updateSubSubCats;;
        for(var i = 0; i < data['sub'].length; i++){
          subcatSelect.options[i] = new Option(data['sub'][i]);
        }

   }
})

        
      }

      

   </script>
<script>

    $("#submit").on('click', function(){

var sub_name = $('#subject').val();
$.ajax({ 
   type    : "POST",
   url     : "submit.php",
   data: {sub_name:sub_name } ,
   success:function(data) {
      console.log(data);
      $('table').html(data);

   },
   error: function(err) {
    console.log(err.message);
   }
})
        
    });

</script>

</body>
</html>
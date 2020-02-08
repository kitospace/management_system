<?php
include('ADS_Connection.php');
$change_mode='save';

if(isset($_POST)){
		if(isset($_POST['mode']) && $_POST['mode']=='save'){
		$name=$_POST['name'];	
		$year=$_POST['year'];
		$branch=$_POST['branch'];
		$phone_no=$_POST['phone_no'];
		$email=$_POST['email'];
		$marks=$_POST['marks'];
		$department=$_POST['department'];
		$mentor=$_POST['mentor'];
		echo $sql="INSERT INTO ads_result_info SET name='$name',year='$year', branch='$branch',  phone_no='$phone_no', email='$email',  marks='$marks',department='$department', mentor='$mentor'";
		if (mysqli_query($conn, $sql)) {
			header('Location:ADS_JSS.php?mode=new');
		}else {
			echo "Error: " . $sql . "<br>". mysqli_error($conn);
	}
	}
}

if(isset($_POST)){
	if(isset($_POST['mode']) && $_POST['mode']=='update' ){
		$name=$_POST['name'];	
		$year=$_POST['year'];
		$branch=$_POST['branch'];
		$phone_no=$_POST['phone_no'];
		$email=$_POST['email'];
		$marks=$_POST['marks'];
		$department=$_POST['department'];
		$mentor=$_POST['mentor'];	
		$hsn_code=$_POST['hsn_code'];
		$update_key=$_POST['update_key'];
		$sql="UPDATE ads_result_info SET name='$name',year='$year', branch='$branch', phone_no='$phone_no', email='$email',  marks='$marks', department='$department', mentor='$mentor' WHERE id='$update_key'";
		if(mysqli_query($conn, $sql)){
			header('Location:ADS_JSS.php?item_id='.$update_key.'&mode=info');
		}else {
			echo "Error: ".$sql."<br>".mysqli_error($conn);
		}
	}
}

if(isset($_GET)){
	if(isset($_GET['mode'])&&$_GET['mode']=='edit'){
		$item_id=$_GET['item_id'];
		$sql= "SELECT * FROM ads_result_info WHERE id='$item_id'";
		$result= mysqli_query($conn, $sql);
		if(mysqli_num_rows($result)>0){
			while($row = mysqli_fetch_assoc($result)){
				$name=$row['name'];	
				$year=$row['year'];
				$branch=$row['branch'];
				$phone_no=$row['phone_no'];
				$email=$row['email'];
				$marks=$row['marks'];
				$department=$row['department'];
				$mentor=$row['mentor'];
				$interview=$row['interview'];

			}
		}	
	$change_mode='update';
		
	}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>ADS INFO DATA</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="js/new_bootstrap.js"></script>
  <script src="js/bootstrap.js"></script>
  <script>
    function submitPackinfo(){
		var d=document.ads_jss_form;
		var name=d.name.value;
		var year=d.year.value;
		var branch=d.branch.value;
		var phone_no=d.phone_no.value;
		var email=d.email.value;
		var marks=d.marks.value;
		var department=d.department.value;

				d.action='';
				d.submit();
	}
  </script>
  <style>
  body {
 
  background-image: url("C:/Users/user/Downloads/wallpaper3.jpg");

  background-position: center;
  background-repeat: no-repeat;
  }
  </style>
</head>
<body>
<?php
include('Nav.php');
?>


<div class="container" background-image: url("C:\Users\user\Downloads\wallpaper3.jpg");>


  <div class="panel panel-default">
    <div class="panel-heading"><h3 align="Left"><u>ADS RECURITEMENT INFO MASTER</u></H1></div>
    <div class="panel-body">
	<form name="ads_jss_form" action="ADS_JSS.php" method="post" onSubmit="return false;">
	
	
	
  <div class="form-group row">
  <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
    <label for="name" class="col-sm-6 col-md-6 col-lg-6 col-xs-6 col-form-label" >NAME : </label></div>
    <div class="form-group col-sm-4 col-lg-4 col-xs-4 col-md-4">
       <input type="text" class="form-control" id="name" name="name" placeholder="Enter Student Name" value="<?php echo (isset($name))?$name:'';?>">
	  </div></div>
	  
	  
	  <div class="form-group row">
  <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
    <label for="year" class="col-sm-6 col-md-6 col-lg-6 col-xs-6 col-form-label" >YEAR : </label></div>
    <div class="form-group col-sm-4 col-lg-4 col-md-4 col-xs-4">
      <select class="form-control" id="year" name="year">
		<option selected="selected" >Select Student Year</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
      </select>
	  <?php
	if(isset($_POST['year'])) {
	  echo "selected year: ".htmlspecialchars($_POST['year']);
	}
	?>
    </div></div>
	
	
	<div class="form-group row">
  <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
    <label for="branch" class="col-sm-6 col-md-6 col-lg-6 col-xs-6 col-form-label" >BRANCH : </label></div>
    <div class="form-group col-sm-4 col-lg-4 col-md-4 col-xs-4">
      <select class="form-control" id="branch" name="branch">
		<option selected="selected" >Select Student Branch</option>
        <option value="CS">Computer Science</option>
		<option value="CE">Civil</option>
        <option value="ECE">Electronics and Communication</option>
        <option value="EE">Electrical</option>
		<option value="EEE">Electrical and Electronics</option>
		<option value="IT">Information Technology</option>
		<option value="ME">Mechanical</option>
      </select>
	  <?php
	if(isset($_POST['branch'])) {
	  echo "selected branch: ".htmlspecialchars($_POST['branch']);
	}
	?>
    </div></div>
	
	<div class="form-group row">
  <div class="col-sm-4 col-lg-4 col-xs-4 col-md-4">
    <label for="phone_no" class="col-sm-6 col-lg-6 col-xs-6 col-md-6 col-form-label">PHONE NO. :</label></div>
    <div class="form-group col-sm-4 col-lg-4 col-xs-4 col-md-4">
      <input type="text" class="form-control" id="phone_no"  name="phone_no" placeholder="Enter phone no." value ="<?php echo (isset($phone_no))?$phone_no:'';?>" onblur="submitForm()">
    </div></div>
	
	<div class="form-group row">
  <div class="col-sm-4 col-lg-4 col-xs-4 col-md-4">
    <label for="email" class="col-sm-6 col-lg-6 col-xs-6 col-md-6 col-form-label">EMAIL :</label></div>
    <div class="form-group col-sm-4 col-lg-4 col-xs-4 col-md-4">
      <input type="text" class="form-control" id="email"  name="email" placeholder="Enter your Email" value ="<?php echo (isset($email))?$email:'';?>" onblur="submitForm()">
    </div></div>
	
    <div class="form-group row">
  <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
    <label for="tax_rate" class="col-sm-6 col-md-6 col-lg-6 col-xs-6 col-form-label" >MARKS(/40) : </label></div>
    <div class="form-group col-sm-4 col-lg-4 col-xs-4 col-md-4">
	 <input type="text" class="form-control" id="marks" name="marks" placeholder="Enter Student Marks" value="<?php echo (isset($marks))?$marks:'';?>">
	</div></div>
	
	<div class="form-group row">
  <div class="col-sm-4 col-lg-4 col-md-4 col-xs-4">
    <label for="department" class="col-sm-6 col-md-6 col-lg-6 col-xs-6 col-form-label" >DEPARTMENT : </label></div>
    <div class="form-group col-sm-4 col-lg-4 col-md-4 col-xs-4">
      <select class="form-control" id="department" name="department">
		<option selected="selected" >Select Student Branch</option>
        <option value="Technical">Technical</option>
		<option value="Editorial And Management">Editorial And Management</option>
        <option value="Desiging">Desiging</option>
      </select>
	  <?php
	if(isset($_POST['department'])) {
	  echo "selected department: ".htmlspecialchars($_POST['department']);
	}
	?>
    </div></div>
	
	
  <input type="hidden" name="update_key" value="<?php echo $item_id;?>">
  <input type="hidden" name="mode" value="<?php echo $change_mode;?>">
  <button type="register" class="btn btn-success" onclick="submitPackinfo()" style="float:Center;" >Submit</button>
</form>
</div></div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>

<script>
 function fill(Value) {
    $('#search').val(Value);
 }
 $(document).ready(function() {
    $("#search").keyup(function() {
        var name = $('#search').val();
        if (name == "") {
            $("#search").html("");	
        }
        else {
            $.ajax({
                type: "POST",
                url: "pagination_ajax_ads.php",  
                data: {search: name},
                success: function(html) {
                    $("#searchTableBody").html(html).show();
               }
           });
        }
   });
 });
</script>
<?php
$encounter_limit =10;
$sql = "SELECT COUNT(*) FROM ads_result_info";   
        $rs_result = mysqli_query($conn,$sql);   
        $row = mysqli_fetch_row($rs_result);   
        $encounter_records = $row[0];   
        $encounter_pages = ceil($encounter_records / $encounter_limit); 
?>  
<script>
$(function(){
		$('.pagination').pagination({
		items:<?=$encounter_records?>,
		itemsOnPage:5,
		cssStyle:'dark-theme',
		currentPage:1,
		onPageClick : function(pageNumber) {
			jQuery("#searchTableBody").html('loading...');
			jQuery("#searchTableBody").load("pagination_ajax_ads.php?page="+pageNumber+"&limit=<?php echo $encounter_limit;?>");
		},
		onInit :function(){
			jQuery("#searchTableBody").html('loading...');
			jQuery("#searchTableBody").load("pagination_ajax_ads.php?page=1&limit=<?php echo $encounter_limit;?>");
		}
	});
});	


</script>
<div class="panel panel-default">
<div class="panel-heading">
<ul class="pagination"> 
</ul> 
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
		<input type="text" id="search" placeholder="Search by Student Name..." class="form-control"/>	
	</div> 
</div>
<div id="collapse2" >
<div class="panel-body">

<?php


$sql = "SELECT  id, name, year, branch, phone_no, email, marks, department, mentor, interview FROM ads_result_info";
$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result)>0){
	echo '<table class="table table-striped" id="table">';
	echo '<thead>';
	echo '<tr><th>S.No.</th><th>NAME</th><th>YEAR</th><th>BRANCH</th><th>PHONE NO.</th><th>EMAIL</th><th>MARKS</th><th>DEPARTMENT</th><th>Mentor</th><th>Interview Date</th><th>Edits</th></tr>';
	echo '</thead>';
	echo '<tbody id="searchTableBody">';
	
	while($row = mysqli_fetch_assoc($result)){
		
	}
	echo '</tbody>';
	echo '</table>';
}else {
	echo "0 results";
}
mysqli_close($conn);
?>
</div>
</div>


</div></div>



</body>
</html>`
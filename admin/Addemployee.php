<?php

session_start();
include 'conn.php';
include 'navigation-bar.php';


//session_start();
//$_SESSION['message']= '';
//$mysqli = new mysqli('localhost', 'root', '', 'fastpay');

//if ($_SERVER ['REQUEST_METHOD'] == 'POST')
if(isset($_POST['register_btn'])){
	$fname = $conn->real_escape_string($_POST['fullname']);
	$email = $conn->real_escape_string($_POST['email']);
	$address = $conn->real_escape_string($_POST['address']);
	$birthdate = $conn->real_escape_string($_POST['birthdate']);
	$status = $conn->real_escape_string($_POST['status']);
	$gender = $conn->real_escape_string($_POST['gender']);
	
	
	//$_SESSION['username'] = $username;
	
	$sql = "INSERT INTO employees(fullname, email, address, birthdate, status, gender)" . "VALUES('$fname', '$email', '$address', '$birthdate', '$status', '$gender')";
	$result=mysqli_query($conn,$sql);
	//if ($conn->query($sql) === true) {
	//	$_SESSION['message'] = 'Employee Registered successfully!';
		//header("location: dashboard.php");
	//}	
		//else {
			//$_SESSION['message'] = "employee could not be added to the database";
		//}
	
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register Form</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>

	<form method="post" action="addemployee.php">
	
    <div class="row justify-content-center">
	<div class="col-md-4">
	<div class="card">
	<header class="card-header">
		
		<h4 class="card-title mt-2"><center>Add New Employee</center></h4>
	</header>
	<article class="card-body">
	<form>
	<div class="form-row">
		<div class="col form-group">
			<label>Fullname </label>   
		  	<input type="text" name="fullname" class="form-control" placeholder="fullname" required />
		</div> <!-- form-group end.// -->
		
	</div> <!-- form-row end.// -->
	
	
	<div class="form-group">
		<label>Email address</label>
		<input type="email" name="email" class="form-control" placeholder="" required />
	</div> <!-- form-group end.// -->
	
	<div class="form-group">
		<label>Address</label>
		<input type="text" name="address" class="form-control" placeholder="" required />
	</div> <!-- form-group end.// -->
	
	<div class="form-group">
		<label>Date Of Birth</label>
	    <input name="birthdate" class="form-control" type="date_date_set" required />
		
		<label>Civil Status</label>
	    <input name="status" class="form-control"  required />
		
		<label>Gender</label>
	    <input name="gender" class="form-control"  required />
	</div> <!-- form-group end.// -->  
	
	
    <div class="form-group">
        <button type="submit" name="register_btn" class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->      
    </form>
</article> <!-- card-body end .// -->

</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->

<!--container end.//-->
  </form>   
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
	</body>
	</html>
<?php 
	session_start();
	include 'navigation-bar.php';
	
	if(!$_SESSION['username'])
	{
		header("location:../index.php");
	}
?>

<html>
<head>
<meta charset="utf-8">
<title>EMS-System</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<!--<link rel="stylesheet" type="text/css" href="../back.css">-->
</head>

<body>
<div>
	<div class="col-lg-12"><br>
		<div class="row">
		 <!--<a href="addemp.php" class="col-lg-3"><button class="btn btn-success col-lg-3">Add</button></a> -->
		<h3 class="col-lg-6">Displaying Employee Records</h3>
       </div><br>
		<table class="table table-stripped table-hover table-bordered">
			<tr class="text-dark">
				<th><h5>ID</h5></th>
				<th><h5>Name</h5></th>
				<th><h5>Age</h5></th>
				<th><h5>Salary</h5></th>
				<th><h5>Qualification</h5></th>
				<th><h5>Date of Birth</h5></th>
				<th><h5>Date of Join</h5></th>
			</tr>

			
			<?php
include '../coonn.php';
	
	
$q="select * from employee";

$query = mysqli_query($conn,$q);

while ($res = mysqli_fetch_array($query)) {
?>

			<tr>
				<th><?php echo $res['id'] ?></th>
				<th><?php echo $res['name'] ?></th>
				<th><?php echo $res['age'] ?></th>
				<th><?php echo $res['salary'] ?></th>
				<th><?php echo $res['qualification'] ?></th>
				<th><?php echo $res['date_of_birth'] ?></th>
				<th><?php echo $res['date_of_join'] ?></th>
				<th><a  href="manage_attendance.php?id=<?php echo $res['id']; ?>" class="text-white"><button class="btn btn-success">Manage Attendance</button></a></th>
			</tr>
<?php }
?>

		</table>
	</div>
</div>
<!--<div class="container py-5">
<center><h1>Welcome</h1> 
<h1>To</h1>
<h1>FastPayroll</h1>
</center>-->
<script src="../js/bootstrap.min.js" type="text/javascript"></script>

</body>
</html>  
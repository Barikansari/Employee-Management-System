<?php

session_start();
if(!$_SESSION['username'])
	{
		header("location:../index.php");
	}


include 'conn.php';

$id = $_GET['id'];
//$name = ucfirst($_POST['name']);
//$age = $_POST['age'];
//$salary = $_POST['salary'];
//$qualification = ucfirst($_POST['qualification']);
//$dob = date("Y-m-d",strtotime($_POST['dob']));
//$doj = date("Y-m-d",strtotime($_POST['doj']));
//$date_of_birth = $dob;
//$date_of_join = $doj;

$q="select * from employee where id = $id";
$query = mysqli_query($conn,$q);
$res=mysqli_fetch_array($query);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>
<body>

<div class="col-lg-6 m-auto">
	
	<form method="post">
		<br><div>
			<div class="card-header bg-dark">
				<h1 class="text-white text-center">Displaying Employee Details</h1>
			</div><br>

			<input type="hidden" name="id" value="<?php echo $res['id']; ?>">
			<label>Name</label>
			<input type="text" name="name" class="form-control" value="<?php echo $res['name']; ?>" required><br>

			<label>age</label>
			<input type="text" name="age" class="form-control" value="<?php echo $res['age']; ?>" required pattern="[0-9]{1,15}"
        title="this field accepts only numbers"><br>

			<label>salary</label>
			<input type="text" name="salary" class="form-control" value="<?php echo $res['salary']; ?>" required pattern="[0-9]{1,15}"
        title="this field accepts only numbers"><br>

			<label>qualification</label>
			<input type="text" name="qualification" class="form-control" value="<?php echo $res['qualification']; ?>" required><br>

            <label>date of Birth</label>
			<input type="text" name="dob" class="form-control"
			value="<?php echo $res['date_of_birth']; ?>" placeholder="date-month-year" required><br>

			<label>date of Joining</label>
			<input type="text" name="doj" class="form-control" value="<?php echo $res['date_of_join']; ?>" placeholder="date-month-year" required><br>

			<div class="row">
				<div class="col-md-3"><button class="btn btn-success" name="done">update</button></div>
         
			    <div class="col-md-3"><input type="button" class="btn btn-danger" name="delete" value="Delete" onclick="deleteme(<?php $_SESSION['id'] = $id; ?>)"></div>
			    <!--<div class="col-md-3"><button class="btn btn-success" name="view">attendance</button></div>-->

	<script type="text/javascript">
		
function deleteme(delid)
{
      if(confirm("Are you sure you want to delete ?"))
      {
      	window.location.href="delete.php";
      }
}

	</script>
			    <a href="dashboard.php"><input type="button" name="" value="Back to records" class="btn btn-primary col-lg-12"></a>
		
		    </div>
		</div>
	</form>
</div>
<?php
include 'conn.php';
if( isset( $_GET['id'])){
$id = $_GET['id'];
$name = ucfirst($_POST['name']);
$age = $_POST['age'];
$salary = $_POST['salary'];
$qualification = ucfirst($_POST['qualification']);
$dob = date("Y-m-d",strtotime($_POST['dob']));
$doj = date("Y-m-d",strtotime($_POST['doj']));
$date_of_birth = $dob;
$date_of_join = $doj;

if(isset($_POST['done']))
{
$q2="update employee set name = '$name' , age = '$age' , salary = '$salary' , qualification = '$qualification' , date_of_birth = '$date_of_birth' , date_of_join = '$date_of_join' where id = $id";
mysqli_query($conn,$q2);

header("location:dashboard.php");
//header("refresh:0");
}
}
if(isset($_POST['delete']))
{
	$_SESSION['id'] = $id;
	header("location:delete.php");
}

/*if (isset($_POST['view'])) {

$_SESSION['id'] = $id;
	header("location:attendance1.php");

} */
?>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
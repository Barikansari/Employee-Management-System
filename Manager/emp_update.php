<?php
session_start();
if(!$_SESSION['username'])
	{
		header("location:../index.php");
	}


include 'conn.php';

$id = $_GET['id'];
$name = $_POST['name'];
$age = $_POST['age'];
$salary = $_POST['salary'];
$qualification = $_POST['qualification'];
$dob = date("Y-m-d",strtotime($_POST['dob']));
$doj = date("Y-m-d",strtotime($_POST['doj']));
$date_of_birth = $dob;
$date_of_join = $doj;


$day = $_POST['day'];
$hours = $_POST['t_in1'];
$min = $_POST['t_in2'];
$sec = $_POST['t_in3'];
$hours1 = $_POST['t_out1'];
$min1 = $_POST['t_out2'];
$sec1 = $_POST['t_out3'];
$timein = "$hours:$min:$sec";
$timeout = "$hours1:$min1:$sec1";
$date = date("y-m-d");

$q="select * from employee where id = $id";
$query = mysqli_query($conn,$q);
$res=mysqli_fetch_array($query);

$q2="INSERT INTO time(id,name, day, time_in, time_out,date) VALUES ('$id','$name','$day','$timein','$timeout','$date')";

if (isset($_POST['add'])) 
{
	
	mysqli_query($conn,$q2);
}

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
			<input type="text" name="name" class="form-control" value="<?php echo $res['name']; ?>" readonly><br>

			<label>age</label>
			<input type="text" name="age" class="form-control" value="<?php echo $res['age']; ?>" readonly><br>

			<label>salary</label>
			<input type="text" name="salary" class="form-control" value="<?php echo $res['salary']; ?>" readonly><br>

			<label>qualification</label>
			<input type="text" name="qualification" class="form-control" value="<?php echo $res['qualification']; ?>" readonly><br>

            <label>date of Birth</label>
			<input type="text" name="dob" class="form-control"
			value="<?php echo $res['date_of_birth']; ?>" readonly><br>

			<label>date of Joining</label>
			<input type="text" name="doj" class="form-control" value="<?php echo $res['date_of_join']; ?>" readonly><br>

			<label>day</label>
			<select name="day" class="form-control">
				<option>sunday</option>
				<option>monday</option>
				<option>tuesday</option>
				<option>wednesday</option>
				<option>thursday</option>
				<option>friday</option>
				
			</select><br>

			<label>time in</label>
			<div class="row">
			<div class="col-md-3"><input type="text" name="t_in1" class="form-control" value="0" required pattern="[0-9]{1,2}"
        title="this field accepts only numbers  and two characters"></div>:
			<div class="col-md-3"><input type="text" name="t_in2" class="form-control" value="0" required pattern="[0-9]{1,2}"
        title="this field accepts only numbers  and two characters"></div>:
			<div class="col-md-3"><input type="text" name="t_in3" class="form-control" value="0" required pattern="[0-9]{1,2}"
        title="this field accepts only numbers  and two characters"></div>
		    </div>
			<br>

			<label>time out</label>
			<div class="row">
			<div class="col-md-3"><input type="text" name="t_out1" class="form-control" value="0" required pattern="[0-9]{1,2}"
        title="this field accepts only numbers  and two characters"></div>:
			<div class="col-md-3"><input type="text" name="t_out2" class="form-control" value="0" required pattern="[0-9]{1,2}"
        title="this field accepts only numbers  and two characters"></div>:
			<div class="col-md-3"><input type="text" name="t_out3" class="form-control" value="0" required pattern="[0-9]{1,2}"
        title="this field accepts only numbers and two characters"></div>
		    </div><br>
            
            <div class="row">
			<div class="col-md-3"><button class="btn btn-success" name="Back">Back</button></div>
			<div class="col-md-3"><button class="btn btn-success" name="add">add</button></div>
			<div class="col-md-3"><button class="btn btn-success" name="view">attendance</button></div>
		    </div>
		   <script type="text/javascript">

</script>
		<?php
        
        if(isset($_POST['Back']))
        {
            header("location:dashboard.php");
        }

if (isset($_POST['view'])) {

$_SESSION['id'] = $id;
	header("location:attendance.php");

}
		?>
		</div>
		
	</form>
</div>
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
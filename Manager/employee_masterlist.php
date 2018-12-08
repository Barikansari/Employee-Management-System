

<?php

include '../coonn.php';
$query="select * from employees";
$result=mysqli_query($conn,$query);

?>
<html>
	<title>
		<head>Employee data fetch</head>
	</title>
<body>
	<div class="col-lg-12"><br>
		<div class="row">
		
		 <!--<a href="addemployee.php" class="col-lg-3"><button class="btn btn-success col-lg-3">Add</button></a> -->
		 <h3 class="col-lg-6">Displaying Employee Records</h3>
		
    </div><br>
	<table class="table table-stripped table-hover table-bordered"> 
		<tr class="text-dark">
	
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th>Date of Birth</th>
			<th>Address</th>
			<th>Civil Status</th>
			<th>Gender</th>
		</tr>
		<?php
		
			while($row=mysqli_fetch_assoc($result))
			{
		?>
			<tr>
				<td><?php echo $row['Id']; ?> </td>
				<td><?php echo $row['fullname']; ?> </td>
				<td><?php echo $row['email']; ?> </td>
				<td><?php echo $row['date_of_birth']; ?> </td>
				<td><?php echo $row['address']; ?> </td>
				<td><?php echo $row['civil_status']; ?> </td>
				<td><?php echo $row['gender']; ?> </td>
				<th><a  href="?id=<?php echo $row['Id']; ?>" class="text-white"><button class="btn btn-success">View</button></a></th>
			
			</tr>
		<?php
			}
		?>	
	</table>
	</div>

</body>
</html>
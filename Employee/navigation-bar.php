<?php
	session_start();
?>


<html>
<head>
<meta charset="utf-8">
<title>EMS-System</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

</head>

<body>

		
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<!-- Brand -->
<a class="navbar-brand" href="Dashboard.php">FastPayroll</a>

<!-- Links -->
<div class="collapse navbar-collapse" id="nav-content">   
<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" href="dashboard.php">Dashboard</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Leave Request</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Leave Status</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">View Personal Details</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">View Pay-slip</a>
</li>
</ul>
</div>
<div>
<h8 style="color:red;"> Welcome:
<?php
echo $_SESSION['username'];
?>
</h8>
</div>
<a href="../index.php" class="float-right btn btn-outline-primary mt-1">Logout</a>
</nav>
</div>
		
  </div>


<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
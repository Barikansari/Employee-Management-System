<?php
session_start();
$_SESSION['message']= '';
$mysqli = new mysqli('localhost', 'root', '', 'fastpay');
if ($_SERVER ['REQUEST_METHOD'] == 'POST'){
	
	//two passwords are equal to each other
	if($_POST['password'] == $_POST['conformpassword']){
	$username = $mysqli->real_escape_string($_POST['username']);
	$email = $mysqli->real_escape_string($_POST['email']);
	$password = ($_POST['password']);
	
	
	$_SESSION['username'] = $username;
	
	$sql = "INSERT INTO users(username, email, password)" . "VALUES('$username', '$email', '$password')";
	
	if ($mysqli->query($sql) === true) {
		$_SESSION['message'] = 'Registration successful!';
		header("location: index.php");
	}	
		else {
			$_SESSION['message'] = "user could not be added to the database";
		}
	}else {
	$_SESSION['message'] = "two passwords didnot matched!";
}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register Form</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>

<body>

	<form method="post" action="register.php">
	<div class="alert alert-error"><?= $_SESSION['message']?></div>
    <div class="row justify-content-center">
	<div class="col-md-6">
	<div class="card">
	<header class="card-header">
		<a href="login.php" class="float-right btn btn-outline-primary mt-1">Log in</a>
		<h4 class="card-title mt-2">Sign up</h4>
	</header>
	<article class="card-body">
	<form>
	<div class="form-row">
		<div class="col form-group">
			<label>Username </label>   
		  	<input type="text" name="username" class="form-control" placeholder="" required />
		</div> <!-- form-group end.// -->
		
	</div> <!-- form-row end.// -->
	<div class="form-group">
		<label>Email address</label>
		<input type="email" name="email" class="form-control" placeholder="" required />
		<small class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div> <!-- form-group end.// -->
	
	
	<div class="form-group">
		<label>Password</label>
	    <input name="password" class="form-control" type="password" required />
		<label>Conform Password</label>
	    <input name="conformpassword" class="form-control" type="password" required />
	</div> <!-- form-group end.// -->  
    <div class="form-group">
        <button type="submit" name="register_btn" class="btn btn-primary btn-block"> Register  </button>
    </div> <!-- form-group// -->      
    <small class="text-muted">By clicking the 'Sign Up' button, you confirm that you accept our <br> Terms of use and Privacy Policy.</small>                                          
</form>
</article> <!-- card-body end .// -->
<div class="border-top card-body text-center">Have an account? <a href="login.php">Log In</a></div>
</div> <!-- card.// -->
</div> <!-- col.//-->

</div> <!-- row.//-->


</div>

<!--container end.//-->
  </form>   
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>
	</body>
	</html>
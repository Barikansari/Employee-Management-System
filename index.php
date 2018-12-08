<?php

session_start();
include 'header.php';
include 'coonn.php';


if (isset ($_POST['login_btn'])){
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	//$conn = mysqli_connect('localhost','root','') or die(mysqli_error());
	//mysqli_select_db($conn,'fastpay') or die("cannot select DB");

		$sql = "SELECT * FROM users WHERE username ='".$username."' AND password='".$password."'";
		$result=mysqli_query($conn, $sql);
		$res = mysqli_num_rows($result);
	
	if ($res == 0)
	{
	
		// header("location:index.php?user=Incorrect username or Password");
			echo "Username/password combination incorrect";
	}
	 while ($row = mysqli_fetch_array($result)) {

    	if ($row['username'] == $username  &&  $row['password'] == $password)
    	 {
    	 	$_SESSION['username'] = $username ;
    		$_SESSION['password'] = $password ;

    		if ($row['type'] == 'admin') {
    			
    			header("location:admin/dashboard.php");
    			}

    		elseif ($row['type'] == 'hr') 
    		{
    			header("location:manager/dashboard.php");
            }
			
			elseif ($row['type'] == 'employee') 
    		{
    			header("location:employee/dashboard.php");
            }
			
			
			
		//$_SESSION['message'] = "You are logged in";
		//$_SESSION['username'] = $username;
		//header("location: dashboard.php");
		//exit();
	//}else{
		//echo "Username/password combination incorrect";
		//exit();
	}}
}
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login Form</title>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
</head>

<body>

	<div class="container py-3">
    <div class="row">
        <div class="col-md-12">
            
            <div class="row">
                <div class="col-md-6 mx-auto">
					
                    <!-- form card login -->
                    <div class="card rounded-0">
                        <div class="card-header">
                            <center><h3 class="mb-0">Login</h3></center>
							
                        </div>
                        <div class="card-body">
                            <form class="form" role="form" autocomplete="off" id="formLogin" novalidate="" method="POST" action="#">
                                <div class="form-group">
                                    <label for="uname1">Username</label>
                                    <input type="text" name="username" class="form-control form-control-lg rounded-0" name="username" id="uname1" required="">
                                    <div class="invalid-feedback">Oops, you missed this one.</div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
									<a href="./forgot-password.html" class="float-right small">I forgot password</a>
                                    <input type="password" name="password" class="form-control form-control-lg rounded-0" name="password" id="pwd1" required="" autocomplete="new-password">
                                    <div class="invalid-feedback">Enter your password too!</div>
                                </div>
                                <div>
                                    <label class="custom-control custom-checkbox">
                                    <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" >
                            <span style="padding-bottom: .15rem">Remember me</span>
                        </label>
                              
                                </div>
                                <button type="submit" name="login_btn" class="btn btn-success btn-outline-primary float-right" id="btnLogin">Login</button>
								<!-- <a href="register.php" class="float-right btn btn-outline-primary mt-1">SignUP</a> -->
							</form>
                        </div>
                        <!--/card-block-->
                    </div>
                    <!-- /form card login -->

                </div>


            </div>
            <!--/row-->

        </div>
        <!--/col-->
    </div>
    <!--/row-->
</div>
<!--/container-->

	
<script src="../js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>
<?php
$conn = mysqli_connect('localhost','root','') or die(mysqli_error());
		mysqli_select_db($conn,'fastpay') or die("cannot select DB");
?>


<?php
	include('conn.php');
	session_start();
	if(isset($_GET['code'])){
	 
    $code=$_GET['code'];
    $email=$_SESSION['email'];
	$query=mysqli_query($conn,"select * from user where email='$email'");
	$row=mysqli_fetch_array($query);

	if($row['code']==$code){
		
				$_SESSION['id']=$row['userid'];
		?>
		<p>Account Verified!</p>
		<p><a href="resetpassword.php">Reset your password</a></p>
		<?php
	}
	else{
		$_SESSION['sign_msg'] = "Something went wrong. Please sign up again.";
  		header('location:signup.php');
	}
	}
	else{
		header('location:index.php');
	}
?>
<?php
	session_start();
	include('conn.php');

	
?>

<!DOCTYPE html>
<html>
<head>
	<title>forgot password</title>
<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+San">
	<link href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css"> 
<style>
	#login_form{
		width:350px;
		position:relative;
		top:50px;
		margin: auto;
		padding: auto;
	}
</style>
</head>
<body>
<div class="container">
	<div id="login_form" class="well">
		<h2><center><span class="glyphicon glyphicon-lock"></span> forgot password</center></h2>
		<hr>
		<form method="POST" action="forgotpost.php">
       
		Email: <input type="text" name="email" class="form-control" required>
		<div style="height: 10px;"></div>		
		
		<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"></span> Forgot password</button> 
		</form>
		<div style="height: 15px;"></div>
		<?php
			if(isset($_SESSION['log_msg'])){
				?>
				<div style="height: 30px;"></div>
				<div class="alert alert-danger">
					<span><center>
					<?php echo $_SESSION['log_msg'];
						unset($_SESSION['log_msg']); 
					?>
					</center></span>
				</div>
				<?php
			}
		?>
	</div>
</div>
</body>
</html>
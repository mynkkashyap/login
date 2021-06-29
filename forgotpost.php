<?php
	include('conn.php');
	session_start();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	function check_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}
     
	$email=check_input($_POST['email']);
    $_SESSION['email']=$email;
    
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$_SESSION['log_msg'] = "Invalid email format";
  		header('location:forgot.php');
	}
	
else{
$query=mysqli_query($conn,"select * from user where email='$email'");
		if(mysqli_num_rows($query)==0){
			$_SESSION['log_msg'] = "Email not  exist";
  			header('location:forgot.php');
		
       }


		
          
		else{
		//depends on how you set your verification code
		$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code=substr(str_shuffle($set), 0, 12);

		mysqli_query($conn,"update user set code='$code' where email='$email' ");
     
		
	
		$to = $email;
			$subject = "forgot password";
			$message = "
				<html>
				<head>
				<title>Verification Code</title>
				</head>
				<body>
				<h2>Thank you for Registering.</h2>
				<p>Your Account:</p>
                <p>Name: ".$name."</p>
				<p>Email: ".$email."</p>
				<p>Password: ".$_POST['password']."</p>
				<p>Please click the link below to activate your account.</p>
				<h4><a href='https://........./action.php?code=$code'>Activate My Account</h4>
				</body>
				</html>
				";
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From: your@email". "\r\n" .
						"CC: your@email";

		mail($to,$subject,$message,$headers);

		$_SESSION['log_msg'] = "Verification code sent to your email.";
  		header('location:forgot.php');

  		}
	}
	}
?>

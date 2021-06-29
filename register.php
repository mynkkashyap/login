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
     $usrname=check_input($_POST['usrname']);
    $name=check_input($_POST['name']);
	$email=check_input($_POST['email']);
	$password=md5(check_input($_POST['password']));

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		$_SESSION['sign_msg'] = "Invalid email format";
  		header('location:signup.php');
	}
       $query=mysqli_query($conn,"select * from user where usrname='$usrname'");
		if(mysqli_num_rows($query)>0){
			$_SESSION['sign_msg'] = "Username already exist";
  			header('location:signup.php');
		}

  else{
           
		$query=mysqli_query($conn,"select * from user where email='$email'");
		if(mysqli_num_rows($query)>0){
			$_SESSION['sign_msg'] = "Email already exist";
  			header('location:signup.php'); }
           
		
            
		
		
        
      
       
   
       
		else{
		//depends on how you set your verification code
		$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code=substr(str_shuffle($set), 0, 12);

		mysqli_query($conn,"insert into user (name, usrname, email, password, code) values ('$name','$usrname','$email', '$password', '$code')");
		$uid=mysqli_insert_id($conn);
		//default value for our verify is 0, means it is unverified

		//sending email verification
		$to = $email;
			$subject = "Sign Up Verification Code";
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
				<h4><a href='https://........./activate.php?uid=$uid&code=$code'>Activate My Account</h4>
				</body>
				</html>
				";
			//dont forget to include content-type on header if your sending html
			$headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			$headers .= "From:  you@email". "\r\n" .
						"CC:you@email";

		mail($to,$subject,$message,$headers);

		$_SESSION['sign_msg'] = "Verification code sent to your email.";
  		header('location:signup.php');

  		}
	}
	}
?>

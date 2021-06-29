

<?php
session_start();
	include('conn.php'); 
    
   
if(!isset($_SESSION["id"])  !== false){
    header("location: index.php");
    exit;
}  
?>
<!DOCTYPE html>
<html>
<head>
 <script type='text/javascript' src='https://cdn.scaledrone.com/scaledrone.min.js'></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <style>
    body {
      display: flex;
      height: 100vh;
      margin: 0;
      align-items: center;
      justify-content: center;
      padding: 0 50px;
      font-family: -apple-system, BlinkMacSystemFont, sans-serif;
    }
    video {
      max-width: calc(50% - 100px);
      margin: 0 50px;
      box-sizing: border-box;
      border-radius: 2px;
      padding: 0;
      box-shadow: rgba(156, 172, 172, 0.2) 0px 2px 2px, rgba(156, 172, 172, 0.2) 0px 4px 4px, rgba(156, 172, 172, 0.2) 0px 8px 8px, rgba(156, 172, 172, 0.2) 0px 16px 16px, rgba(156, 172, 172, 0.2) 0px 32px 32px, rgba(156, 172, 172, 0.2) 0px 64px 64px;
    }
    .copy {
      position: fixed;
      top: 10px;
      left: 50%;
      transform: translateX(-50%);
      font-size: 16px;
      color: rgba(0, 0, 0, 0.5);
    }
  </style>
	<title>Sign up Form with Email Verification in PHP/MySQLi</title>
	<script src="/js/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Open+San">
	<link href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/bootstrap.min.css">   
</head>
<body>  
	<div class="container">
		<h2>Login Successful</h2>
        <h1>Hi, <b><?php echo $_SESSION["name"]; ?></b>. Welcome to our site.</h1>
           </b>. Welcome to our site.</h1>
          
  
</body>
</html>

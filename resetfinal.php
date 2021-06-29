<?php
session_start();
	include('conn.php'); 
    
   
if(!isset($_SESSION["id"])  !== false){
    header("location: index.php");
    exit;
}  
?>
<?php
	include('conn.php');
	session_start();
$user=$_SESSION["id"];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

	function check_input($data){
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;
	}	
    $password=md5(check_input($_POST['password']));
     
	
	if ($_POST["password"] === $_POST["confirm_password"]) {
  mysqli_query($conn,"update user set password='$password' where userid='$user' ");
  session_unset();
  
  	$_SESSION['log_msg'] = "Password Changed ";
  		header('location:resetpassword.php');
}else{
    $_SESSION['log_msg'] = "Password Not Same ";
  		header('location:resetpassword.php');
      }

     
     
  		}

?>

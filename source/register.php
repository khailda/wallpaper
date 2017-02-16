
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>signup</title>
</head>

<body>
<?php
include("connection.php");
session_start();

if( isset($_POST['register']))
{
	
	//$con=mysqli_connect("139.59.174.224","root","ITU2017","gallery");
// Check connection
if (!$con)
  {
  die("Connection error: " . mysqli_connect_error());
  }
  


$name= $_POST['name'];
$phone= $_POST['phone'];
$email=$_POST['email'];
$password=$_POST['pass'];
 $query= "INSERT INTO sign_up ( user, phone, email, password) VALUES ( '$name','$phone','$email','$password')";
if(mysqli_query($con,$query)){
	$_SESSION['emailid']	=	$email;

	}
	else{
		echo "not added" . mysqli_error($con);
		}
		header("location:index.php");
}
?>
</body>
</html>
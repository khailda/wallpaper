
<?php
include("connection.php");
session_start();
//$con=mysqli_connect("localhost","root","","gallery");
	if( isset($_POST['login'] ) )
	{
		$email	=	$_POST['email'];
		$pass	=	$_POST['pass'];
		
		$query	=	"SELECT * FROM sign_up
		WHERE email = '$email' AND password = '$pass'";
		$res	=	mysqli_query($con, $query );
		$row	= 	mysqli_fetch_row($res);
	
		if(count($row) > 0 )
		{
				$_SESSION['emailid']	=	$email;
			header("location:index.php");
		}
		else
		{
			echo "invalid email or password";	
		}
		
	}
?>


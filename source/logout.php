<?php
include("connection.php");
//$con=mysqli_connect("localhost","root","","gallery");
session_destroy();

header("location:catagory.php");
?>

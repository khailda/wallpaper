<?php 
include("connection.php");
error_reporting(0);
session_start();
//$con=mysqli_connect("localhost","root","","gallery");

	$catagory=$_GET['cat'];
	$cato= $catagory;
	
if(isset($_POST['update']))
	{
		
	$album=$_POST['alb'];
	$catname	=	$_POST['un'];
 $update	=	"UPDATE catagory SET album='$catname' WHERE album='$album'";
	mysqli_query($con,$update);
	 $updates	=	"UPDATE images SET album='$catname' WHERE album='$album'";
	mysqli_query($con,$updates);
	header("location:catagory.php");
	
	}
 ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="css/style.css" />
 <link href="boot/css/bootstrap.css" rel="stylesheet" />
    <link href="boot/css/bootstrap.min.css" rel="stylesheet" />
<script src="boot/js/jquery-1.12.3.min.js"></script>

    <script src="boot/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
     <link rel="stylesheet" type="text/css" href="stylecatagory.css" />
 

<script type="text/javascript">
function checkbox() {
 
  var confirmmessage = "Are you sure you want to continue?";
  var go = "";
  var message = "Action Was Cancelled By User";
 
  if (confirm(confirmmessage)) {
 
      window.location = go;
 
  } else {
 
       alert(message);
 
  }
 
}
 </script>
 <style>
 input[type=text] {
    width: 50%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
    border: none;
    background-color:#006;
    color: white;
	
}
input[type=text]:focus {
    background-color:#009;
	color:white;
}input[type=submit]{
    background-color: #009;
    border: none;
    color: white;
    padding: 14px 20px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
</style>
</head>

<body>
<div id="main">

<div id="navdiv"> 
<ul >
<img src="images/image-folder_283x283.png"   width="100" height="90" style="margin-top:5px;"/>
<label style="font-size:24px;font-family:verdana, Arial, Helvetica, sans-serif;  color:#039">Shutter Press</label>
       


   
<li>
 <a href="addcat.php"> <img  src="images/add-circular-button (1).png"  /></a>
</li> 
<li>  <img  src="images/user.png"  /><ul >

   <li > <a href="?log=logout"style="color:white"> log out</a> 
   </ul></li>       
   

</ul>
    
  <?php 
 
		  
		  //if logout 
		  if(isset($_GET['log'])){
			  session_start();
			  session_destroy();
			  header("location:index.php");
		  }
			?>
    

   


</div>
         <div id="content">
        <div style="text-align:left;margin-left:40px;margin-top:10px; float:left;"><label style="font-size:26px;color:#006;">RENAME CATAGORY:<?php echo $catagory; ?></label>
        <?php echo $catagory; ?></div>
       
  <div style="margin-top:100px">
   <form method="post" action="rename.php" >
     <p>&nbsp;</p>
     <p>&nbsp;</p>
   
     <p>
  <input type="text" name="un" value="<?php 
		echo $catagory ?>" />
      <input type="hidden" name="alb" value="<?php 
		echo $catagory ?>"  />
      
       <input type="submit" name="update" />
     </p>
   </form>
   </div>
 
  </div>
    </div>
<div class="footer-bottom">

	<div class="container">

		<div class="row">

		  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

				<div class="copyright">

					© 2015, Webenlance, All rights reserved

				</div>

			</div>

		  <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

				<div class="design">

					 <a href="#">Franchisee </a> |  <a target="_blank" href="http://www.webenlance.com">Web Design & Development by Webenlance</a>

				</div>

			</div>

		</div>

	</div>

</div> 
</body>
</html>


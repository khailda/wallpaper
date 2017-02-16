
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
<?php
// error_reporting(0);
?>
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


   
        <div style="margin-top:6%">
           <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
       	  <div class="panel panel-default">
        		<div class="panel-heading">
			    		<h3 class="panel-title">Add New Catagory<small> with icon</small></h3>
			 			</div>
			 			<div class="panel-body">
			    		<form action="addcat.php" method="post" enctype="multipart/form-data">
			    			<div class="row">
			    				<div class="col-xs-6 col-sm-6 col-md-6">
			    					<div class="form-group">
			                <input   type="file"  name="upfile" />
			    					</div>
			    				</div>
			    				
			    			</div>

			    			<div class="form-group">
			    				<input type="text" name="catagory" id="catagory" class="form-control input-sm" placeholder="Catagory Name">
			    			</div>

			    		
	
			    			<input type="submit" value="create" class="btn btn-info btn-block" name="insert">
			    		
			    		</form>
                       
<?php 
include("connection.php");
//$con=mysqli_connect("localhost","root","","gallery");

		  if(isset($_POST['insert'])){
			

$cat=$_POST['catagory'];
	
	$dir="images/";
  $qury="SELECT album FROM catagory WHERE album='$cat' ";
  $r = mysqli_query($con,$qury);
   $res	= 	mysqli_fetch_row($r);
  
  if(count($res)>0){
	  echo "<label style='color:red'> album already exist</label>";
  }
 else{
 $targetfolder= $dir. basename($_FILES['upfile']['name']);
	 move_uploaded_file($_FILES['upfile']['tmp_name'],$targetfolder);
	 
 $query="INSERT INTO catagory (	album,icon) VALUES ('$cat','$targetfolder')";
	$row = mysqli_query($con,$query);
}
} 
	

?>
			    	</div>
	    		</div>
				 
    		</div>
    	</div>
     
</div>

  </div>

<!--header-->

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


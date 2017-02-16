
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
  
session_start();
error_reporting(0);
include("connection.php");
//$con=mysqli_connect("localhost","root","","gallery");
$catt=$_SESSION['ses'];
 
?>
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
.chk{padding:0px; margin:0px;position: absolute;}
.img{width:100px; height:100px;}
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
    </div><div class="scrollbar" id="style-8">
      <div class="force-overflow">
    <div class="col-sm-2">
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li style=" cursor: default;background-color: #0b56a8; color: #fff; margin-top:0px; font-size:24px;" ><h style="margin-left:20px;font-size:24px;font-family:verdana, Arial, Helvetica, sans-serif;" data-toggle="tab">Albums</h></li>
          <li class=""> <?php
			
  $qury="SELECT album FROM catagory  ";
	$res=mysqli_query($con,$qury);
	
	 while($result=mysqli_fetch_array($res))
	   { ?>
  
    <a href="catagory.php?catagory_name=<?php echo $result['album']; ?>" ><?php 
	$cat=$_GET['album'];
       echo $result['album'];
		  
		   }?></a></li>
                                      
		</ul>
       </nav>
        </div>
        </div>
    </div>
    
         <div id="content">
        <div style="text-align:left;margin-left:40px;margin-top:10px; float:left;"><label style="font-size:26px;color:#006;"><?php if($catt!='')
		{if($cat!='')
		{echo $cat;}
		else {echo $catt;}}
		 ?></label></div>
       
<?php
//$con=mysqli_connect("localhost","root","","gallery");

		 if(isset($_POST['delete']))
	{
		$delete =$_POST['check'];
		
		for($i=0;$i<count($delete);$i++)
		{
			$image_id = $delete[$i];
		
		 $query="Delete FROM images WHERE id='$image_id' ";
                     mysqli_query($con,$query);
		
					  
		}
		
	}
?>



<form   method="post" action="deletealbum.php">
<div class="images">
   <ul class="tab_img">
<?php
if($catt!='')
		{if($cat!='')
		{$qury="SELECT * FROM images WHERE  album='$cat' ";
	$res=mysqli_query($con,$qury);
	 while($result=mysqli_fetch_array($res))
	   { ?>
       
      <li>
<input type="checkbox" name="check[]" class="chk" id="check[]" value="<?php  echo $result['id'];?>">
<img src="<?php  echo $result['image'];?>" class="img"/>
</li>
<?php

  }}
		else {
$qury="SELECT * FROM images WHERE album='$catt' ";
	$res=mysqli_query($con,$qury);
	 while($result=mysqli_fetch_array($res))
	   { ?>
       
      <li>
<input type="checkbox" name="check[]" class="chk" id="check[]" value="<?php  echo $result['id'];?>">
<img src="<?php  echo $result['image'];?>" class="img"/>
</li>
<?php

  }}}  ?>
 
</ul></div>

<section class="gradient" >
<button type="submit" value="delete" name="delete" style="margin-top:20px; margin-bottom:55px;"  >Delete Album</button>
</section>

</form>

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


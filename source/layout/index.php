<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Gallery </title>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="layout/styles/layout.css" type="text/css" />

<?php 

$con=mysqli_connect("localhost","root","","gallery");
?>
</head>

<body >
<body id="top">
<div class="wrapper col1">
  <div id="topbar">
    <div id="search">
      <form action="#" method="post">
        <fieldset>
          <legend>Site Search</legend>
          <input type="text" value="Search the site&hellip;"  onfocus="this.value=(this.value=='Search the site&hellip;')? '' : this.value ;" />
          <input type="submit" name="go" id="go" value="GO" />
        </fieldset>
      </form>
    </div>
  </div>
</div>
<div class="wrapper col2">
  <div id="header">
    <div id="logo">
      <h1><a href="index.html">PhotoBusiness</a></h1>
      
    </div>
    <ul id="topnav">
       <li style="float:right"><a href="addcatagories.php"><img src="images/plus.jpg" width="30" height="30"/></a></li>
       <li style="float:right"><a href="delete_images.php"><img src="images/del.png" width="30" height="30"/></a></li>
    </ul>
    <br class="clear" />
  </div>
</div>


<ul class="sidenav">
  <li style="font-size:20px; color:#666; background-color:#333; height:35px;font-family:Georgia, Times New Roman, Times, serif;">CATAGORY</li>
  
   <?php
  $qury="SELECT DISTINCT(catagory_name) FROM catagory  ";
	$res=mysqli_query($con,$qury);
	
	 while($result=mysqli_fetch_array($res))
	   { ?>
 <li>
    <a href="addcatagories.php" style="text-decoration:none;color:#000; font-size:18px"><?php 
       echo $result['catagory_name'];
		  
		   }?></a></li>

  </ul>
<div class="shell">
  <div class="gallery">
    <div class="gallery-t">
      <div class="gallery-head">
       
      <div class="gallery-holder">
        <div class="gallery-content">
          <ul><?php 

$con=mysqli_connect("localhost","root","","gallery");
$pagges = $_GET['page'];

if($pagges =="" || $pagges =="1")
{
	$pagges1 =0;
	}
else {
	
$pagges1 =($pagges*20)-20;	
		


}


$qury="SELECT image FROM catagory LIMIT $pagges1,20 ";
	$res=mysqli_query($con,$qury);
	 while($result=mysqli_fetch_array($res)){ ?>
       <li><a href="<?php  echo $result['image'];?>" ><img src="<?php  echo $result['image'];?> "  width="110" height="110" /></a>
            
            </li>
		 <?php  
		   }
		   
	?>

           
          
          </ul>
        </div>
      </div>
    </div>
  </div>
  </div>
  
<div class="footer">
  <p class="lf">Copyright &copy; 2010 <a href="#">SiteName</a> - All Rights Reserved</p>
  <p class="rf">Design by <a href="http://www.websitecsstemplates.com/" target="_blank">WebsiteCSSTemplates</a></p>
  
<?php $qury="SELECT * FROM catagory ";
$res1= mysqli_query($con,$qury);


$coun=mysqli_num_rows($res1);
$a=$coun/20;

for($b=1;$b<=$a;$b++)
{ ?><a  href="index.php?page=<?php echo $b?>" style="text-decoration:none; text-align:center"><?php echo $b."  ";?></a><?php
	
	
	}

?>

  <div style="clear:both;"></div>
</div>
</div>

</body>
</html>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="css/style.css" />
 <link href="boot/css/bootstrap.css" rel="stylesheet" />
    <link href="boot/css/bootstrap.min.css" rel="stylesheet" />
<script src="boot/js/jquery-1.12.3.min.js"></script>
<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>
    <script src="boot/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
     <link rel="stylesheet" type="text/css" href="stylecatagory.css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
//abc
 $(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove </span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
          // Old code here
          /*$("<img></img>", {
            class: "imageThumb",
            src: e.target.result,
            title: file.name + " | Click to remove"
          }).insertAfter("#files").click(function(){$(this).remove();});*/
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
 </script>
 <style>
 input[type="file"] {
  display: block;
}
.imageThumb {
  max-height: 75px;
  max-width:200px;
  border: 2px solid;
  padding: 1px;
  cursor: pointer;
}
.pip {
  display: inline-block;
  margin: 10px 10px 0 0;
}
.remove {
  display: block;
  background:#444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
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

    </div><div class="scrollbar" id="style-8">
      <div class="force-overflow">
    <div class="col-sm-2">
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li style=" cursor: default;background-color: #0b56a8; color: #fff; margin-top:0px; font-size:24px;" ><h style="margin-left:20px;font-size:24px;font-family:verdana, Arial, Helvetica, sans-serif;" data-toggle="tab">Albums</h></li>
          <li class=""> <?php
		  error_reporting(0);
			include("connection.php");
session_start();

 $allo = $_SESSION['ses'];

//$con=mysqli_connect("localhost","root","","gallery");

  $qury="SELECT album FROM catagory  ";
	$res=mysqli_query($con,$qury);
	
	 while($result=mysqli_fetch_array($res))
	   { ?>
  
    <a href="catagory.php?album_name=<?php echo $result['album']; ?>" ><?php 

       echo $result['album'];
		  
		   }?>
		   	</a></li>
                                      
		</ul>
       </nav>
        </div>
        </div>
    </div>

         <div id="content">
        <div style="text-align:left;margin-left:40px;margin-top:10px; float:left;"><label style="font-size:26px;color:#006;"><?php 
		echo $allo;
		 ?></label></div>
        
   <div class="images">
   <ul class="tab_img">
   
  

<form action="addalbum.php" method="post" enctype="multipart/form-data">
<div class="field" align="left">
<input type="file"  name="upfile[]" multiple="multiple" id="files" />

</div>

<section class="gradient" >
 <button type="submit" value="create"  name="update" style="margin-top:20px; margin-left:100px; margin-right:100px;" >Add Album</button>
 
  </section>


</form>
</div>

</ul>
<?php
if(isset($_POST['update']))
	{	$i=0;
	$dir="images/";
		 while($i<count($_FILES['upfile']['name']))
		 {
			 $targetfolder= $dir. basename($_FILES['upfile']['name'][$i]);
	  move_uploaded_file($_FILES['upfile']['tmp_name'][$i],$targetfolder);
	 $i++;
	
	$query="INSERT INTO images (album,image) VALUES ('$allo','$targetfolder')";
	$row = mysqli_query($con,$query);
	//$res	= 	mysqli_fetch_row($row);
	
		
		
	}echo ("<div style='color:green; font-size:24px;margin-left70%; width:350px;height:45px;text-align:center'> successfully images  added</div>");}?>
</div></div>
  

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


 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>shutter press</title>

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
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.pack.min.js"></script>
<script type="text/javascript">
    $(function($){
        var addToAll = false;
        var gallery = true;
        var titlePosition = 'inside';
        $(addToAll ? 'img' : 'img.fancybox').each(function(){
            var $this = $(this);
            var title = $this.attr('title');
            var src = $this.attr('data-big') || $this.attr('src');
            var a = $('<a href="#" class="fancybox"></a>').attr('href', src).attr('title', title);
            $this.wrap(a);
        });
        if (gallery)
            $('a.fancybox').attr('rel', 'fancyboxgallery');
        $('a.fancybox').fancybox({
            titlePosition: titlePosition
        });
    });
    $.noConflict();
</script>
 <link rel="stylesheet" type="text/css" media="screen" href="http://cdnjs.cloudflare.com/ajax/libs/fancybox/1.3.4/jquery.fancybox-1.3.4.css" />
<style type="text/css">
    a.fancybox img {
        border: none;
        box-shadow: 0 1px 7px rgba(0,0,0,0.6);
        -o-transform: scale(1,1); -ms-transform: scale(1,1); -moz-transform: scale(1,1); -webkit-transform: scale(1,1); transform: scale(1,1); -o-transition: all 0.2s ease-in-out; -ms-transition: all 0.2s ease-in-out; -moz-transition: all 0.2s ease-in-out; -webkit-transition: all 0.2s ease-in-out; transition: all 0.2s ease-in-out;
    } 
    a.fancybox:hover img {
        position: relative; z-index: 999; -o-transform: scale(1.03,1.03); -ms-transform: scale(1.03,1.03); -moz-transform: scale(1.03,1.03); -webkit-transform: scale(1.03,1.03); transform: scale(1.03,1.03);
    }
	.button-link {
    padding: 10px 15px;
    background: #4479BA;
    color: #FFF;
}
</style>
</head>

<body>
<div id="main">

<div id="navdiv"> 
<ul >
<img src="images/image-folder_283x283.png"   width="100" height="90" style="margin-top:5px;"/>
<label style="font-size:24px;font-family:verdana, Arial, Helvetica, sans-serif;  color:#039">Shutter Press</label>
       


<li> <?php 
 
		  error_reporting(0);
		  //if logout 
		  if(isset($_GET['log'])){
			  session_start();
			  session_destroy();
			  header("location:index.php");
		  }
			
session_start();
include("connection.php");
 $email= $_SESSION['emailid'];
 if($email !=''){?>
   
<a href="addcat.php"> <img  src="images/add-circular-button (1).png" style="display:inline" /></a><?php }
else{?> <a href="addcat.php"> <img  src="images/add-circular-button (1).png" style="display:none" /></a>
<?php }?></li> 
<li>  <img  src="images/user.png"  /><ul ><?php error_reporting(0);

 if($email !=''){?>
   <li > <a href="?log=logout"style="color:white"> log out</a> <?php }
   
    if($email=='')
{?><a href='login.php'style="color:white" > log in</a> OR <br /><a href='signup.html'style="color:white"> Sign Up</a>
  <?php } ?>
   </ul></li>       
   

</ul>
    </div><div class="scrollbar" id="style-8">
      <div class="force-overflow">
    <div class="col-sm-2">
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li style=" cursor: default;background-color: #0b56a8; color: #fff; margin-top:0px; font-size:24px;" ><h style="margin-left:20px;font-size:24px;font-family:verdana, Arial, Helvetica, sans-serif;" data-toggle="tab">Albums</h></li>
          <li class="">
		<?php  
// print_r($_GET);
session_start();
 $email= $_SESSION['emailid'];
//$con=mysqli_connect("localhost","root","","gallery");
 $delalbum=$_GET['catagory_name'];
 $albm=$_GET['catt'];
$allo=$_GET['alb'];
$addalbum=$_GET['album_name'];


// delete album
  if(isset($_GET['cat']))
	{
		$catagory	=	$_GET['cat'];
		$del	=	"DELETE FROM images WHERE album='$catagory'";
		mysqli_query($con, $del);
		$delete ="DELETE FROM catagory WHERE album='$catagory'";
		mysqli_query($con,$delete);
		
		
		
	}
	//

	if($allo!='')
		{ $_SESSION['ses']=$allo;}
	elseif($delalbum!=''){$_SESSION['ses']=$delalbum;}
	elseif($addalbum!=''){$_SESSION['ses']=$addalbum;}
		else {  $_SESSION['ses']=$albm;}
	

				
  $qury="SELECT album FROM catagory  ";
	$res=mysqli_query($con,$qury);
	
	 while($result=mysqli_fetch_array($res))
	   { ?>
  
    <a href="?alb=<?php echo $result['album']; ?>" ><?php 
	
	
       echo $result['album'];
		  
		   }?></a></li>
                                       
		</ul>
       </nav>
        </div>
        </div>
    </div>
         <div id="content">
        <div style="text-align:left;margin-left:40px;margin-top:10px; float:left;"><label style="font-size:26px;color:#006;"><?php 
		if($allo!='')
		{echo $allo;}
	elseif($delalbum!=''){
		echo $delalbum;
	}
	elseif($addalbum!=''){
		echo $addalbum;
	}
		else {echo $albm;}
		 ?></label></div>
        <div style="float:righ;">
       <div class="menuholder">
        <ul class="menu slide">
        <?php  if($email !=''){?>
          
            <li style="float:right"><a href="rename.php?cat=<?php 
		if($allo!='')
		{echo $allo;}
	elseif($delalbum!=''){
		echo $delalbum;
	}
	elseif($addalbum!=''){
		echo $addalbum;
	}
		else {echo $albm;}?>" class="blue">RENAME</a></li>
           <li style="float:right"><a href="?cat=<?php 
		
		if($allo!='')
		{echo $allo;}
	elseif($delalbum!=''){
		echo $delalbum;
	}
	elseif($addalbum!=''){
		echo $addalbum;
	}
		else {echo $albm;} ?>" id="del" class="violet" onClick="checkbox()">delete Catagory</a></li>
<?php }?>
        </ul>
    
    
   <div class="images">
   <ul class="tab_img">
<?php 


//$con=mysqli_connect("localhost","root","","gallery");



if($allo!='')
		{ $qury="SELECT * FROM images WHERE album='$allo' ";
$res=mysqli_query($con,$qury);
	 while($result=mysqli_fetch_array($res)){  ?>
       <li>  <img src="<?php  echo $result['image'];?>" width=170px; height=100px; class="fancybox"  />  
  <img  src="<?php  echo $result['image'];?>"  style="display:none" width=400px; height=300px;/>

 </li> <?php }}
 elseif($delalbum!='')
 {$qury="SELECT * FROM images WHERE album='$delalbum' ";
$res=mysqli_query($con,$qury);
	 while($result=mysqli_fetch_array($res)){  ?>
       <li>  <img src="<?php  echo $result['image'];?>" width=170px; height=100px; class="fancybox"  />  
  <img  src="<?php  echo $result['image'];?>"  style="display:none" width=400px; height=300px;/>

 </li> <?php }
	 
 }
 elseif($addalbum!='')
 {$qury="SELECT * FROM images WHERE album='$addalbum' ";
$res=mysqli_query($con,$qury);
	 while($result=mysqli_fetch_array($res)){  ?>
       <li>  <img src="<?php  echo $result['image'];?>" width=170px; height=100px; class="fancybox"  />  
  <img  src="<?php  echo $result['image'];?>"  style="display:none" width=400px; height=300px;/>

 </li> <?php }
	 
 }
		else { 

 $qury="SELECT * FROM images WHERE album='$albm'  ";
$res=mysqli_query($con,$qury);
	 while($result=mysqli_fetch_array($res)){  ?>
       <li>  <img src="<?php  echo $result['image'];?>" width=170px; height=100px; class="fancybox"  />  
  <img  src="<?php  echo $result['image'];?>"  style="display:none" width=400px; height=300px;/>

 </li>
    <?php  
		   }}
		   
	?></ul>
    </div>
    </div></div>
    </div>
    </div>
    </li>
    </div>
    
<div style="margin-bottom:7%;margin-top:auto;margin-left:90%; float:right;position:relative">
<section class="gradient" >
<?php if($email!=''){?>
 <button onclick="window.location.href='addalbum.php'" >Add    Album</button>
  <button onclick="window.location.href='deletealbum.php'" style="margin-top:10px">Dell Album</button><?php }?>
  </section>
  </div>
  </div>
 </div></div></div></div>
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


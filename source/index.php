
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>photo stream</title>

 <link href="boot/css/bootstrap.css" rel="stylesheet" />
    <link href="boot/css/bootstrap.min.css" rel="stylesheet" />
<script src="boot/js/jquery-1.12.3.min.js"></script>

    <script src="boot/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
  <?php 
  error_reporting(0);
session_start();
$email=$_SESSION['emailid'];
//$con=mysqli_connect("139.59.174.224","root","ITU2017","gallery");
?>

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
</style>
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
</head>

<body>
<div id="main">

<div id="navdiv"> 
<ul >
<img src="images/image-folder_283x283.png"   width="100" height="90" style="margin-top:5px;"/>
<label style="font-size:24px;font-family:verdana, Arial, Helvetica, sans-serif;  color:#039">Shutter Press</label>
       
 

   

<li style="margin-right:100px">  <img  src="images/user.png"  /><ul >
   <li > <?php include("connection.php");
   if($email=='')
{echo("<a href='login.php' style='display:inline;color:white'> log in</a> OR <a href='signup.html'style='display:inline;color:white'> Sign Up</a>");}
   else{ echo("<a href='logout.php' style='display:inline;color:white'> log out</a>");} ?></ul></li>       
   

</ul>
    </div><div class="scrollbar" id="style-8">
      <div class="force-overflow">
    <div class="col-sm-2">
    <nav class="nav-sidebar">
		<ul class="nav tabs">
          <li style=" cursor: default;background-color: #0b56a8; color: #fff; margin-top:0px; font-size:24px;" ><h style="margin-left:20px;font-size:24px;font-family:verdana, Arial, Helvetica, sans-serif;" data-toggle="tab">Albums</h></li>
          <li class=""> <?php
				error_reporting(0);
				
				 $qury="SELECT * FROM catagory  ";
	$res=mysqli_query($con,$qury);
	//if user is sign up 

	 while($result=mysqli_fetch_array($res))
	   {
 
  
  echo '<a href="catagory.php?catt='.  $result['album'].'" >' ;
		
       echo $result['album'];
		  
		   } $albm=$_GET['catt'];
	$_SESSION['album']=$albm; echo '</a>';
	
	/*?>//if user is not login 
	else {while($result=mysqli_fetch_array($res)){
		 
		
      echo '<a href="?catt='.  $result['album'].'" >' ;
		
       echo $result['album'];
		  
		   } 
		}<?php */?>
	 
    </li>
                                
		</ul>
       </nav></div>
        </div>
    </div>
        
         <div id="content">
          <ul class="pagination">
	       
	       <?php $qury="SELECT * FROM images ";
$res1= mysqli_query($con,$qury);


 $coun=mysqli_num_rows($res1);
$a=ceil($coun/20);

for($b=1;$b<=$a;$b++)
{ ?><li><a  href="?page=<?php echo $b?>" style="text-decoration:none; text-align:center"><?php echo $b."  ";?></a>  </li><?php
	
	
	}

?></ul>

        <div class="images">
   <ul class="tab_img">
						  <?php
					   

//$con=mysqli_connect("localhost","root","","gallery");
$pagges = $_GET['page'];

if($pagges =="" || $pagges =="1")
{
	$pagges1 =0;
	}
else {
	
$pagges1 =($pagges*20)-20;	
		


}


$qury="SELECT * FROM images LIMIT $pagges1,20 ";
	$res=mysqli_query($con,$qury);
	 while($result=mysqli_fetch_array($res)){  ?>
       <li>  <img src="<?php  echo $result['image'];?>" width=170px; height=100px; class="fancybox"  />  
  <img  src="<?php  echo $result['image'];?>"  style="display:none" width=400px; height=300px;/>

 </li>
    <?php  
		   }
		   
	?></ul>
    
   
    

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


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>delete images </title>
<style>
.chk{padding:0px; margin:0px;position: absolute;}
.img{width:100px; height:100px;}
</style>
<?php 
include("connection.php");
//$con=mysqli_connect("localhost","root","","gallery");
echo $selectOption = $_POST['catg'];
		 if(isset($_POST['delete']))
	{
		$delete =$_POST['check'];
		
		for($i=0;$i<count($delete);$i++)
		{
			$image_id = $delete[$i];
			
					   $query="Delete FROM images WHERE id='$image_id' AND catagory_name='$selectOption'";
                     mysqli_query($con,$query);	
		}  
	}
?>


</head>

<body>
<form   method="post" action="delete_images.php">
<table width="400" border="1" cellspacing="0" cellpadding="0">
<select name="catg" id="catg">
<?php
$qry="SELECT DISTINCT(catagory_name) FROM catagory  ";
	$row=mysqli_query($con,$qry);
	

while ($r = mysqli_fetch_array($row)){
echo "<option value='". $r['catagory_name'] ."'>" . $r['catagory_name'] ."</option>" ;
}
 
?>
</select>
<?php

$qury="SELECT * FROM images ";
	$res=mysqli_query($con,$qury);
	 while($result=mysqli_fetch_array($res))
	   { ?>
      <div class="back">
<input type="checkbox" name="check[]" class="chk" id="check[]" value="<?php  echo $result['id'];?>">
<img src="<?php  echo $result['image'];?>" class="img"/>
</div>
<?php
echo  $result['id'];
  }?>
  

</table>
<input type="submit" value="delete" name="delete"  />
</form>
</body>
</html>
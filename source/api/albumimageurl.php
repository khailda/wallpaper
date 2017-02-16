<?php
include("connection.php");

//$con=mysqli_connect("localhost","root","","gallery");
$album=$_GET['album'];

 $qury="SELECT image FROM images WHERE album='$album' ";
$res=mysqli_query($con,$qury);
		$fetch_row= mysqli_fetch_array($res);
 $a=count($fetch_row);
 if($fetch_row>0)
 {echo "status:'Successfull'".'<br>';

	while($fetch_row1 =mysqli_fetch_assoc($res)){
 $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 $str= strripos($url , "/");
 $sub=substr($url,$str);
 $replace=str_ireplace($sub,"",$url);

$template=$replace.'/'.$fetch_row1['image'];
$fetchmenu= array("image"=>$template);


echo $menuDesign[]=json_encode($fetchmenu);
}}
else{echo"status:false";}


?>
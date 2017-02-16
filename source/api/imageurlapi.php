
<?php
include("connection.php");
//$con=mysqli_connect("localhost","root","","gallery");

 $qury="SELECT image FROM images ";
$res=mysqli_query($con,$qury);
$fetch_row= mysqli_fetch_array($res);
 $a=count($fetch_row);
 if($fetch_row>0)
 { $a="status:Successful";
echo json_encode($a).'<br>';

 while($fetch_row =mysqli_fetch_assoc($res))
    {
 $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
 $str= strripos($url , "/");
 $sub=substr($url,$str);
 $replace=str_ireplace($sub,"",$url);

 $template=$replace.'/'.$fetch_row['image'];
$fetchmenu= array("image url"=>$template);

echo $menuDesign[]=json_encode($fetchmenu).'<br>';

	}
	
 }
 
 else{echo"status:false";}
?>
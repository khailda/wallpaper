<?php
include("connection.php");
//$con=mysqli_connect("localhost","root","","gallery");
 /*?>if(function_exsists($_GET['method'])){
	$_GET['method']();
	}<?php */
	
		$qury="SELECT id,album FROM catagory  ";
		$res=mysqli_query($con,$qury);
		$fetch_row= mysqli_fetch_array($res);
 $a=count($fetch_row);
 if($fetch_row>0)
 {echo json_encode("status:'Successful'".'<br>');
		 $catarray = array();
    while($row =mysqli_fetch_assoc($res))
    {
        $catarray[] = $row;
		
    }
			 echo "album:".'<br>';
			 echo json_encode($catarray).'<br>'; 
			
 }
 else {echo"status:false";}
		 mysqli_close($con);
		 
?>
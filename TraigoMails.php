<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
	$query ="SELECT Usuario.Email FROM Usuario";
	$query_exc=mysqli_query($con, $query);
	$objetos = array();
	while($row=mysqli_fetch_assoc($query_exc)) 
	{ 
		$Email=$row['Email'];
		$objeto = array('Email'=> $Email);	
		array_push($objetos, $objeto);	
	}
	header("Content-Type: application/json");
	$json = json_encode($objetos, JSON_PRETTY_PRINT);
	echo($json);
}
mysqli_close($con);
?>
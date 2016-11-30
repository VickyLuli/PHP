<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');
if (mysqli_connect_errno()) 
{
	echo "Failed to connect to MySQL" . mysqli_connect_error();
}
else
{
	$string = file_get_contents('php://input'); 
	$objeto = json_decode($string, true);
	$query = "INSERT INTO reserva (Nombre,Email,DNI,Entrada,Fecha,Trago,Total) values ('".$_GET["Nombre"]."','".$_GET["Email"]."','".$_GET["DNI"]."','".$_GET["Entrada"]."','".$_GET["Fecha"]."','".$_GET["Trago"]."','".$_GET["Total"]."')";
	var_dump($query);
	echo $query;
	/*
	$stmt = $con->prepare($query);
	//$stmt->bind_param('ssssssssss',$objeto["Nombre"],$objeto["Apellido"],$objeto["Mail"],$objeto["Contraseña"],$objeto["Fecha"],$objeto["Peso"],$objeto["Altura"],$objeto["Sexo"],$objeto["Complicaciones"],$objeto["FueAlGym"]);
	$stmt->execute();
	$res = $stmt->get_result();
	*/
}
mysqli_close($con);
?>

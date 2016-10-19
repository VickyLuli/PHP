<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');


if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{
	$Email=$_GET["Email"];
	$query ="SELECT * FROM Usuario WHERE Email='$email'";
	$query_exc=mysqli_query($con, $query);
	$objetos = array();
	while($row=mysqli_fetch_assoc($query_exc)) 
	{ 
		$IdUsuario=$row['IdUsuario'];
		$Email=$row['Email'];
		$Contrasena=$row['Contrasena'];
		$Nombre=$row['Nombre'];
		$Apellido=$row['Apellido'];
		$FechadeNacimiento=$row['FechadeNacimiento'];
		$Sexo=$row['Sexo'];
		$Direccion=$row['Direccion'];
		$Telefono=$row['Telefono'];
		$DNI=$row['DNI'];
		$objeto = array('IdUsuario'=> $IdUsuario, 'Email'=> $Email, 'Contrasena'=> $Contrasena, 'Nombre'=> $Nombre, 'Apellido'=> $Apellido, 'FechadeNacimiento'=> $FechadeNacimiento, 'Sexo'=> $Sexo, 'Direccion'=> $Direccion, 'Telefono'=> $Telefono, 'DNI'=> $DNI);	
		array_push($objetos, $objeto);	
	}
	header("Content-Type: application/json");
	$json = json_encode($objetos, JSON_PRETTY_PRINT);
	echo($json);
}
mysqli_close($con);
?>

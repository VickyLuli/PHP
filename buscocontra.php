<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$Email=$_GET["Email"];
$string = file_get_contents('php://input');
$evento=json_decode($string,true);
$query ="select Contrasena from Usuario WHERE Email='$Email'";
$result = mysqli_query($con, $query);
$objetos = array();
while($row = mysqli_fetch_array($result)) 
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
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_UNESCAPED_UNICODE);
echo $json_string;

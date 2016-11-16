<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');
/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents('php://input');
var_dump($string);
$evento=json_decode($string,true);
var_dump($evento);
$query = "INSERT INTO Usuario (IdUsuario, Email, Contrasena, Nombre, Apellido, FechaNac, Sexo, Direccion, Telefono, DNI) VALUES (?, ?, ?, ?, ?,?,?,?,?,?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
		'iissi',
		$evento["IdUsuario"],
		$evento["Email"],
		$evento["Contrasena"],
		$evento["Nombre"],
		$evento["Apellido"],
		$evento["FechadeNac"],
		$evento["Sexo"],
		$evento["Direccion"],
		$evento["Telefono"],
		$evento["DNI"]
		);
		$stmt->execute();
		echo 
		$evento["IdUsuario"].
		$evento["Email"].
		$evento["Contrasena"].
		$evento["Nombre"].
		$evento["Apellido"].
		$evento["FechadeNac"].
		$evento["Sexo"].
		$evento["Direccion"].
		$evento["Telefono"].
		$evento["DNI"];
		//$stmt->bind_result($con, $query);

mysqli_close($con);
?>

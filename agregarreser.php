<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');
/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents("php://input");
$evento=json_decode($string,true);
$query = "INSERT INTO reserva (Nombre, Email, DNI, Entrada, Fecha, Trago, Total) VALUES (?,?,?,?,?,?,?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
		'sssssss',
		$evento["Nombre"],
		$evento["Email"],
		$evento["DNI"],
		$evento["Entrada"],
		$evento["Fecha"],
		$evento["Trago"],
		$evento["Total"]
		);
$stmt->execute();

mysqli_close($con);
?>

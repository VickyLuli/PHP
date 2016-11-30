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
		'cebp',
		'cebo2',
		'cebo3',
		'cebo4',
		'cebo5',
		'cebo6',
		'cebo7'
		);
		$stmt->execute();
mysqli_close($con);
?>

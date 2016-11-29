<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');
/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$string = file_get_contents("php://input");
$evento=json_decode($string,true);
$query = "INSERT INTO compra (Nombre, Email, DNI, Entrada, Fecha, Total, Titular, Tarjeta, Pago) VALUES (?, ?, ?, ?,?,?,?,?,?)";
$stmt=$con->prepare($query);
$stmt->bind_param(
		'sssssssss',
		$evento["Nombre"],
		$evento["Email"],
		$evento["DNI"],
		$evento["Entrada"],
		$evento["Fecha"],
		$evento["Total"],
		$evento["Titular"],
		$evento["Tarjeta"],
		$evento["Pago"]
		);
		$stmt->execute();
		echo 
		$evento["Nombre"].
		$evento["Email"].
		$evento["DNI"].
		$evento["Entrada"].
		$evento["Fecha"].
		$evento["Total"].
		$evento["Titular"].
		$evento["Tarjeta"].
		$evento["Pago"];
		//$stmt->bind_result($con, $query);
mysqli_close($con);
?>
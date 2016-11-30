<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');
/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		

$string = file_get_contents("php://input");
$evento=json_decode($string,true);
$query = "INSERT INTO reserva (Nombre) VALUES (?)";
echo $evento;
/*
$stmt=$con->prepare($query);
$stmt->bind_param('s',$reserva);
$reserva = "NombreReserva";
$stmt->execute();
$stmt->close();
*/
mysqli_close($con);


?>

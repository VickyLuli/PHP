<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}		
$Email=$_GET["email"];
$string = file_get_contents('php://input');
$evento=json_decode($string,true);
//$query ="select Contrasena from Usuario WHERE Email='$Email'";
$query ="select Contrasena from Usuario;";
$result = mysqli_query($con, $query);
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json");
$json_string = json_encode($result,JSON_UNESCAPED_UNICODE);
echo $json_string;

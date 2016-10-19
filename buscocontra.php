<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb') or die('Error de conexión');

/* verificar conexión */
/*
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    die();
}
*/

//mysql_select_db('noctidb',$con) or die('Cannot select the DB');


if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " .mysqli_connect_error();
}
else
{	
	$email=$_GET["email"];
	$query = "SELECT Contrasena FROM Usuario WHERE Email='$email'";
	$query_exc=mysqli_query($con, $query);
	$usuarios = Array();
		while($row=mysqli_fetch_assoc($query_exc)){
			$usuario = Array(
			"Contrasena" => $row["Contrasena"]
			);
			array_push($usuarios, $usuario);
		}
	
	
	header("Content-Type: application/json");
	$json = json_encode($usuarios, JSON_PRETTY_PRINT);
	echo($json);
}
mysqli_close($con);
?>

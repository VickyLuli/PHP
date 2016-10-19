<?php
$con=mysqli_connect('us-cdbr-azure-east-c.cloudapp.net','ba4f301b5a2fe0','77e42751','noctidb');

/* verificar conexión */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    die();
}

//mysql_select_db('noctidb',$con) or die('Cannot select the DB');


$Email=$_GET["email"];
$string = file_get_contents('php://input');
$evento=json_decode($string,true);
$query ="select Contrasena from Usuario WHERE Email='$Email';";
$result = mysqli_query($con, $query);
mysqli_close($con) or die("Ha sucedido un error inesperado en la desconexion de la base de datos");

/* create one master array of the records */
	$posts = array();
	if(mysql_num_rows($result)) {
		while($post = mysql_fetch_assoc($result)) {
			$posts[] = array('usuario'=>$post);
		}
	}

    header('Content-type: application/json');
    echo json_encode(array('posts'=>$posts),JSON_UNESCAPED_UNICODE);

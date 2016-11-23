<?php
$servername = "us-cdbr-azure-east-c.cloudapp.net";
$username = "ba4f301b5a2fe0";
$password = "77e42751";
$dbname = "noctidb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO Usuario (Email, Contrasena, Nombre, Apellido, FechadeNac, Sexo, Direccion, Telefono, DNI)
VALUES (?,?,?,?,?,?,?,?,?)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
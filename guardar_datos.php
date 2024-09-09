<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "formulario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}

// Obtener los datos del formulario
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];

// Preparar la consulta SQL para insertar los datos en la tabla
$sql = "INSERT INTO formulario (clave, nombre, ap_paterno, ap_materno, edad, genero)
VALUES ('$clave', '$nombre', '$ap_paterno', '$ap_materno', '$edad', '$genero')";

// Ejecutar la consulta y verificar si se realizó con éxito
if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
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

// Obtener la clave del formulario de búsqueda
$clave = $_POST['clave'];

// Preparar la consulta SQL para buscar los datos en la tabla
$sql = "SELECT * FROM formulario WHERE clave = '$clave'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos encontrados en el formulario de búsqueda
    $row = $result->fetch_assoc();
    echo "Nombre: " . $row["nombre"] . "<br>";
    echo "Apellido Paterno: " . $row["ap_paterno"] . "<br>";
    echo "Apellido Materno: " . $row["ap_materno"] . "<br>";
    echo "Edad: " . $row["edad"] . "<br>";
    echo "Género: " . $row["genero"] . "<br>";
} else {
    echo "No se encontraron datos para la clave proporcionada";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

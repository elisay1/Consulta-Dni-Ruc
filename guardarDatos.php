<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prueba_dni_ruc";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recuperar los datos del formulario
$dni = $_POST['dni'];
$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];

// Realizar la inserción en la base de datos
$sql = "INSERT INTO personas(person_nom, person_apellido_p, person_apellido_m, person_dni) VALUES ('$nombre', '$apellidoPaterno', '$apellidoMaterno', '$dni')";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados con éxito";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

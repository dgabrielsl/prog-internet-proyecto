<?php
$usuario = "root";
$clave = "";
$bbdd = "vip_tickets_solutions";
$equipo = "localhost";

// Conectar a la base de datos
$conn = mysqli_connect($equipo, $usuario, $clave, $bbdd);

// Consulta para obtener el valor de act_user de la tabla 'session'
$query = "SELECT act_user FROM session LIMIT 1";
$result = mysqli_query($conn, $query);

// Preparar datos para JSON
$data = array('username' => 'No user found');

// Comprobar si se obtuvo un resultado
if ($row = mysqli_fetch_assoc($result)) {
    $data['username'] = $row['act_user'];
}

// Devolver el resultado en formato JSON
header('Content-Type: application/json');
echo json_encode($data);

// Cerrar la conexión
mysqli_close($conn);
?>

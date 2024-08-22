<?php
$usuario = "root";
$clave = "";
$bbdd = "vip_tickets_solutions";
$equipo = "localhost";

$conn = mysqli_connect($equipo, $usuario, $clave, $bbdd);

$query = "SELECT act_user FROM session LIMIT 1";
$result = mysqli_query($conn, $query);

$data = array('username' => 'No user found');

if($row = mysqli_fetch_assoc($result)) {
    $data['username'] = $row['act_user'];
};

header('Content-Type: application/json');
echo json_encode($data);

mysqli_close($conn);
?>

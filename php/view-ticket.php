<?php
$usuario = "root";
$clave = "";
$bbdd = "vip_tickets_solutions";
$equipo = "localhost";

$conn = mysqli_connect($equipo, $usuario, $clave, $bbdd);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
};

$fieldName = key($_POST);
$ticketID = $_POST[$fieldName];


$query = "SELECT * FROM tickets WHERE id = '$ticketID'";
$result = mysqli_query($conn, $query);
printf($query);

$data = array();

if($result){
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    };
};

$json_data = json_encode($data);
header("Location: ../html/open-ticket.html?res=" . urlencode($json_data));

mysqli_close($conn);
?>
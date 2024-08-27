<?php
$usuario = "root";
$clave = "";
$bbdd = "vip_tickets_solutions";
$equipo = "localhost";

$conn = mysqli_connect($equipo, $usuario, $clave, $bbdd);

$query = "SELECT * FROM tickets";
$result = mysqli_query($conn, $query);

$data = array();

if($result && mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    };
}else{
    $data = array('message' => 'No hay tickets nuevos.');
};

$json_data = json_encode($data);

header("Location: ../html/home.html?res=" . urlencode($json_data));
exit();

mysqli_close($conn);
?>

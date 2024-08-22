<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vip_tickets_solutions";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Conexión fallida: " . $conn->connect_error);
};

$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="shortcut icon" href="../media/favicon.ico" type="image/x-icon">
    <style>
        table{
            width: 100%;
            border-collapse: collapse;
        }
        table tr:nth-child(odd){
            background-color: #ffd9c7;
        }
        table,
        th,
        td{
            border: 1px solid black;
        }
        th{
            padding: 1em 0 .25em;
            background-color: #571400;
            color: #fff;
            text-align: center;
        }
        td{
            padding: .25em;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Inventario de Equipos</h1>

    <?php
    if($result->num_rows > 0){
        echo "<table>";
        echo "<tr><th>Nombre</th><th>Marca</th><th>Modelo</th><th>Serie</th><th>Insertado por</th><th>Fecha</th><th>Hora</th></tr>";

        while($row = $result -> fetch_assoc()){
            echo "<tr>";
            echo "<td>" . $row["act_name"] . "</td>";
            echo "<td>" . $row["act_brand"] . "</td>";
            echo "<td>" . $row["act_model"] . "</td>";
            echo "<td>" . $row["act_serial"] . "</td>";
            echo "<td>" . $row["inserted_by"] . "</td>";
            echo "<td>" . $row["log_date"] . "</td>";
            echo "<td>" . $row["time_mark"] . "</td>";
            echo "</tr>";
        };
        echo "</table>";
    }else{
        echo "No se encontraron registros.";
    };

    $conn->close();
    ?>

</body>
</html>
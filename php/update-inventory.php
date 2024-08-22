<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vip_tickets_solutions";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Conexión fallida: " . $conn->connect_error);
};

$act_name = $_POST['act-name'];
$act_brand = $_POST['act-brand'];
$act_model = $_POST['act-model'];
$act_serial = $_POST['act-serial'];
$inserted_by = $_POST['inserted-by'];

$log_date = date('Y-m-d');
$time_mark = date('H:i:s');

$insertQuery = "INSERT INTO inventory (act_name, act_brand, act_model, act_serial, inserted_by, log_date, time_mark) VALUES ('$act_name', '$act_brand', '$act_model', '$act_serial', '$inserted_by', '$log_date', '$time_mark')";

if($conn -> query($insertQuery) === TRUE){
    header("Location: ../html/inventory.html?act_name=" . $act_name . "&act_brand=" . $act_brand . "&act_model=" . $act_model . "&act_serial=" . $act_serial);
}else{
    header("Location: ../html/inventory.html?error=1");
};

$conn->close();
?>

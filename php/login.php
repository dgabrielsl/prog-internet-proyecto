<?php
$usuario = "root";
$clave = "";
$bbdd = "vip_tickets_solutions";
$equipo = "localhost";

$conn = mysqli_connect($equipo, $usuario, $clave, $bbdd);

if(!$conn){
    die("Error de conexión: " . mysqli_connect_error());
};

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['login-page-input-username'];
    $password = $_POST['login-page-input-password'];

    $query = "SELECT * FROM usermanager WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        header("Location: ../php/general-board.php?username=" . urldecode($username));
        
        $deleteQuery = "DELETE FROM session";
        mysqli_query($conn, $deleteQuery);
        
        $insertQuery = "INSERT INTO session (act_user) VALUES ('$username')";
        mysqli_query($conn, $insertQuery);
        
        exit();
    }else{
        header("Location: ../index.html?error=1");
    };
};

mysqli_close($conn);
?>
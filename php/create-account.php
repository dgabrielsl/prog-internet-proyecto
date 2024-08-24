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
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['password-confirm'];
    $adminUsername = $_POST['admin-username'];
    $adminPassword = $_POST['admin-password'];

    $query = "SELECT * FROM usermanager WHERE username='$adminUsername' AND password='$adminPassword'";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){
        if($password == $confirmPassword){
            $insertQuery = "INSERT INTO usermanager (username, password) VALUES ('$username', '$password')";
            if(mysqli_query($conn, $insertQuery)){
                header("Location: ../index.html?username=" . urlencode($username) . "&success=1");
                exit();
            }else{
                echo "Error: " . mysqli_error($conn);
            };
        }else{
            header("Location: ../html/signup.html?error=2");
            exit();
        }
    }else{
        header("Location: ../html/signup.html?error=1");
        exit();
    };
};

mysqli_close($conn);
?>
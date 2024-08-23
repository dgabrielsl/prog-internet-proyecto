<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vip_tickets_solutions";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Conexión fallida: " . $conn->connect_error);
};

$ticket_username = $_POST['ticket-form-username'];
$ticket_subject = $_POST['ticket-form-subject'];
$ticket_description = $_POST['ticket-form-description'];
$ticket_priority = $_POST['tbf-priority-options'];

$upload_dir = "../uploads/";
$file_name = $_FILES['ticket-form-file']['name'];
$file_tmp = $_FILES['ticket-form-file']['tmp_name'];
$file_error = $_FILES['ticket-form-file']['error'];

if($file_error === UPLOAD_ERR_OK){
    $file_path = $upload_dir . basename($file_name);
    move_uploaded_file($file_tmp, $file_path);
}else{
    $file_path = null;
};

$date_mark = date('Y-m-d');
$time_mark = date('H:i:s');

$sql = "INSERT INTO tickets (username, ticket_subject, ticket_description, priority, file_path, ticket_status, assigned_to, date_mark, time_mark) 
        VALUES ('$ticket_username', '$ticket_subject', '$ticket_description', '$ticket_priority', '$file_path', 'Nuevo', 'Pendiente', '$date_mark', '$time_mark')";

if($conn->query($sql) === TRUE){
    header("Location: ../html/ticket.html?success=" . urlencode($ticket_subject));
    exit();
}else{
    header("Location: ../html/ticket.html?error=1");
    exit();
};

$conn->close();
?>
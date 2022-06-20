<?php
function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}

$servername = "localhost";
$username = "root@";
$password = "123456";
$dbname = "pweb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// prepare and bind
$stmt = $conn->prepare("UPDATE requests SET idPedido=?, com_venda=?, respondido=?, finalizado=? WHERE idPedido=?");
$stmt->bind_param("isssi", $idPedido, $com_venda, $respondido, $finalizado, $idPedido);

// set parameters and execute
$idPedido = $_POST['id'];
$com_venda = $_POST['com_venda'];
$respondido = $_POST['respondido'];
$finalizado = $_POST['finalizado'];

$stmt->execute();


$stmt->close();
$conn->close();




Redirect('requests_crud.php', false);
?>
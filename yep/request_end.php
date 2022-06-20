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
$stmt = $conn->prepare("INSERT INTO requests (idPedido, nome, email, whatsapp, mensagem, data_inclusao, respondido, com_venda, finalizado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("isssssiii", $idPedido, $nome, $email, $whatsapp, $mensagem, $data_inclusao, $respondido, $com_venda, $finalizado);

// set parameters and execute


$idPedido = '';
$nome = $_POST['nome'];
$email = $_POST['email'];
$whatsapp = $_POST['whatsapp'];
$mensagem = $_POST['mensagem'];
$data_inclusao = date('Y/m/d');
$respondido = 0;
$com_venda = 0;
$finalizado = 0;

$stmt->execute();

$stmt->close();
$conn->close();

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style_interface_cliente.css">
</head>

<html>
    <br><br>
    <h1>RECEBEMOS SUA MENSAGEM!</h1><br><br>
    <h1><a class='edit' style='text-align:center;' href='interface_cliente.php'>VOLTAR</a><h1>


</html>
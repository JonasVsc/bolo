<?php
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
?>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style_interface_cliente.css">
</head>

<h1>MENU</h1>


</html>

<?php

$sql = "SELECT idPedido, foto, descricao, valor, numero_fatias, data_inclusao, categoria FROM pedidos_clientes ORDER BY categoria";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $i = 0;
  echo "<div class='row'>";
  while($row = $result->fetch_assoc()) {

    // variavel do caminho da imagem
    $imageURL = 'uploads/'.$row["foto"];
    //variaveis para cada bolo
    $id[] = $row['idPedido'];
    $image[] = $imageURL;
    $categoria[] = $row['categoria'];
    $valor[] = $row['valor'];
    $numero_fatias[] = $row['numero_fatias'];
    $descricao[] = $row['descricao'];
    $upper = strtoupper($row['descricao']);
    $data_inclusao[] = $row['data_inclusao'];
    
    
    echo "
        <div class='column'>
          <table>
            <tr>
            
                <th>".$upper."</th>
            </tr>
            <tr>
                <th><img src='".$imageURL."'/></th>
            </tr>
            <tr>
                <td>". $row['categoria'] ."</td>
            </tr>
            <tr>
                <td><a class='edit' href='form_cliente.php?id=". $id[$i] ."&
                image=".$image[$i]."&
                categoria=".$categoria[$i]."&
                valor=".$valor[$i]."&
                numero_fatias=".$numero_fatias[$i]."&
                descricao=".$descricao[$i]."&
                data_inclusao=".$data_inclusao[$i]."'>Enviar Mensagem</a></td>
            </tr>
          </table>
        </div>
        ";
        
        $i = $i + 1;

  }
  echo "</div>";


} else {
    echo "</table>";
    echo "<h1>ERRO</h1>";
  
}
?>


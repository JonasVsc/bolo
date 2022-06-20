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

<html>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>CRUD</title>
    </head>

    
</html>

<style><?php include 'style.css'; ?></style>

<?php
random_int(1, 5);
switch (random_int(1,5)) {
  case 1:
    echo "<h2>\"O homem não teria alcançado o possível se, repetidas vezes, não tivesse tentado o impossível.\"</h2>";
    break;
    case 1:
      echo "<h2>\"Creia em si, mas não duvide sempre dos outros.\"</h2>";
      break;
    case 2:
      echo "<h2>\"Você é o que você faz, não o que diz que vai fazer.\"</h2>";
      break;
    case 3:
      echo "<h2>\"Para ter um negócio de sucesso, alguém, algum dia, teve que tomar uma atitude de coragem.\"</h2>";
      break;
    case 4:
      echo "<h2>\"Trabalhar duro te levará para cima, aproveitar o caminho te levará mais longe.\"</h2>";
      break;
    case 5:
      echo "<h2>\"Sonhe sem medos, viva sem limites.\"</h2>";
      break;
  
  default:
    echo "<h2>:D</h2>";
    break;
}


$sql = "SELECT idPedido, foto, descricao, valor, numero_fatias, data_inclusao, categoria FROM pedidos_clientes ORDER BY idPedido";
$result = $conn->query($sql);

echo "<p><a class='create' href='insert_form.html'>Criar</a> <a class='requests' href='requests_crud.php'>Ver Mensagens</a></p>";


echo "
  <table>
    <tr>
        <th>ID</th>
        <th>FOTO</th>
        <th>CATEGORIA</th>
        <th>VALOR</th>
        <th>FATIAS</th>
        <th>DESCRIÇÃO</th>
        <th>DATA DE INCLUSÃO</th>
        <th>...</th>
        <th>...</th>
    </tr>
  ";

if ($result->num_rows > 0) {
  $i = 0;
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
    $data_inclusao[] = $row['data_inclusao'];
    
    
    echo "
        <tr>
            <td>". $row['idPedido'] ."</td>
            <td> <img class='thumbnail' src='".$imageURL."'/> </td>
            <td>". $row['categoria'] ."</td>
            <td>". $row['valor'] ."</td>
            <td>". $row['numero_fatias'] ."</td>
            <td class='cell-breakword'>". $row['descricao']."</td>
            <td>". $row['data_inclusao'] ."</td>
            <td><a class='edit' href='update_form.php?
            id=". $id[$i] ."&
            image=".$image[$i]."&
            categoria=".$categoria[$i]."&
            valor=".$valor[$i]."&
            numero_fatias=".$numero_fatias[$i]."&
            descricao=".$descricao[$i]."&
            data_inclusao=".$data_inclusao[$i]."
            '>Editar</a></td>
            <td><a class='delete' href='delete.php?id=". $id[$i] ."'>Excluir</a></td>
        </tr>";
        
        $i = $i + 1;

  }
  echo "</table>";

//debug


} else {
    echo "</table>";
    echo "<h1>SEM RESULTADOS.</h1>";
  
}
$conn->close();

?>
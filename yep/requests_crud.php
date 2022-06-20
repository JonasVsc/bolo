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
        <link rel="stylesheet" href="style_requests_crud.css">
        <title>CRUD</title>
    </head>

    
</html>


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


$sql = "SELECT idPedido, nome, email, whatsapp, mensagem, data_inclusao, respondido, com_venda, finalizado FROM requests ORDER BY idPedido";
$result = $conn->query($sql);

echo "<p><a class='return' href='crud.php'>Voltar</a></p>";


echo "
  <table>
    <tr>
        <th>ID PEDIDO</th>
        <th>CLIENTE</th>
        <th>EMAIL</th>
        <th>WHATSAPP</th>
        <th>MENSAGEM</th>
        <th>DATA RECEBIMENTO</th>
        <th>Venda</th>
        <th>Respondido</th>
        <th>Finalizado</th>
        <th>Enviar Resposta</th>
        <th>...</th>
        <th>...</th>
    </tr>
  ";

if ($result->num_rows > 0) {
  $i = 0;
  while($row = $result->fetch_assoc()) {

    // variavel do caminho da imagem
    //variaveis para cada bolo
    $id[] = $row['idPedido'];
    $nome[] = $row['nome'];
    $email[] = $row['email'];
    $whatsapp[] = $row['whatsapp'];
    $searchString = " ";
    $replaceString = "";

    $mensagem[] = $row['mensagem'];
    $data_inclusao[] = $row['data_inclusao'];
    $respondido[] = $row['respondido'];
    $com_venda[] = $row['com_venda'];
    $finalizado[] = $row['finalizado'];
    
    //texto de resposta
    $text = "Olá! Aqui é a confeitaria X, recebemos uma solicitação sua";

    //check link is clicked
    
    echo "
        <tr>
            <td>". $row['idPedido'] ."</td>
            <td>".$row['nome']."</td>
            <td class='cell-breakWord'>". $row['email'] ."</td>
            <td>".$row['whatsapp']."</td>
            <td class='cell-breakWord'>". $row['mensagem'] ."</td>
            <td>". $row['data_inclusao']."</td>
            <td>". $row['com_venda']."</td>
            <td>". $row['respondido']."</td>
            <td>". $row['finalizado']."</td>
            <td><a href='https://wa.me/".$row['whatsapp']."/?text=$text'>Whatsapp</a>
            <a href = 'mailto:".$row['email']."?subject = Feedback&body = Message'>Email</a></td>
            <td><a class='edit' href='requests_update_form.php?
            id=". $id[$i] ."&
            nome=".$nome[$i]."&
            email=".$email[$i]."&
            whatsapp=".$whatsapp[$i]."&
            mensagem=".$mensagem[$i]."&
            data_inclusao=".$data_inclusao[$i]."&
            respondido=".$respondido[$i]."&
            com_venda=".$com_venda[$i]."&
            finalizado=".$finalizado[$i]."
            '>Editar</a></td>
            <td><a class='delete' href='requests_delete.php?id=". $id[$i] ."'>Excluir</a></td>
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
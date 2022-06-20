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
//upload file
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
$statusMsg = '';

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
  // Allow certain file formats
  $allowTypes = array('jpg','png','jpeg','gif','pdf');
  if(in_array($fileType, $allowTypes)){
      // Upload file to server
      if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
          // Insert image file name into database
          $stmt = $conn->prepare("INSERT INTO pedidos_clientes (idPedido, foto, descricao, valor, numero_fatias, data_inclusao, categoria) VALUES (?, ?, ?, ?, ?, ?, ?)");
          $stmt->bind_param("issiiss", $idPedido, $fileName, $descricao, $valor, $numero_fatias, $data_inclusao, $categoria);

          // set parameters and execute
          $idPedido = '';
          $descricao = $_POST['descricao'];
          $valor = $_POST['valor'];
          $numero_fatias = $_POST['numero_fatias'];
          $data_inclusao = $_POST['data_inclusao'];
          $categoria = $_POST['categoria'];

          $stmt->execute();

          $stmt->close();
          $conn->close();

          Redirect('crud.php', false);

          if($stmt){
              $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
          }else{
              $statusMsg = "File upload failed, please try again.";
          } 
      }else{
          $statusMsg = "Sorry, there was an error uploading your file.";
      }
  }else{
      $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
  }
}else{
  $statusMsg = 'Please select a file to upload.';
}




// prepare and bind
$stmt = $conn->prepare("INSERT INTO pedidos_clientes (idPedido, foto, descricao, valor, numero_fatias, data_inclusao, categoria) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("issiiss", $idPedido, $fileName, $descricao, $valor, $numero_fatias, $data_inclusao, $categoria);

// set parameters and execute


$idPedido = '';
$descricao = $_POST['descricao'];
$valor = $_POST['valor'];
$numero_fatias = $_POST['numero_fatias'];
$data_inclusao = $_POST['data_inclusao'];
$categoria = $_POST['categoria'];

$stmt->execute();

$stmt->close();
$conn->close();


Redirect('crud.php', false);

?>
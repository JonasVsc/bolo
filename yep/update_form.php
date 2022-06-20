<html>

<head>
    <meta charset="UTF-8">
    <title>Confeitaria X</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_form.css">


</head>


<body>
    <div>
    <h1>Editar bolo</h1>

    <?php echo"<form method='post' action='update.php' enctype='multipart/form-data'>"?>

        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <label for='descricao'>Descrição:</label><br>
        <?php echo "<input type='text' name='descricao' value='".$_GET['descricao']."'><br>"?>

        <label for='file'>Imagem:</label><br>
        <?php echo "<input type='file' name='file' value='".$_GET['image']."'><br>"?>

        <label for='valor'>Valor:</label><br>
        <?php echo "<input type='number' name='valor' value='".$_GET['valor']."'><br><br>"?>

        <label for='numero_fatias'>Nº Fatias:</label><br>
        <?php echo "<input type='number' name='numero_fatias' value='".$_GET['numero_fatias']."'><br><br>"?>

        <label for='data_inclusao'>Data:</label><br>
        <?php echo "<input type='date' name='data_inclusao' value='".$_GET['data_inclusao']."'><br><br>"?>

        <label for='categoria'>Categoria:</label><br>
        <?php echo "<input type='text' name='categoria' value='".$_GET['categoria']."'><br><br>"?>

        <input type='submit' value='Confirmar' name='submit'>
        </form>

    </div>
</body>

</html>
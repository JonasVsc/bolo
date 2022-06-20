<html>

<head>
    <meta charset="UTF-8">
    <title>Confeitaria X</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style_form.css">


</head>


<body>
    <div>
    <h1>Editar pedido</h1>

    <?php echo"<form method='post' action='request_update.php' enctype='multipart/form-data'>"?>

        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">

        <label for='descricao'>Venda:</label><br>
        <?php echo "<input type='text' name='com_venda' value='".$_GET['com_venda']."'><br>"?>

        <label for='valor'>Respondido:</label><br>
        <?php echo "<input type='text' name='respondido' value='".$_GET['respondido']."'><br><br>"?>

        <label for='finalizado'>Finalizado:</label><br>
        <?php echo "<input type='text' name='finalizado' value='".$_GET['finalizado']."'><br><br>"?>


        <input type='submit' value='Confirmar' name='submit'>
        </form>

    </div>
</body>

</html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Confeitaria X</title>
    <link rel="stylesheet" href="style_cliente_form.css">


</head>


<body>
    <div>
    <?php echo "<img src='".$_GET['image']."'/>"; ?>
    <h1>Enviar Mensagem</h1>

    <?php echo"<form method='post' action='request_end.php' enctype='multipart/form-data'>"?>

        <label for='nome'>Nome:</label><br>
        <?php echo "<input type='text' name='nome' class='nome' value='' required><br>"?>

        <label for='email'>Email:</label><br>
        <?php echo "<input type='text' name='email' class='email' value='' required><br>"?>

        <label for='whatsapp'>Whatsapp:</label><br>
        <?php echo "<input type='tel' name='whatsapp' class='whatsapp' value='' placeholder='(DDI)(DDD)(TELEFONE)' pattern='[0-9]{15}' required><br><br>"?>

        <label for='mensagem'>Mensagem:</label><br>
        <?php echo "<textarea name='mensagem' rows='4' cols='50' placeholder='Oque gostou no bolo? O que quer mudar? Qual o tema do bolo desejado? O que quer no topo do bolo?' required></textarea><br>"?>

        <input type='submit' value='Confirmar' name='submit'>
        </form>

    </div>
</body>

</html>
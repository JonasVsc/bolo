<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style_interface_bolo_escolhido.css">
</head>

<h1>Escolhido</h1>


<?php
    echo "<img src='".$_GET['image']."'/>";
?>
<h2>Enviar Mensagem:</h2>

<div>
    

    <form method='post' action='request_end.php' enctype="multipart/form-data">
        <label for='nome'>Nome:</label>
        <input type='text' name='nome' value=''><br><br>

        <label for='email'>Email:</label>
        <input type='text' name='email' value=''><br><br>

        <label for='whatsapp'>WhatsApp:</label>
        <input type='tel' name='whatsapp' value='' placeholder="(DDI)(DDD)(TELEFONE)" pattern='[0-9]{15}' required><br><br>

        <label for='mensagem'>Mensagem:</label>
        <input type='text' name='mensagem' value=''><br><br>

        <input type='submit' value='Confirmar' name='submit'>
        </form>

    </div>

</html>
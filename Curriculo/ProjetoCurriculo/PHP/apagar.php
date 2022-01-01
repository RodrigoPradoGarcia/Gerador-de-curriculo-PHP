<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' href='../Estilos/index.css'>
    <link rel='stylesheet' href='../Estilos/curriculo.css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apagar Currículos</title>
</head>
<body>
    <style>
        *{
            font-family:sans-serif;
        }
    </style>

    <section class="pagina" style='margin:0; padding:0; min-height:100vh;width:100vw;'>

    <?php
        include "funcoes.php";
        apagarCurriculos();
    ?>
    <div style='display:flex;align-items:center;justify-content:center;height:100vh;width:100vw'>
        <div class='telaErro' style='text-align:center'>
            <i class="fas fa-trash-alt" style='margin-bottom:40px;font-size:100px;color:red;'></i>
            <h1 style='margin-bottom:10px;'>Todos os currículos foram apagados</h1>
            <h4 style='margin-bottom:40px;'>menos o do Rodrigo ;)</h4>
            <a href='../index.html' class='formBotao' style='text-decoration:none;'>Voltar</a>
        </div>
    </div>
    <script src='https://kit.fontawesome.com/d08166f469.js' crossorigin='anonymous'></script>
    <section>
</body>
</html>
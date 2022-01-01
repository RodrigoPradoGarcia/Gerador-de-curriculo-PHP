<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' href='../Estilos/index.css'>
    <link rel='stylesheet' href='../Estilos/curriculo.css'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Currículos</title>
</head>
<body>

    <header style='z-index:10;font-weight:900;box-shadow:0px 4px 4px black;padding:20px 0;background:#222222;display:flex;align-items:center;width:100vw;'>
            <div>
                <h5><a href='../index.html' class='voltar' style='padding:10px 20px;margin:0px 20px;border-radius:20px;font-size:16px;'><i class="fas fa-arrow-alt-circle-left" style='margin-right:10px;'></i>voltar</a></h5>
            </div>
            <div class='mx-4'>
                <h3 style='font-weight:900;color:rgb(253,132,105);text-shadow:1px 1px 1px black;'>Recrutamento</h3>
            </div>
    </header>

        <?php
            include "funcoes.php";
            echo "<section class='pagina' style='margin:0; padding:50px 0; min-height:100vh;width:100vw;'>";
            echo "<div style='display:flex;flex-direction:column;justify-content:center;align-items:center;'>";
                lerCurriculos();
            echo "</div>";
            echo "</section>";
        ?>
        
    <script src="https://kit.fontawesome.com/d08166f469.js" crossorigin="anonymous"></script>
</body>
</html>
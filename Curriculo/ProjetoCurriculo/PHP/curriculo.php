<html>
    <head>
        <link rel='stylesheet' href='../Estilos/index.css'>
        <link rel='stylesheet' href='../Estilos/curriculo.css'>
        <title>Modelo Currículo</title>
    </head>
<body style='display:flex;flex-direction:column;align-items:center;'>

    <section class="pagina" style='margin:0; padding:0; min-height:100vh;width:100vw;'>

    <header style='z-index:10;font-weight:900;box-shadow:0px 4px 4px black;padding:20px 0;background:#222222;display:flex;align-items:center'>
            <div>
                <h5><a href='javascript:window.history.back()' class='voltar' style='padding:10px 20px;margin:0px 20px;border-radius:20px;font-size:16px;'><i class="fas fa-arrow-alt-circle-left" style='margin-right:10px;'></i>voltar</a></h5>
            </div>
            <div class='mx-4'>
                <h3 style='font-weight:900;color:rgb(64,189,255);text-shadow:1px 1px 1px black;'>Pré-visualização do Currículo</h3>
            </div>
    </header>

        <?php
            include "funcoes.php";
            camposObrigatorios();
            uploadFoto();

            if($_POST['botao'] === "Publicar currículo") // verifica se a pessoa enviou o formulário pelo botão 'publicar currículo'
            {
                gravar_arquivos();
                echo "<div style='display:flex;align-items:center;justify-content:center;height:100vh;width:100vw'>";
                echo "<div class='telaErro' style='text-align:center'>";
                echo "<i class='fas fa-check-circle' style='margin-bottom:40px;font-size:100px;color:green;'></i>";
                echo "<h1 style='margin-bottom:40px;'>Seu currículo foi cadastrado com sucesso!</h1>";
                echo "<a href='../index.html' class='formBotao' style='text-decoration:none;'>Terminar<a>";
                echo "</div>";
                echo "<script src='https://kit.fontawesome.com/d08166f469.js' crossorigin='anonymous'></script>";
                exit(0);
            }

            $arquivo = fopen('../Curriculos/quantidadeDeCurriculos.txt','r');
            $quantidade  = fgets($arquivo);
            $quantidade++;
            fclose($arquivo);
            $nome = $_FILES['fotoCurriculo']['name'];
            $fotoCurriculo = (@($_FILES['fotoCurriculo']['size']==0)?"../img/PrimeiroModelo/usuario.png":"..\UploadFotos\\Curriculo$quantidade".substr($nome,strrpos($nome,".")));
            printar_curriculo($_POST,$fotoCurriculo);
        ?>

    </body>

    <script src="https://kit.fontawesome.com/d08166f469.js" crossorigin="anonymous"></script>
</html>
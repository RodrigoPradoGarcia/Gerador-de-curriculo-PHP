<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../Estilos/index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Currículo</title>
</head>
<body>

<?php

        $prosseguir = true;
        $erros = [];

        if($_POST['numFormacoes'] < 1)
        {
            $prosseguir=false;
            $erros[] = "<h2>Você precisa colocar pelo menos 1 Formação</h2>";
        }
        if($_POST['numHardSkills']<1)
        {
            $prosseguir=false;
            $erros[] = "<h2>Você precisa colocar pelo menos 1 Hard Skill</h2>";
        }
        if($_POST['numSoftSkills']<1)
        {
            $prosseguir=false;
            $erros[] = "<h2>Você precisa colocar pelo menos 1 Soft Skill</h2>";
        }
        if(!$prosseguir)
        {
            echo "<section class='pagina container-fluid m-0 p-0 d-flex justify-content-center align-items-center' style='min-height:100vh;'>";
            echo "<div class='telaErro'>";

            echo "<i class='fas fa-exclamation-circle mb-5' style='font-size:100px;color:red;'></i>";

            foreach($erros as $valor)
            {
                echo "$valor<br>";
            }
            echo "<div style='margin:50px 0;'><a class='btn formBotao' href='../formulario.html'>voltar</a></div>";
            echo "</div>";
            echo "</section>";
            echo "<script src='https://kit.fontawesome.com/d08166f469.js' crossorigin='anonymous'></script>";
            exit(0);
        }

        $hard = $_POST['numHardSkills'];
        $soft = $_POST['numSoftSkills'];
        $form = $_POST['numFormacoes'];
        $exp = $_POST['numExperiencias'];
    ?>


    <section class="pagina container-fluid m-0 p-0">

    <header class='py-3 bg-dark d-flex flex-column flex-md-row align-items-center py-2' style='font-weight:900;box-shadow:0px 4px 4px black'>
        <div>
        <h5><a href='../formulario.html' class='voltar' style='padding:10px 20px;margin:0px 20px;border-radius:20px;font-size:16px;'><i class="fas fa-arrow-alt-circle-left" style='margin-right:10px;'></i>voltar</a></h5>
        </div>
        <div class='mx-4'>
            <h3 style='font-weight:900;color:rgb(64,189,255);text-shadow:1px 1px 1px black;'>Cadastro de Currículo</h3>
        </div>
    </header>

    <div>
        <form action='curriculo.php' method='post' name='formCurriculo' enctype='multipart/form-data'>
                <div class='d-flex flex-column align-items-center'>
                    <div class='bg-light p-5 m-5 form-secao'>
                        <h1 class='titulo'>Dados Pessoais</h1>
                        <div class='form-item'>
                            <h4>Foto do currículo (opcional)</h4>
                            <input type='file' name='fotoCurriculo'>
                        </div>
                        <div class='form-item'>
                            <h4>Nome</h4>
                            <input type='text' name='nomeCandidato'>
                        </div>
                        <div class='form-item'>
                            <h4>Título (opcional)</h4>
                            <input type='text' name='tituloCandidato'>
                        </div>
                        <div class='form-item'>
                            <h4>Perfil Pessoal</h4>
                            <textarea  placeholder="Diga um pouco sobre você..." rows='5' type='text' name='perfilCandidato'></textarea>
                        </div>
                        <div class='form-item'>
                            <h4>Objetivo</h4>
                            <textarea  placeholder="Escreva o seu cargo almejado..." rows='3' type='text' name='objetivoCandidato'></textarea>
                        </div>
                        <div class='form-item'>
                            <h4>Telefone</h4>
                            <input type='text' placeholder='oo ooooo-oooo' name='telefoneCandidato'>
                        </div>
                        <div class='form-item'>
                            <h4>E-mail</h4>
                            <input type='email' placeholder='seu_email@email.com' name='emailCandidato'>
                        </div>
                        <div class='form-item'>
                            <h4>Cidade</h4>
                            <input type='text'  name='cidadeCandidato'>
                        </div>
                        <div class='form-item'>
                            <h4>Estado</h4>
                            <select name='estadoCandidato'>
                                <option value='NULL'>selecione um estado...</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AM">Amazonas</option>
                                <option value="AP">Amapá</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiais</option>
                                <option value="MA">Maranhão</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PE">Perbambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="PN">Paraná</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SE">Sergipe</option>
                                <option value="SP">São Paulo</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                        <div class='form-item'>
                            <h4>Linkedin (opcional)</h4>
                            <input type='text'  name='linkedinCandidato'>
                        </div>
                    </div>

                    <div class='bg-light p-5 m-5 form-secao'>
                        <h1 class='titulo'>Formações</h1>
                        <?php
                            for($i=0;$i<$form;$i++)
                            {
                                echo"<div class='form-item mb-3'>
                                <h4>Tipo de formação:</h4>
                                <select name='tipoFormacao[]' style='margin-bottom:20px;'>
                                    <option value='NULL'selected>Selecione uma opção...</option>
                                    <option value='Técnico'>Técnico</option>
                                    <option value='Graduação'>Graduação</option>
                                    <option value='Pós-graduacao'>Pós-graduação</option>
                                    <option value='Especializacao'>Especialização</option>
                                    <option value='Mestrado'>Mestrado</option>
                                    <option value='Doutorado'>Doutorado</option>
                                </select>
                                <h4>Nome do curso</h4>
                                <input  style='margin-bottom:20px;' type='text' name='nomeCurso[]'>
                                <h4>Nome da instituição</h4>
                                <input  style='margin-bottom:20px;' type='text' name='nomeInstituicao[]'>
                                <h4>Ano de entrada</h4>
                                <input style='margin-bottom:20px;' type='number' name='anoEntrada[]'>
                                <h4>Ano de saída</h4>
                                <input style='margin-bottom:20px;' type='number' name='anoSaida[".$i."]'>
                                <div class='d-flex container align-items-center'><input style='height:30px;width:30px;margin-right:10px;' type='checkbox' name='anoSaida[".$i."]' value='cursando'><h6 class=' m-0 ml-3 p-0'>Ainda estou cursando</h6></div>
                                </div>";
                                echo "<hr class='my-5' style='height:2px;'>";
                            }
                        ?>
                    </div>

                    <div class='bg-light p-5 m-5 form-secao'>
                        <h1 class='titulo'>Hard Skills</h1>
                            <?php

                                for($i=0;$i<$hard;$i++)
                                {

                                    echo "<div class='form-item mb-3'>

                                    <h4>Hard-Skill:</h4>
                                    <textarea style='padding:10px;' name='hard-skill[]' placeholder='Descreva sua competências...'  rows='3'></textarea>
                
                                </div>";

                                }

                            ?>
                    </div>

                    <div class='bg-light p-5 m-5 form-secao'>
                        <h1 class='titulo'>Soft Skills</h1>
                        <?php

                            for($i=0;$i<$soft;$i++)
                            {

                                echo "<div class='form-item mb-3'>

                                <h4>Soft-Skill:</h4>
                                <textarea style='padding:10px;' name='soft-skill[]' placeholder='Descreva sua qualidades...'  rows='3'></textarea>
            
                            </div>";

                            }

                        ?>
                    </div>

                    <div class='bg-light p-5 m-5 form-secao'>
                        <?php ($exp>0)?print "<h1 class='titulo'>Experiências</h1>":print "" ; ?>
                        <?php
                            for($i=0;$i<$exp;$i++)
                            {
                                echo"<div class='form-item mb-3'>
                                <h4>Nome do cargo</h4>
                                <input  style='margin-bottom:20px;' type='text' name='nomeCargo[]'>
                                <h4>Nome da empresa</h4>
                                <input  style='margin-bottom:20px;' type='text' name='nomeEmpresa[]'>
                                <h4>Ano de entrada</h4>
                                <input style='margin-bottom:20px;' type='number' name='anoEntradaEmprego[]'>
                                <h4>Ano de saída</h4>
                                <input style='margin-bottom:20px;' type='number' name='anoSaidaEmprego[".$i."]'>
                                <div class='d-flex container align-items-center'><input style='height:30px;width:30px;margin-right:10px;' type='checkbox' name='anoSaidaEmprego[".$i."]' value='trabalho atual'><h6 class=' m-0 ml-3 p-0'>é o meu trabalho atual</h6></div>
                                </div>";
                                echo "<hr class='my-5' style='height:2px;'>";
                            }
                        ?>
                    </div>

                    <div class='bg-light p-5 m-5'>
                        <h1 class='titulo'>Cores do currículo</h1>
                        <div >
                            <h4>Cor primária</h4>
                            <input type='color' name='cor[]' value='#555555'>
                            <h4>Cor secundária</h4>
                            <input type='color' name='cor[]' value='#ffffff'>
                            <h4>Cor terciária</h4>
                            <input type='color' name='cor[]' value='#ff0000'>
                            <h4>Cor do título</h4>
                            <input type='color' name='cor[]' value='#000000'>
                            <h4>Cor do texto</h4>
                            <input type='color' name='cor[]' style='margin-bottom:20px;' value='#883333'>    
                        </div>
                    </div>

                    <div class='bg-light py-4 px-5 mb-5 d-flex flex-column flex-md-row justify-content-center align-items-center'>
                        <input class='btn formBotao mx-md-4' style='align-self:center;margin:20px 0;' class='botao corPrimaria text-white' type='submit' name='botao' value='Visualizar currículo'>
                        <input class='btn formBotao mx-md-4' style='align-self:center;margin:20px 0;' class='botao corPrimaria text-white' type='submit' name='botao' value='Publicar currículo'>
                    </div>
                </div>
            </form>
    </div>
    </section>

    <footer class='d-flex align-items-center justify-content-center text-center text-light container-fluid bg-dark' style='min-height:200px;'>
        &copy;2021 Todos os direitos reservados<br>Rodrigo Prado Garcia
    </footer>

    </section>

    <script src="https://kit.fontawesome.com/d08166f469.js" crossorigin="anonymous"></script>
</body>
</html>
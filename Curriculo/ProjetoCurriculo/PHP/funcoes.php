<?php

    /*
        passa por todos os campos do vetor e cria um arquivo para cada campo. A função é recursiva, então se houver
        um vetor dentro de outro vetor, a função criará uma pasta dentro de outra pasta
    */
    function gravar($pasta,$vetor)
    {
        foreach($vetor as $chave=>$valor)
        {
            if(is_array($valor))
            {
                mkdir("$pasta\\$chave");
                gravar("$pasta\\$chave",$valor);
            }
            else
            {
                $arquivo= fopen("$pasta\\$chave.txt","w");
                fwrite($arquivo,$valor,strlen($valor));
                fclose($arquivo);
            }
        }
    }

    /*
        cria a pasta onde serão armazenados os dados do currículo, salva os campos do $_POST dentro da pasta criada e ao final
        cria um arquivo para armazenar o nome da foto que foi armazenada na pasta uploadFotos
    */
    function gravar_arquivos()
    {
        $caminhoPasta = "..\Curriculos";

        //
            $arquivo = fopen("$caminhoPasta\quantidadeDeCurriculos.txt","r");
            $quantidade = fgets($arquivo);
            $quantidade++;
            fclose($arquivo);

            $arquivo = fopen("$caminhoPasta\quantidadeDeCurriculos.txt","w");
            fwrite($arquivo,$quantidade,strlen($quantidade));
            fclose($arquivo);
        // incrementa o número no arquivo em 1 unidade

        mkdir("$caminhoPasta\Curriculo$quantidade");
        // cria uma nova pasta e o nome da pasta irá terminar com um número, que é o número que foi armazenado no arquivo

        gravar("$caminhoPasta\Curriculo$quantidade",$_POST); // grava todos os campos do formulário($_POST) na nova pasta que foi criada

        if($_FILES['fotoCurriculo']['size']>0) // verifica se o upload da foto foi feito
        {
            //
                $arquivo = fopen("$caminhoPasta\Curriculo$quantidade\\fotoCurriculo.txt","w");
                $nome  = $_FILES['fotoCurriculo']['name'];
                fwrite($arquivo,"Curriculo$quantidade".substr($nome,strrpos($nome,".")),strlen("Curriculo$quantidade".substr($nome,strrpos($nome,"."))));
                fclose($arquivo);
            // escreve o nome da imagem dentro de um arquivo
        }
        else
        {
            //
                $arquivo = fopen("$caminhoPasta\Curriculo$quantidade\\fotoCurriculo.txt","w");
                fwrite($arquivo,"../img/PrimeiroModelo/usuario.png",strlen("../img/PrimeiroModelo/usuario.png"));
                fclose($arquivo);
            // escreve uma imagem genérica dentro do arquivo
        }
    }
    
    function camposObrigatorios()
    {
        if(@isset($_POST['nomeCargo']))
        {
            $obrigatorios = ["tipoFormacao","nomeCandidato","perfilCandidato","objetivoCandidato","telefoneCandidato","emailCandidato","cidadeCandidato","estadoCandidato","tipoFormacao","nomeCurso","nomeInstituicao","anoEntrada","anoSaida","hard-skill","soft-skill","nomeCargo","nomeEmpresa","anoEntradaEmprego","anoSaidaEmprego","cor"];
        }
        else
        {
            $obrigatorios = ["tipoFormacao","nomeCandidato","perfilCandidato","objetivoCandidato","telefoneCandidato","emailCandidato","cidadeCandidato","estadoCandidato","tipoFormacao","nomeCurso","nomeInstituicao","anoEntrada","anoSaida","hard-skill","soft-skill","cor"];
        }

        foreach($obrigatorios as $nomeCampo) // verifica se todos os campos obrigatórios foram preenchidos 
        {
            if(($_POST[$nomeCampo] == NULL) or ($_POST[$nomeCampo] == "NULL"))
            {
                echo "<div style='display:flex;align-items:center;justify-content:center;height:100vh;width:100vw'>";
                echo "<div class='telaErro' style='text-align:center'>";
                echo "<i class='fas fa-exclamation-circle' style='margin-bottom:40px;font-size:100px;color:red;'></i>";
                echo "<h1 style='margin-bottom:40px;'>Um ou mais campos obrigatórios não foram preenchidos</h1>";
                echo "<a href='javascript:window.history.back()' class='formBotao' style='text-decoration:none;'>Voltar</a>";
                echo "</div>";
                echo "<script src='https://kit.fontawesome.com/d08166f469.js' crossorigin='anonymous'></script>";
                exit(0);
            }
            if(is_array($_POST[$nomeCampo]))
            {
                foreach($_POST[$nomeCampo] as $campo)
                {
                    if($campo==NULL or $campo=="NULL")
                    {
                        echo "<div style='display:flex;align-items:center;justify-content:center;height:100vh;width:100vw'>";
                        echo "<div class='telaErro' style='text-align:center'>";
                        echo "<i class='fas fa-exclamation-circle' style='margin-bottom:40px;font-size:100px;color:red;'></i>";
                        echo "<h1 style='margin-bottom:40px;'>Um ou mais campos obrigatórios não foram preenchidos</h1>";
                        echo "<a href='javascript:window.history.back()' class='formBotao' style='text-decoration:none;'>Voltar</a>";
                        echo "</div>";
                        echo "<script src='https://kit.fontawesome.com/d08166f469.js' crossorigin='anonymous'></script>";
                        exit(0);
                    }
                }
            }
        }
    }

    function uploadFoto()
    {
        if(substr(@$_FILES['fotoCurriculo']['type'],0,5) != 'image' && $_FILES['fotoCurriculo']['tmp_name']!= NULL)
        {
            //exibe uma mensagem de erro caso o arquivo enviado não seja do tipo imagem
            echo "<div style='display:flex;align-items:center;justify-content:center;height:100vh;width:100vw'>";
            echo "<div class='telaErro' style='text-align:center'>";
            echo "<i class='fas fa-exclamation-circle' style='margin-bottom:40px;font-size:100px;color:red;'></i>";
            echo "<h1 style='margin-bottom:40px;'>O arquivo enviado não é do tipo imagem</h1>";
            echo "<a href='javascript:window.history.back()' class='formBotao' style='text-decoration:none;'>Voltar</a>";
            echo "</div>";
            echo "<script src='https://kit.fontawesome.com/d08166f469.js' crossorigin='anonymous'></script>";
            exit(0);
        }
        else if(@$_FILES['fotoCurriculo']['tmp_name'] != NULL)
        {
            //move a foto para a pasta UploadFotos
           $nome =  $_FILES['fotoCurriculo']['name'];
           $arquivo = fopen('../Curriculos/quantidadeDeCurriculos.txt','r');
           $quantidade  = fgets($arquivo);
           $quantidade++;
           fclose($arquivo);
           $caminhoFoto = "..\UploadFotos\\Curriculo$quantidade".substr($nome,strrpos($nome,"."));
           move_uploaded_file($_FILES['fotoCurriculo']['tmp_name'],$caminhoFoto);
        }
    }

    /*
        Esta função faz o contrário da função gravar, ela irá passar por todos os arquivos da pasta e retornar um vetor
        com todo o conteúdo da pasta
    */
    function lerDados($pasta)
    {
        $vetor = [];
        $dir = opendir($pasta);
        while($txt = readdir($dir))
        {
            if(substr($txt,0,1)!='.')
            {
                if(is_dir("$pasta\\$txt"))
                {
                    $vetor[$txt] = lerDados("$pasta\\$txt");
                }
                else
                {
                    $arquivo = fopen("$pasta\\$txt","r");
                    $vetor[substr($txt,0,strlen($txt)-4)] =  fgets($arquivo);
                    fclose($arquivo);
                }
            }
        }
        closedir($dir);
        return $vetor;
    }

    /*
        lê todas as pastas dentro da pasta 'Curriculos',
        retorna um vetor com o conteúdo da pasta e passa o vetor na função 'printar_curriculo', que irá substituir os dados
        do vetor no currículo
    */
    function lerCurriculos()
    {
        $vetorDados = [];
        $dir = opendir("..\Curriculos");
        $contemCurriculos = false;
        while($arquivo = readdir($dir))
        {
            if(substr($arquivo,0,1)!='.')
            {
                if(is_dir("..\Curriculos\\$arquivo"))
                {
                    $contemCurriculos = true;
                    $vetorDados = lerDados("..\Curriculos\\$arquivo");
                    printar_curriculo($vetorDados,$vetorDados['fotoCurriculo']);
                }
            }
        }
        closedir($dir);
        if(!$contemCurriculos)
        {
            echo"
                <div class='telaErro' style='text-align:center;'>
                    <i class='fas fa-address-card' style='margin-bottom:40px;font-size:100px;color:gray;'></i>
                    <h1 style='margin-bottom:40px;'>Nenhum currículo para exibir</h1>
                </div>";
        }
    }

    /*
        esta função recebe um vetor como parâmetro e o nome da foto a ser exibida,
        os dados do vetor serão armazenados em variáveis e as variáveis
        serão substituídas dentro das tags
    */
    function printar_curriculo($dados,$foto)
    {
        @$primaria=$dados['cor'][0];
        @$titulo=$dados['cor'][3];
        @$secundaria= $dados['cor'][1];
        @$terciaria= $dados['cor'][2];
        @$texto= $dados['cor'][4];
        @$nomeCandidato = $dados['nomeCandidato'];
        @$tituloCandidato = $dados['tituloCandidato'];
        @$perfilCandidato = $dados['perfilCandidato'];
        @$objetivoCandidato = $dados['objetivoCandidato'];
        @$telefoneCandidato = $dados['telefoneCandidato'];
        @$emailCandidato = $dados['emailCandidato'];
        @$cidadeCandidato = $dados['cidadeCandidato'];
        @$estadoCandidato = $dados['estadoCandidato'];
        @$linkedinCandidato = $dados['linkedinCandidato'];
        @$tipoFormacao = $dados['tipoFormacao'];
        @$nomeCurso = $dados['nomeCurso'];
        @$nomeInstituicao = $dados['nomeInstituicao'];
        @$anoEntrada = $dados['anoEntrada'];
        @$anoSaida = $dados['anoSaida'];
        @$hard_skill = $dados['hard-skill'];
        @$soft_skill = $dados['soft-skill'];
        @$nomeCargo = $dados['nomeCargo'];
        @$nomeEmpresa = $dados['nomeEmpresa'];
        @$anoEntradaEmprego = $dados['anoEntradaEmprego'];
        @$anoSaidaEmprego = $dados['anoSaidaEmprego'];
        @$cor = $dados['cor'];
        @$estiloFonte = $dados['estiloFonte'];
        @$fotoCurriculo = $foto;
        @$numeroExperiencias = (isset($nomeCargo)?count($nomeCargo):0);
        echo "<section class='curriculo' style='background-color:$secundaria;margin-bottom:50px;'>";
        echo "<div style='display:flex;'>";
        echo "<div class='barraLateral coluna' style='background-color:$primaria'>";
        if(substr($fotoCurriculo,0,1)!='C')
        {
            echo "<img src='$fotoCurriculo' alt='FOTO DO CURRICULO' class='foto'>";
        }
        else
        {
            echo "<img src='..\UploadFotos\\$fotoCurriculo' style='object-fit:cover;' alt='FOTO DO CURRICULO' class='foto'>";
        }
        echo "<h2 class='contato'>CONTATOS</h2>";
        echo "<div class='itemContato'><img src='../img/PrimeiroModelo/gps.png' class='icon'>$cidadeCandidato/$estadoCandidato</div>";
        echo "<div class='itemContato'><img src='../img/PrimeiroModelo/phone.png' class='icon'>$telefoneCandidato</div>";
        if($linkedinCandidato!="")
        {
            echo "<div class='itemContato'><img src='../img/PrimeiroModelo/linkedin.png' class='icon'>$linkedinCandidato</div>";
        }
        echo "<div class='itemContato'><img src='../img/PrimeiroModelo/mail.png' class='icon'>$emailCandidato</div>";
        echo "</div>";
        echo "<div class='barraPrincipal coluna'>";
        echo "<h3 class='nome' style='color:$titulo'>".strtoupper($nomeCandidato)."</h3>";
        echo "<h4 class='titulo' style='font-family:sans-serif;font-size:20px;color:$terciaria'>$tituloCandidato</h4>";
        echo "<h3 class='objetivo' style='color:$terciaria'><nav style='color:$titulo'>OBJETIVO:</nav>$objetivoCandidato</h3>";
        echo "<h3 class='perfPessoal' style='color:$titulo'>PERFIL PESSOAL</h3>";
        echo "<h4 class='perfTexto'style='color:$texto'>$perfilCandidato</h4>";
        echo "<h3 class='formacaoTitulo' style='color:$titulo'>FORMAÇÃO</h3>";
        echo "<ul class='formacaoLista' style='color:$terciaria'>";
        for($i=0;$i<count($tipoFormacao);$i++)
        {
            echo "<li>"; echo "<h4 style='color:$terciaria'>$tipoFormacao[$i] em $nomeCurso[$i]($anoEntrada[$i] - $anoSaida[$i])</h4>"; echo "</li>";
            echo "<h4 class='nomeInstituicao' style='color:$texto'>$nomeInstituicao[$i]</h4>";
            echo "<ul>";
        }
        echo "<h3 class='competenciasTitulo' style='color:$titulo'>COMPETÊNCIAS</h3>";
        echo "<ul>";
        foreach($hard_skill as $skill)
        {
            echo "<li class='competencias' style='color:".$texto."'>"; echo "<h4>".$skill."</h4>"; echo "</li>";
        }
        echo "</ul>";
        echo "<h3 class='competenciasTitulo' style='color:$titulo'>QUALIDADES</h3>";
        echo "<ul>";
        foreach($soft_skill as $skill)
        {
            echo "<li class='competencias' style='color:".$texto."'>"; echo "<h4>".$skill."</h4>"; echo "</li>";
        }
        echo "</ul>";
        if($numeroExperiencias>0)
        {
            echo "<h3 class='competenciasTitulo' style='color:$titulo'>EXPERIÊNCIA</h3>";
            echo "<ul style='color:$terciaria'>";
            for($i=0;$i<$numeroExperiencias;$i++)
            {
                echo "<li>"; echo "<h4 style='color:$terciaria'>$nomeEmpresa[$i]($anoEntradaEmprego[$i] - $anoSaidaEmprego[$i])</h4>"; echo "</li>";
                echo "<h4 class='nomeInstituicao' style='color:$texto'>$nomeCargo[$i]</h4>";
                echo "<ul>";
            }
        }
        echo "<ul>";
        echo "</div>";
        echo "</div>";
        echo "</section>";
    }

    /*
        função recursiva. apaga todos os arquivos de uma pasta e em seguida remove a pasta
    */
    function apagarPasta($pasta,$excecao)
    {
        $dir = opendir($pasta);
        while($arquivo = readdir($dir))
        {
            if(substr($arquivo,0,1)!='.')
            {
                if(is_dir("$pasta/$arquivo"))
                {
                    if($arquivo != $excecao)apagarPasta("$pasta/$arquivo",$excecao);
                }
                else
                {
                    unlink("$pasta/$arquivo");
                }
            }
        }
        closedir($dir);
        if($pasta!=$excecao and $pasta!="../Curriculos")rmdir($pasta);
    }

    /*
        apaga todos os currículos da pasta 'Curriculos' e apaga todas as fotos da pasta 'UploadFotos'
    */
    function apagarCurriculos()
    {
        apagarPasta("../Curriculos","CurriculoRodrigo");
        $arquivo = fopen("../Curriculos/quantidadeDeCurriculos.txt",'w');
        fwrite($arquivo,"0",1);
        fclose($arquivo);
        $pasta = opendir("../UploadFotos");
        while($foto = readdir($pasta))
        {
            if(substr($foto,0,1)!=".")
            {
                if($foto != "CurriculoRodrigo.jpg")
                {
                    unlink("../UploadFotos/$foto");
                }
            }
        }
        closedir($pasta);
    }
?>
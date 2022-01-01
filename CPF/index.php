<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width,initial-scale=1'>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel='stylesheet' href='CPF.css'>
        <title>Validação de CPF</title>
    </head>
    <body>
        <div class='content-fluid text-center py-5'style='background-color:#00009e;font-family:Russo One;color:white;font-size:50px;'id='topo'>Validar CPF</div>
        
        <?php
            if(isset($_POST['numCPF']))
            {
                if(is_numeric($_POST['numCPF']) and strlen($_POST['numCPF'])==11)
                {
                    if(str_replace($_POST['numCPF'][0],"x",$_POST['numCPF'])==="xxxxxxxxxxx")
                    {
                        print"<div class='content-fluid text-center py-3 text-danger'style='background-color:#000000;font-family:Russo One;font-size:25px;'id='topo'>&#x2612; O CPF é inválido</div>
        <div class='content-fluid text-center py-3'style='background-color:#000000;color:white;font-size:20px;'id='topo'>CPF :".$_POST['numCPF']."</div>";
                        goto fim;
                    }

                    $numeroCPF=$_POST['numCPF'];
                    $soma=0;

                    for($i=10;$i>=2;$i--)
                    {
                        $soma+=$i*$numeroCPF[10-$i];
                    }
                                        
                    $soma%=11;

                    if(11-$soma>=10)
                    {
                        $digito[0]=0;
                    }
                    else
                    {
                        $digito[0]=11-$soma;
                    }

                    $soma=0;    

                    for($i=11;$i>=2;$i--)
                    {
                        $soma+=$i*$numeroCPF[11-$i];
                    }

                    $soma%=11;

                    if(11-$soma>=10)
                    {
                        $digito[1]=0;
                    }
                    else
                    {
                        $digito[1]=11-$soma;
                    }

                    if($numeroCPF[9]==$digito[0] and $numeroCPF[10]==$digito[1])
                    {
                        print"<div class='content-fluid text-center py-3 text-success'style='background-color:#000000;font-family:Russo One;font-size:25px;'id='topo'>&#x2611; O CPF é válido</div>
        <div class='content-fluid text-center py-3'style='background-color:#000000;color:white;font-size:20px;'id='topo'>CPF :".$numeroCPF."</div>";
                    }
                    else
                    {
                        print"<div class='content-fluid text-center py-3 text-danger'style='background-color:#000000;font-family:Russo One;font-size:25px;'id='topo'>&#x2612; O CPF é inválido</div>
        <div class='content-fluid text-center py-3'style='background-color:#000000;color:white;font-size:20px;'id='topo'>CPF :".$numeroCPF."</div>";
                    }
                }
                else
                {
                    if(!is_numeric($_POST['numCPF']))
                    {
                        print"<div class='content-fluid text-center py-3 text-warning'style='background-color:#000000;font-family:Russo One;font-size:25px;'id='topo'>&#x26A0; erro : entrada não é numérica</div>";
                    }
                    if(strlen($_POST['numCPF'])!=11)
                    {
                        print"<div class='content-fluid text-center py-3 text-warning'style='background-color:#000000;font-family:Russo One;font-size:25px;'id='topo'>&#x26A0; erro: entrada precisa ter 11 dígitos</div>";        
                    }
                    print"<div class='content-fluid text-center py-3'style='background-color:#000000;color:white;font-size:20px;'id='topo'>Entrada : ".$_POST['numCPF']."</div>";
                }
                fim:    
            }  
        ?>

        <div class='card'style='border:none;'>
            <img clas='card-img' src='CPFFundo2.jpg'style='object-fit:cover;height:100vh;'id='imagemFundo'>
            <div class='card-img-overlay jumbotron mx-0 px-0 d-flex flex-column flex-lg-row justify-content-lg-center justify-content-start align-items-center'style='background-color:#333366AA;border-radius:0px;margin:0px;min-height:100vh;'id='jumbo'>
            <div class='my-5 mx-5'>
            <img src='brasão.png' style='max-width:500px;filter:grayscale(1);width:100vh;max-width:500px;' id='icone'>
            </div> 

            <div class='p-5 mx-5 my-5 d-flex flex-column align-items-center text-white'style='width:100%;max-width:700px;background-color:#00009e;'>
                
                <form action="<?php $_SERVER['PHP_SELF'];?>" method='post' class='d-flex flex-column'>

                <label style='font-size:20px;font-weight:bold;'>Número do CPF:</label>
                <div><input type='text' name='numCPF' class='inputCPF'><input type='submit' value='Validar' class='d-block d-md-inline my-5 mx-auto mx-md-0 ml-md-5 btn btn-light botaoConfirmar px-5'></div>
                
                </form>

            </div>
            </div>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>TransportLine</title>
        <link rel="shortcut icon" href="imagens/site/transportline.ico" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="TransportLine">
        <meta name="author" content="i9 Solutions">
        <link href="estilos/css/lavish-bootstrap.css" rel="stylesheet">
        <link href="estilos/css/estilos.css" rel="stylesheet">
        <link href="estilos/css/tabelas.css" rel="stylesheet">
        <script type="text/javascript" src="estilos/js/jquery.min.js"></script>
        <script type="text/javascript" src="estilos/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="estilos/js/scripts.js"></script>
        <script type="text/javascript" src="estilos/js/mascara.js"></script>
        <script type="text/javascript" src="estilos/js/jquey.mask.min.js"></script>
        <script type="text/javascript" src="estilos/js/cpf.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#cpf").mask("999.999.999-99");
            });
        </script>

        <script type="text/javascript">
            $('#telefone').mask(maskBehavior, options);
        </script>

        <script type="text/javascript">
            function vCPF(i){
                i.setCustomValidity(validaCPF(i.value) ? '' : 'CPF inválido!');
            }
        </script>
    </head>

    <body>
        <div class="container-fluid"> 
            <!-- MENU -->
            <div class="container">
                <div class="row clearfix">
                    <div class="col-md-12 column">
                        <nav class="navbar navbar-inverse" role="navigation">
                            <div class="navbar-header col-md-3"> <a href="?tl=inicio"><img src="imagens/site/logo.png" width="70%" class="img-responsive"></a> </div>
                            <div class="col-md-3 column"> </div>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="?tl=sobre">Sobre</a></li>
                                    <li><a href="?tl=contato">Contatos</a></li>
                                    <li><a href="?tl=admin">Administrar</a></li>
                                    <?php
                                    $variavel = filter_input(INPUT_GET, "tl");
                                    switch ($variavel) {
                                        case "administrar_adm": echo '<li><a href="?tl=sair">Sair</a></li>';
                                            break;
                                        case "administrar_moto" : echo '<li><a href="?tl=sair">Sair</a></li>';
                                            break;
                                        case "administrar_cli": echo '<li><a href="?tl=sair">Sair</a></li>';
                                            break;
                                        case "administrar_cooper": echo '<li><a href="?tl=sair">Sair</a></li>';
                                            break;
                                        default : echo '';
                                            break;
                                    }
                                    ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            <!--FIM DO MENU --> 

            <!--CONTEUDO DINAMICO -->
            <div class="container content">
                <?php include "paginas.php"; ?>
            </div>
        </div>
        
 <!--rodape -->
            <div class="footer">
                <div class="container">
                    <div class="row" style="bottom: 0">
                        <div class="col-md-12 copyright navbar-inverse">
                            <p style="color:#fff;">© 2015 i9 Solutions - Todos os direitos reservados. </p>
							  <?php
                                    $variavel = filter_input(INPUT_GET, "tl");
                                    switch ($variavel) {
                                        case "administrar_adm": echo '<p><a style="color:#fff;" href="?tl=sair">Sair</a></p>';
                                            break;
                                        case "administrar_moto" : echo '<p><a style="color:#fff;" href="?tl=sair">Sair</a></p>';
                                            break;
                                        case "administrar_cli": echo '<p><a style="color:#fff;" href="?tl=sair">Sair</a></p>';
                                            break;
                                        case "administrar_cooper": echo '<p><a style="color:#fff;" href="?tl=sair">Sair</a></p>';
                                            break;
                                        default : echo '';
                                            break;
                                    }
                                    ?>
                        </div>
                    </div>
                </div>
            </div>
    </body>
</html>

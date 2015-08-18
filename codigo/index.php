<!DOCTYPE html>
<html lang="pt">
<head>
<meta charset="utf-8">
<title>TransportLine</title>
<link rel="shortcut icon" href="imagens/site/transportline.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="TransportLine">
<meta name="author" content="i9 Solutions">
<link href="estilos/css/lavish-bootstrap.css" rel="stylesheet">
<link href="estilos/css/style.css" rel="stylesheet">
<script type="text/javascript" src="estilos/js/jquery.min.js"></script>
<script type="text/javascript" src="estilos/js/bootstrap.min.js"></script>
<script type="text/javascript" src="estilos/js/scripts.js"></script>
<script type="text/javascript" src="estilos/js/mascara.js"></script>
</head>

<body>
<div class="container" style="position:relative;"> 
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
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
  <!--FIM DO MENU --> 
  
  <!--CONTEUDO DINAMICO -->
  <div id="container">
    <hr/>
    <?php include "paginas.php"; ?>
  </div>
</div>
<!--rodape -->
<div class="container">
  <div class="copyright navbar-inverse" style="position:absolute; bottom:0;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p style="color:#fff;">© 2015 i9 Solutions - Todos os direitos reservados. </p>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>

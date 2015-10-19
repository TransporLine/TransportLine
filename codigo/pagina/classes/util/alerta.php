<head>
<meta charset="utf-8">
<title>TransportLine</title>
<link rel="shortcut icon" href="imagens/site/transportline.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="TransportLine">
<meta name="author" content="i9 Solutions">
<link href="../../estilos/css/lavish-bootstrap.css" rel="stylesheet">
<link href="../../estilos/css/style.css" rel="stylesheet">
<script type="text/javascript" src="../../estilos/js/jquery.min.js"></script>
<script type="text/javascript" src="../../estilos/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../estilos/js/scripts.js"></script>
</head>
<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="alert alert-dismissable alert-success">
				 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
				<h4>
					<? echo $escopo; ?>
                                </h4> <strong><? echo $mensagem;?></strong>
			</div>
		</div>
</div>
<?php
     header("Refresh:3; URL=../../?tl=inicio"); 
?>
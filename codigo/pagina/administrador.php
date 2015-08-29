<?php
	require 'classes/RepositorioAdministrador.php';
	
	$destino = "pagina/classes/administrador_incluir.php";
	
	if (isset($_GET['id'])) {
		$codigo = $_GET['id'];
		$administrador = $repositorio->getAdministrador($codigo);
		$destino = "pagina/classes/administrador_atualizar.php";
		$oculto = "<input type='hidden' name='id' value=".$codigo." />";
	}
?>
<form action=" <?= $destino;?>" method="post" class="form-horizontal">
<?= @$oculto;?>
<fieldset>

<!-- Form Name -->
<legend>Cadastro de Administrador</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome:</label>  
  <div class="col-md-5">
  <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md" value="<?php echo isset($administrador)?$administrador->getNome():""; ?>" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
  <div class="col-md-4">
  <input id="telefone" name="telefone" type="text" placeholder="(00) 0 0000-0000" class="form-control input-md" value="<?php echo isset($administrador)?$administrador->getTelefone():""; ?>" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email:</label>  
  <div class="col-md-5">
  <input id="email" name="email" type="text" placeholder="email@email.com" class="form-control input-md" value="<?php echo isset($administrador)?$administrador->getEmail():""; ?>" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="senha">Senha:</label>
  <div class="col-md-4">
    <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-8">
    <button type="reset"  id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
    <button type="submit" id="salvar" name="salvar"  class="btn btn-success">Salvar</button>
  </div>
</div>

</fieldset>
</form>

<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Cadastro de Cooperativa</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nome">Nome:</label>  
  <div class="col-md-5">
  <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="endereco">Endereço:</label>  
  <div class="col-md-5">
  <input id="endereco" name="endereco" type="text" placeholder="endereco" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="cidade">Cidade:</label>  
  <div class="col-md-4">
  <input id="cidade" name="cidade" type="text" placeholder="cidade" class="form-control input-md" required="">
    
  </div>
   <div class="col-md-1">
  <input id="uf" name="uf" type="text" placeholder="uf" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
  <div class="col-md-4">
  <input id="telefone" name="telefone" type="text" placeholder="(00) 0 0000-0000" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email">Email:</label>  
  <div class="col-md-5">
  <input id="email" name="email" type="text" placeholder="email" class="form-control input-md" required="">
    
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
  <label class="col-md-4 control-label" for="cancelar"></label>
  <div class="col-md-8">
    <button id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
    <button id="salvar" name="salvar" class="btn btn-success">Salvar</button>
  </div>
</div>

</fieldset>
</form>

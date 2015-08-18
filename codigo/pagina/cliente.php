<form class="form-horizontal">
  <fieldset>
    
    <!-- Form Name -->
    <legend>Cadastro de Passageiro</legend>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="nome">Nome:</label>
      <div class="col-md-5">
        <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md" required  title="Com seu nome completo" >
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="rg">RG:</label>
      <div class="col-md-4">
        <input id="rg" name="rg" type="text" placeholder="rg" class="form-control input-md" >
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="cpf">CPF:</label>
      <div class="col-md-4">
        <input id="cpf" name="cpf" type="text" placeholder="000.000.000-00" class="form-control input-md" required  title="Com os numeros de seu CPF">
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="endereco">Endereço:</label>
      <div class="col-md-5">
        <input id="endereco" name="endereco" type="text" placeholder="endereço" class="form-control input-md">
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="cidade">Cidade-UF:</label>
      <div class="col-md-4">
        <input id="cidade" name="cidade" type="text" placeholder="cidade" class="form-control input-md" required  title="Com o nome de sua cidade exemplo: Crato">
      </div>
      <div class="col-md-1">
        <input id="cidade" name="cidade" type="text" placeholder="UF" class="form-control input-md" required  title="Com o nome de sua unidade federativa exemplo: CE">
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="email">Email:</label>
      <div class="col-md-5">
        <input id="email" name="email" type="text" placeholder="email" class="form-control input-md" required  title="Com um endereço de email valido">
      </div>
    </div>
    
    <!-- Password input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="senha">Senha:</label>
      <div class="col-md-4">
        <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md" required title="Sua senha não pode ser em branco">
      </div>
    </div>
    
    <!-- Text input-->
    <div class="form-group">
      <label class="col-md-4 control-label" for="telefone">Telefone:</label>
      <div class="col-md-4">
        <input id="telefone" name="telefone" type="text" placeholder="(00) 0 0000-0000" class="form-control input-md" required  title="Com o número de seu telefone">
      </div>
    </div>
    
    <!-- Button (Double) -->
    <div class="form-group">
      <label class="col-md-4 control-label" for="cancelar"></label>
      <div class="col-md-8">
        <button type="reset" id="cancelar" name="cancelar" class="btn btn-danger">Cancelar</button>
        <button type="submit" id="salvar" name="salvar" class="btn btn-success">Salvar</button>
      </div>
    </div>
  </fieldset>
</form>

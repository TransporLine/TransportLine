<!-- PAGINA INICIAL-->

<div class="jumbotron">
  <div class="row">
    <div class="col-md-8 colunm">
      <div class="col-md-12">
        <div class="row">
          <div class="col-md-4">
            <button type="button" class="btn btn-success btn-lg col-md-12"> Corrida </button>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-success btn-lg col-md-12"> Agendar Corrida </button>
          </div>
          <div class="col-md-4">
            <button type="button" class="btn btn-success btn-lg col-md-12"> Rotas </button>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-4 column">
    <form action="?tl=login" method="post" class="form-horizontal">
      
      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="emal">Email:</label>
        <div class="col-md-8">
          <input id="emal" name="emal" type="text" placeholder="email" class="form-control input-md">
        </div>
      </div>
      
      <!-- Password input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="senha">Senha:</label>
        <div class="col-md-8">
          <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md">
        </div>
      </div>
      
      <!-- Button -->
      <div class="form-group">
        <div class="col-md-12">
          <div class="col-xs-8"> <a href="?tl=cadastro">
            <button type="button" id="entrar" name="Cadastre-se" class="btn btn-info pull-right col-md-7">Cadastre-se</button>
            </a> </div>
          <button type="submit" id="entrar" name="Entrar" class="btn btn-success pull-right col-md-4">Entrar</button>
        </div>
      </div>
      </div>
    </form>
  </div>
</div>

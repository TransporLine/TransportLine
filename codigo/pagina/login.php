<div class="col-md-4 column">
<?php
    if(isset($_POST['email'])){
        include 'pagina/classes/Login.php';
    }
?>
    <form action="" method="post" class="form-horizontal">

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email:</label>
            <div class="col-md-8">
                <input id="email" name="email" type="text" placeholder="email" class="form-control input-md">
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
    </form>
</div>
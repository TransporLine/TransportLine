
<?php
require 'pagina/classes/logado.php';
if($_SESSION['usuario'] -> getnivel_acesso() != 1){
        echo '<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-danger">
				<h4 align="center">
					Atenção!
				</h4>Área restrita aos ADMINISTRADORES!
			</div>
		</div>
	</div>
</div>';
    header("Refresh:5; URL=?tl=inicio");
    exit();
}
require 'classes/RepositorioAdministrador.php';
require 'classes/RepositorioUsuario.php';

$destino = "pagina/classes/administrador_incluir.php";

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $administrador = $repositorio->getAdministradorIdUsuario($codigo);
    $usuario = $repositorioUsuario -> getUsuarioPorId($administrador->getIdUsuario());
    $destino = "pagina/classes/administrador_atualizar.php";
    $oculto = "<input type='hidden' name='id' value=" . $administrador->getCodigo(). " />";
}
?>
<form action=" <?= $destino; ?>" method="post" class="form-horizontal">
    <?= @$oculto;?>
    <input type="hidden" name="idUsuario"  value="<?php echo isset($administrador) ? $administrador->getIdUsuario() : ""; ?>" />
    <input type="hidden" name="nivel"  value="1" />
    <fieldset>
        <!-- Form Name -->
        <legend>Cadastro de Administrador</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome:</label>  
            <div class="col-md-5">
                <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md"
                        pattern="[A-Za-zA-zÀ-ú ]+" 
                        value="<?php echo isset($administrador) ? $administrador->getNome() : ""; ?>" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
            <div class="col-md-4">
                <input id="telefone" name="telefone" type="text" placeholder="(00) 0 0000-0000" 
                       class="form-control input-md" value="<?php echo isset($administrador) ? $administrador->getTelefone() : ""; ?>" 
                       pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"
                       required="">   
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email:</label>  
            <div class="col-md-5">
                <input id="email" name="email" type="text" placeholder="email@email.com" 
                       class="form-control input-md"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" 
                       value="<?php echo isset($usuario) ? $usuario->getEmail() : ""; ?>" required="">
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

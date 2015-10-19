<?php
require 'classes/RepositorioCooperativa.php';
require 'classes/RepositorioUsuario.php';
include 'selecionar.php';

$destino = "pagina/classes/cooperativa_incluir.php";

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $cooperativa = $repositorioCooperativa->getCooperativaIdUsuario($codigo);
    $usuario = $repositorioUsuario -> getUsuarioPorId($cooperativa->getIdUsuario());
    $destino = "pagina/classes/cooperativa_atualizar.php";
    $oculto = "<input type='hidden' name='id' value=" . $cooperativa->getCodigo() . " />";
}
?>
﻿<form action=" <?= $destino; ?>" method="post" class="form-horizontal">
     <?= @$oculto;?>
    <input type="hidden" name="idUsuario"  value="<?php echo isset($cooperativa) ? $cooperativa->getIdUsuario() : ""; ?>" />
    <input type="hidden" name="nivel"  value="2" />
    <fieldset>

        <!-- Form Name -->
        <legend>Cadastro de Cooperativa</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome:</label>  
            <div class="col-md-5">
                <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md"  pattern="[A-Za-zA-zÀ-ú ]+"
                       value="<?php echo isset( $cooperativa) ?  $cooperativa->getNome() : ""; ?>" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="endereco">Endereço:</label>  
            <div class="col-md-5">
                <input id="endereco" name="endereco" type="text" placeholder="endereco" class="form-control input-md"
                         pattern="[A-Za-zA-zÀ-ú0-9 ,.]+"
                       value="<?php echo isset( $cooperativa) ?  $cooperativa->getEndereco() : ""; ?>" >

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="cidade">Cidade:</label>  
            <div class="col-md-4">
                <input id="cidade" name="cidade" type="text" placeholder="cidade" class="form-control input-md" 
                        pattern="[A-Za-zA-zÀ-ú ]+"
                       value="<?php echo isset( $cooperativa) ?  $cooperativa->getCidade() : ""; ?>" required="">

            </div>
            <div class="col-md-2">
                <div class="col-lg-5">
                    <div class="form-group">
                        <select class="form-control selecionar" type="text" name="uf">
                            <option value="<?php echo isset($cliente) ? $cliente->getUf() : "CE"; ?>" selected>
                                <?php echo isset($cliente) ? $cliente->getUf() : "UF"; ?>
                            </option>
                            <option value="AC">AC</option>
                            <option value="AM">AM</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MG">MG</option>
                            <option value="MS">MS</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="PR">PR</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RO">RO</option>
                            <option value="RS">RS</option>
                            <option value="RR">RR</option>
                            <option value="SE">SE</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="telefone">Telefone:</label>  
            <div class="col-md-4">
                <input id="telefone" name="telefone" type="text" placeholder="(00) 0 0000-0000" class="form-control input-md" 
                       value="<?php echo isset( $cooperativa) ?  $cooperativa->gettelefone() : ""; ?>"
                       pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$" required="">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="email">Email:</label>  
            <div class="col-md-5">
                <input id="email" name="email" type="text" placeholder="email" class="form-control input-md" 
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" 
                       value="<?php echo isset( $usuario) ?  $usuario->getemail() : ""; ?>" required="">

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

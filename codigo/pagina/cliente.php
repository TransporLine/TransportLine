<?php
require 'classes/RepositorioCliente.php';
require 'classes/RepositorioUsuario.php';
include 'selecionar.php';

$destino = "pagina/classes/cliente_incluir.php";

if (isset($_GET['id'])) {
    $codigo = $_GET['id'];
    $cliente = $repositorio->getClienteIdUsuario($codigo);
    $usuario = $repositorioUsuario->getUsuarioPorId($cliente->getIdUsuario());
    $destino = "pagina/classes/cliente_atualizar.php";
    $oculto = "<input type='hidden' name='id' value=" . $cliente->getCodigo() . " />";
}
?>
<form action=" <?= $destino; ?>" method="post" class="form-horizontal">
    <?= @$oculto; ?>
    <input type="hidden" name="idUsuario"  value="<?php echo isset($cliente) ? $cliente->getIdUsuario() : ""; ?>" />
    <input type="hidden" name="nivel"  value="4" />
    <fieldset>

        <!-- Form Name -->
        <legend>Cadastro de Passageiro</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nome">Nome:</label>
            <div class="col-md-5">
                <input id="nome" name="nome" type="text" placeholder="nome" class="form-control input-md"
                       pattern="[A-Za-zA-zÀ-ú ]+"
                       value="<?php echo isset($cliente) ? $cliente->getNome() : ""; ?>" required  title="Com seu nome completo" >
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="rg">RG:</label>
            <div class="col-md-4">
                <input id="rg" name="rg" type="text" placeholder="rg"
                       pattern="[0-9,.-]+"
                       value="<?php echo isset($cliente) ? $cliente->getRg() : ""; ?>" class="form-control input-md" >
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="cpf">CPF:</label>
            <div class="col-md-4">
                <input id="cpf" name="cpf" type="text" placeholder="000.000.000-00" class="form-control input-md" 
                       oninput="vCPF(this)"
                       value="<?php echo isset($cliente) ? $cliente->getCpf() : ""; ?>" required  title="Com os numeros de seu CPF">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="endereco">Endereço:</label>
            <div class="col-md-5">
                <input id="endereco" name="endereco" type="text" placeholder="endereço"
                       pattern="[A-Za-zA-zÀ-ú0-9 ,.]+"
                       value="<?php echo isset($cliente) ? $cliente->getEndereco() : ""; ?>" class="form-control input-md" required/>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="cidade">Cidade-UF:</label>
            <div class="col-md-4">
                <input id="cidade" name="cidade" type="text" placeholder="cidade" class="form-control input-md"
                       pattern="[A-Za-zA-zÀ-ú ]+"
                       value="<?php echo isset($cliente) ? $cliente->getCidade() : ""; ?>"   title="Com o nome de sua cidade exemplo: Crato" required />
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
            <label class="col-md-4 control-label" for="email">Email:</label>
            <div class="col-md-5">
                <input id="email" name="email" type="email" placeholder="email" class="form-control input-md" 
                       value="<?php echo isset($usuario) ? $usuario->getemail() : ""; ?>"
                       pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" 
                       required/>
            </div>
        </div>

        <!-- Password input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="senha">Senha:</label>
            <div class="col-md-4">
                <input id="senha" name="senha" type="password" placeholder="senha" class="form-control input-md"
                       required title="Sua senha não pode ser em branco">
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="telefone">Telefone:</label>
            <div class="col-md-4">
                <input id="telefone" name="telefone" type="tel" maxlength="15" placeholder="(00)00000-0000" class="form-control input-md"
                       value="<?php echo isset($cliente) ? $cliente->gettelefone() : ""; ?>"
                       pattern="\([0-9]{2}\) [0-9]{4,6}-[0-9]{3,4}$"
                       required />
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

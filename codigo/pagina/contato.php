<?php
//----------------------------------EMAIL----------------------------------
//pega as variaveis por POST
if (isset($_POST['nome'])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $assunto = $_POST["assunto"];
    $mensagem = $_POST["mensagem"];
    $headers = "From:i9.transporline@gmail.com";
    mail($email, 'My Subject', $mensagem, $headers);
    echo "<p align=center>Obrigado por entrar em contato conosco $nome!</p>";
    echo "<p align=center>estaremos respondendo seu contato em breve.</p>";
}
//----------------------------------EMAIL----------------------------------
?>
<div class="login">
    <form action="" method="post">
        <fieldset id="area">
            <legend id="legenda">Contato</legend>

            <div id="campo">Digite seu email:</div>
            <div>
                <input id="campo" type="text" size="20" name="email" />
            </div>
               <div id="campo">Nome:</div>
            <div>
                <input id="campo" type="text" size="20" name="nome" />
            </div>


            <div id="campo">Assunto:</div>
            <div>
                <input id="campo" type="text" size="20" name="assunto" />
            </div>


            <div id="campo">Mensagem:</div>
            <div>
                <textarea id="campo" rows="10" cols="50" name="mensagem">
                </textarea>
            </div>
            <div>
                <input class="btn-default" type="submit" value="Enviar" />
            </div>
        </fieldset>
    </form>
</div>
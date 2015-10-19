<?php

require_once "/util/conexao.php";
include_once "/Usuario.php";

interface iRepositorioUsuario {

    public function cadastrarUsuario($usuario, $codigo);

    public function removerUsuario($codigo);

    public function getListaUsuarios();

    public function getUsuario($codigo);

    public function getLogin($email, $senhaCriptografada);

    public function getUsuarioPorId($codigo);
}

class RepositorioUsuarioMySQL implements iRepositorioUsuario {

    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao("localhost", "u969309842_tl", "5365462@", "u969309842_tl");
        if ($this->conexao->conectar() == false) {
            echo "Erro:" . mysqli_error();
        }
    }

    public function cadastrarUsuario($Usuario, $codigo) {
        $sql = Null;

        $email = $Usuario->getEmail();
        $senha = $Usuario->getSenha();
        $senhaCriptografada = $Usuario->getSenhaCriptografada();
        $nivel = $Usuario->getnivel_acesso();

        if (isset($codigo)) {
            $sql = "UPDATE usuario SET email='$email', senha='$senha', senha_criptografada='$senhaCriptografada', nivel_acesso='$nivel' WHERE id=$codigo";
        } else {
            $sql = "INSERT INTO `usuario`(`id`,`email`, `senha`, `senha_criptografada`, `nivel_acesso`) VALUES (NULL,'$email','$senha','$senhaCriptografada',$nivel)";
        }
        $this->conexao->executarQuery($sql);
        return $this->conexao->lastId();
    }

    public function removerUsuario($codigo) {
        $sql = "DELETE FROM usuario WHERE id = '$codigo'";
        $this->conexao->executarQuery($sql);
    }

    public function getListaUsuarios() {
        $listagem = $this->conexao->executarQuery("SELECT * FROM usuario");

        $arrayUsuario = array();

        while ($row = mysqli_fetch_array($listagem)) {
            $Usuario = new Usuario(
                    $row['id'], $row['email'], $row['senha'], $row['senhaCriptografada'], $row['nivel_acesso']);
            array_push($arrayUsuario, $Usuario);
        }
        return $arrayUsuario;
    }

    public function getUsuario($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM usuario where id = '$codigo'");

        $Usuario = new Usuario(
                $row['id'], $row['email'], $row['senha'], $row['senhaCriptografada'], $row['nivel_acesso']);

        return $Usuario;
    }

    public function getLogin($email, $senhaCriptografada) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM usuario where email = '$email' && senha_criptografada = '$senhaCriptografada' ");

        $Usuario = new Usuario(
                $row['id'], $row['email'], $row['senha'], $row['senha_criptografada'], $row['nivel_acesso']);

        return $Usuario;
    }

    public function getUsuarioPorId($codigo) {
        $row = $this->conexao->obterPrimeiroRegistroQuery("SELECT * FROM usuario where id = '$codigo' ");

        $Usuario = new Usuario(
                $row['id'], $row['email'], $row['senha'], $row['senha_criptografada'], $row['nivel_acesso']);

        return $Usuario;
    }

}

$repositorioUsuario = new RepositorioUsuarioMySQL();
?>
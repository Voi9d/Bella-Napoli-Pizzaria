<?php

@session_start();
require_once 'ConexaoMysql.php';


class usuarioModel
{

    protected $id;
    protected $email;
    protected $senha;
    protected $tipo;
    protected $nome;
    protected $telefone;
    protected $endereco;



    public function getId()
    {

        if (isset($_SESSION['email']) || isset($_SESSION['admin'])) {

            $email = isset($_SESSION['admin']) ? $_SESSION['admin'] : (isset($_SESSION['email']) ? $_SESSION['email'] : null);

            $db = new ConexaoMysql();
            $db->Conectar();
            $sql = "SELECT id FROM usuario where email = '$email'";
            $result = $db->Consultar($sql);

            if ($result) {
                $objeto = $result->fetch_object();
                $id = $objeto->id;
                $this->id = $id;
            }
        }

        return $this->id;
    }


    public function getNome()
    {

        if (isset($_SESSION['email']) || isset($_SESSION['admin'])) {

            $email = isset($_SESSION['admin']) ? $_SESSION['admin'] : (isset($_SESSION['email']) ? $_SESSION['email'] : null);

            $db = new ConexaoMysql();
            $db->Conectar();
            $sql = "SELECT nome FROM usuario where email = '$email'";
            $result = $db->Consultar($sql);

            if ($result) {
                $objeto = $result->fetch_object();
                $nome = $objeto->nome;
                $this->nome = $nome;
            }
        }

        return $this->nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function setSenha($senha): void
    {
        $this->senha = $senha;
    }


    public function Autenticar()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $sql = "SELECT * FROM usuario where email = '$email' and senha = '$senha'";

        $db = new ConexaoMysql();
        $db->Conectar();
        $db->Consultar($sql);

        if ($db->total < 1) {
            unset($_SESSION['email']);
            header('location: ../login.php?cod=171');
        } else {
            if ($email == 'nico@gmail') {
                $_SESSION['admin'] = $email;
                header('location: ../index.php?cod=admin');
            } else {
                $_SESSION['email'] = $email;
                header('location: ../index.php');
            }
        }
    }

    public function criarConta()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];

        $sql = "SELECT * FROM usuario where email = '$email' ";

        $db = new ConexaoMysql();
        $db->Conectar();
        $db->Consultar($sql);

        if ($db->total >= 1) {

            header('location: ../registro.php?cod=174');
        } else {

            $sql = "INSERT INTO usuario (nome,telefone,endereco,email,senha) values ('$nome', '$telefone', '$endereco', '$email', '$senha')";

            $db = new ConexaoMysql();
            $db->Conectar();
            $db->Executar($sql);

            $_SESSION['email'] = $email;

            header('location: ../index.php');

            return $db->total;
        }
    }


    public function loadAll()
    {

        $email = isset($_SESSION['admin']) ? $_SESSION['admin'] : (isset($_SESSION['email']) ? $_SESSION['email'] : null);
        $sql = "SELECT * FROM usuario where email = '$email'";

        $db = new ConexaoMysql();
        $db->Conectar();
        $resultlist = $db->Consultar($sql);

        return $resultlist;
    }


    public function alterarDados()
    {
        $user = isset($_SESSION['admin']) ? $_SESSION['admin'] : (isset($_SESSION['email']) ? $_SESSION['email'] : null);
        $senha = $_POST['senha'];
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];

        $sql = "UPDATE usuario SET nome = '$nome', telefone = '$telefone', endereco = '$endereco', senha = '$senha'  where email = '$user' ";

        $db = new ConexaoMysql();
        $db->Conectar();
        $db->Executar($sql);
    }


    public function loadAdmin()
    {

        $email = $_SESSION['admin'];
        $sql = "SELECT * FROM usuario where email != '$email'";

        $db = new ConexaoMysql();
        $db->Conectar();
        $resultlist = $db->Consultar($sql);

        return $resultlist;
    }


    public function deletar()
    {

        $user =  $_GET['perfil'];
        $sql = "DELETE FROM usuario where email = '$user'";
        $db = new ConexaoMysql();
        $db->Conectar();
        $db->Executar($sql);
    }
}

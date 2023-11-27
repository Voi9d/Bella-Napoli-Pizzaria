<?php

@session_start();
require_once 'ConexaoMysql.php';


class pedidoModel
{

    protected $id;
    public $nome;
    protected $valor;
    protected $usuario;
    protected $quantidade;



    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        if(isset($_GET['pizza'])){
            $nomePizza = $_GET['pizza'];
            $this->nome = ucfirst($nomePizza);
        }
        
        return $this->nome;
    }


    public function getQuantidade()
    {
        require_once "../controller/loginController.php";
        $this->usuario = $idUsuario = loadId();
        $nome = $_SESSION['pizza'];
        $tamanho = $_POST['tamanho'];
        $observacao = $_POST['observacao'];
        $this->nome =  $nomeCompleto = $nome . " - " . $tamanho;

            $db = new ConexaoMysql();
            $db->Conectar();
            $sql = "SELECT quantidade FROM pedido where usuario = '$idUsuario' and nome = '$nomeCompleto' and observacoes = '$observacao'"; 

            $result = $db->Consultar($sql);

            if ($result) {
                $objeto = $result->fetch_object();
                @$quantidade = $objeto->quantidade;
                $this->quantidade = $quantidade;
            }

            return $this->quantidade;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function getUsuario()
    {
        return $this->usuario;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setNome($nome): void
    {
        $this->nome = $nome;
    }

    public function setValor($valor): void
    {
        $this->valor = $valor;
    }


    public function verificaPizza() {
        $pizza = $_GET['pizza'];
        if ($pizza != 'calabresa' && $pizza != 'pepperoni' && $pizza != 'margherita' && $pizza != 'quatro queijos' && $pizza != 'frango com catupiry') {
            header('location: ./index.php');
        } else {
            
        }
    }



    public function adicionarPedido() {
        if (isset($_SESSION['pizza'])) {
    
            require_once "../controller/loginController.php";
    
            $idUsuario = loadId();
            $nome = $_SESSION['pizza'];
            $tamanho = $_POST['tamanho'];
            $observacao = $_POST['observacao'];
            $nomeCompleto = $nome . " - " . $tamanho;
           
    
            $valor = [
                'Calabresa' => ['Pequena' => 30, 'Média' => 40, 'Grande' => 50],
                'Pepperoni' => ['Pequena' => 35, 'Média' => 45, 'Grande' => 60],
                'Margherita' => ['Pequena' => 25, 'Média' => 35, 'Grande' => 45],
                'Quatro queijos' => ['Pequena' => 40, 'Média' => 55, 'Grande' => 65],
                'Frango com catupiry' => ['Pequena' => 45, 'Média' => 60, 'Grande' => 75],
            ];
    
            $valorPedido = $valor[$nome][$tamanho];

            $sql = "INSERT INTO pedido (nome, valor, usuario, observacoes, quantidade) VALUES ('$nomeCompleto', '$valorPedido', '$idUsuario', '$observacao', '1' )";

            $db = new ConexaoMysql();
            $db->Conectar();
            $db->Executar($sql);
            
        }
    }
    
}

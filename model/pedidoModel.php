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
    protected $total;

    public function getTotal1()
    {
        require_once "../controller/loginController.php";
    
        $nome = $_SESSION['pizza'];
        $tamanho = $_POST['tamanho'];
        $observacao = $_POST['observacao'];
        $nomeCompleto = $nome . " - " . $tamanho;
    
        $idUsuario = loadId();
        $sql = "SELECT valor FROM pedido WHERE usuario = '$idUsuario' AND nome = '$nomeCompleto' AND observacoes = '$observacao'";
    
        $db = new ConexaoMysql();
        $db->Conectar();

        $V = $db->Consultar($sql);

        if ($V) {
            $objeto = $V->fetch_object();
            @$valor = $objeto->valor;
        }

        $result = $this->getQuantidade();
        $total = $result * $valor;

        $sql = "UPDATE pedido SET total = '$total' WHERE usuario = '$idUsuario' AND nome = '$nomeCompleto' AND observacoes = '$observacao' ";
        $db->Executar($sql);

        return $this->total;
    }
    
    public function getTotal2()
    {
        require_once "../controller/loginController.php";
        $idUsuario = loadId();
        $nome = $_GET['b'];

        $sql = "SELECT valor FROM pedido WHERE usuario = '$idUsuario' AND nome = '$nome'";

        $db = new ConexaoMysql();
        $db->Conectar();

        $V = $db->Consultar($sql);

        if ($V) {
            $objeto = $V->fetch_object();
            @$valor = $objeto->valor;
        }
    
        $result = $this->getBebidas();

        $total = $result * $valor;

        $sql = "UPDATE pedido SET total = '$total' WHERE usuario = '$idUsuario' AND nome = '$nome'";
        $db->Executar($sql);

        return $total;
    }



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
        @$tamanho = $_POST['tamanho'];
        @$observacao = $_POST['observacao'];
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

    public function getBebidas(){

        require_once "../controller/loginController.php";

        $this->usuario = $idUsuario = loadId();
        $nome = $_GET['b'];
        $this->nome = $nome;

        $db = new ConexaoMysql();
        $db->Conectar();
        $sql = "SELECT quantidade FROM pedido where usuario = '$idUsuario' and nome = '$nome' "; 

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

            $sql = "INSERT INTO pedido (nome, valor, usuario, observacoes, quantidade,total) VALUES ('$nomeCompleto', '$valorPedido', '$idUsuario', '$observacao', '1','$valorPedido')";

            $db = new ConexaoMysql();
            $db->Conectar();
            $db->Executar($sql);
            
        }
    }

    public function adicionarBebida() {
        if (isset($_GET['b'])) {
    
            require_once "../controller/loginController.php";
    
            $idUsuario = loadId();
            $nome = $_GET['b'];
            $valor = 5;

            $sql = "INSERT INTO pedido (nome, valor, usuario, quantidade,total) VALUES ('$nome', '$valor', '$idUsuario', '1', '$valor')";

            $db = new ConexaoMysql();
            $db->Conectar();
            $db->Executar($sql);
            
        }
    }

    public function loadAll(){

        require_once "controller/loginController.php";
        $idUsuario = loadIduser();

        $sql = "SELECT * FROM pedido WHERE usuario = '$idUsuario' AND status IS NULL";

        $db = new ConexaoMysql();
        $db->Conectar();
        $result = $db->Consultar($sql);

        return $result;

    }


 

public function getSumOfTotal()
{
    require_once "controller/loginController.php";
    $idUsuario = loadIduser();

    $sql = "SELECT total FROM pedido where usuario = '$idUsuario' AND status IS NULL ";

    $db = new ConexaoMysql();
    $db->Conectar();
    $res = $db->Consultar($sql);

    $sum = 0;

    while ($objeto = $res->fetch_assoc()) {
        $sum += $objeto['total'];
    }

    return $sum;
}


public function deleteAllFromPedido()
{
    require_once "../controller/loginController.php";
    $idUsuario = loadId();
    $sql = "DELETE FROM pedido WHERE usuario = '$idUsuario' ";

    $db = new ConexaoMysql();
    $db->Conectar();

    $db->Executar($sql);
}


public function pagar(){
    require_once "../controller/loginController.php";
    $idUsuario = loadId();

    $sql = "UPDATE pedido set status = 'pago' where usuario = '$idUsuario' and status IS NULL";

    $db = new ConexaoMysql();
    $db->Conectar();

    $db->Executar($sql);
}

public function loadHis(){

    require_once "controller/loginController.php";
    $idUsuario = loadIduser();

    $sql = "SELECT * FROM pedido WHERE usuario = '$idUsuario' AND status = 'pago' ";

    $db = new ConexaoMysql();
    $db->Conectar();
    $result = $db->Consultar($sql);

    return $result;

}

public function loadAllAdm(){

$sql= "SELECT * FROM pedido where status = 'pago'";
$db = new ConexaoMysql();
$db->Conectar();
$result = $db->Consultar($sql);

return $result;

}





}

<?php
require_once __DIR__ . "/../DAO/ClienteDAO.php";
require_once __DIR__ . "/../classes/Cliente.php";

class ClienteController{
    public function CadastrarCliente(Cliente $cliente){
        $dao = new ClienteDAO();
        $dao->CadastrarCliente($cliente);
    }
    public function ListarClientes(){
        $dao = new ClienteDAO();
        $clientes = $dao->ListarClientes();
        return $clientes;
    }
}

?>
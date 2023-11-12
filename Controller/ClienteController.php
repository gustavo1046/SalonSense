<?php
require_once __DIR__ . "/../DAO/ClienteDAO.php";
require_once __DIR__ . "/../classes/Cliente.php";

class ClienteController{
    public function CadastrarCliente(Cliente $cliente){
        $dao = new ClienteDAO();
        $result = $dao->CadastrarCliente($cliente);
        return $result;
    }
    public function ListarClientes(){
        $dao = new ClienteDAO();
        $clientes = $dao->ListarClientes();
        return $clientes;
    }

    public function AtualizaDataCliente($data, $nome){
        $dao = new ClienteDAO;
        $dao->AtualizaDataCliente($data, $nome);
    }
}

?>
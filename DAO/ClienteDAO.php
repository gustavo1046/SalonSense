<?php
    require_once __DIR__ ."../../data/conexao.php";
    require_once __DIR__ ."../../classes/Cliente.php";

    class ClienteDAO{
        public function CadastrarCliente(Cliente $cliente){
            $conexao = Conexao::Conectar();
            $nome = $cliente->get_nome_cliente();
            $data = $cliente->get_data_ult_atendimento();
            $data1 = $data->format('Y-m-d');
            echo $data1;
            $telefone = $cliente->get_telefone();
            $sql = "INSERT INTO cliente (nome_cliente, telefone, data_ultimo_agendamento) VALUES ('".$nome."', ".$telefone.",'".$data1."');";
            $conexao->query($sql);
            echo $conexao->error;
        }
    }
?>
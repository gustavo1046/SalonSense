<?php
    require_once __DIR__ ."../../data/conexao.php";
    require_once __DIR__ ."../../classes/Cliente.php";

    class ClienteDAO{
        public function CadastrarCliente(Cliente $cliente){
            $conexao = Conexao::Conectar();
            $nome = $cliente->get_nome_cliente();
            $data = $cliente->get_data_ult_atendimento();
            $data1 = $data->format('Y-m-d');
            $telefone = $cliente->get_telefone();
            $sql = "INSERT INTO cliente (nome_cliente, telefone, data_ultimo_agendamento) VALUES ('".$nome."', ".$telefone.",'".$data1."');";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function ListarClientes(){
            $conexao = Conexao::Conectar();
            $sql = "SELECT * FROM cliente";
            $result = $conexao->query($sql);
            $formato = 'Y-m-d H:i:s';
            $clientes = array();
            while($row = mysqli_fetch_assoc($result)){
                $id = $row["id_cliente"];
                $nome_cliente = $row["nome_cliente"];
                $telefone = $row["telefone"];
                $data_ult_agendamento = new DateTime($row["data_agendamento"]);
                $cli = new Cliente($nome_cliente, $telefone, $data_ult_agendamento);
                $cli->set_id($id);
                array_push($clientes, $cli);
            }
            return $clientes;
        }
    }
?>
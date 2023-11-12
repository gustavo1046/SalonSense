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
            $sql = "SELECT * FROM cliente where nome_cliente = '$nome'";
            $result = $conexao->query($sql);
            $rows = 0;
            while($dados = $result->fetch_assoc()){
                $rows += 1;
            }
            if($rows == 0){
                $sql = "INSERT INTO cliente (nome_cliente, telefone, data_ultimo_agendamento) VALUES ('".$nome."', '".$telefone."','".$data1."');";
                $conexao->query($sql);
                echo $conexao->error;
                return 1;
            }
            else{
                return 0; //se possui algum usuario com esse mesmo nome no banco de dados ele ão fará o cadastro
            }

        }

        public function ListarClientes(){
            $conexao = Conexao::Conectar();
            $sql = "SELECT * FROM cliente";
            $result = $conexao->query($sql);
            $clientes = array();
            while($row = mysqli_fetch_assoc($result)){
                $id = $row["id_cliente"];
                $nome_cliente = $row["nome_cliente"];
                $telefone = $row["telefone"];
                $data = new DateTime($row["data_ultimo_agendamento"]);
                $cli = new Cliente($nome_cliente, $telefone, $data);
                $cli->set_id($id);
                array_push($clientes, $cli);
            }
            return $clientes;
        }

        public function AtualizaDataCliente($data, $nome){
            $conexao = Conexao::Conectar();
            $sql = "UPDATE cliente SET data_ultimo_agendamento = '".$data."' WHERE nome_cliente = '".$nome."';";
            $conexao->query($sql);
            echo $conexao->error;
        }
    }
?>
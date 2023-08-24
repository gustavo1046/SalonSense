<?php 
    require_once __DIR__ . "/../data/conexao.php";
    require_once __DIR__ . "/../classes/Agendamento.php";
    class agendamentoDao{
        public function CadastrarAgendamento(Agendamento $agendamento){
            $conexao = Conexao::Conectar();
            $nome = $agendamento->getNome_cliente();
            $hora_inicio = $agendamento->getHoraInicio();
            $hora_inicio = $hora_inicio->format('Y-m-d H:i:s');
            $hora_fim = $agendamento->getHoraFim();
            $hora_fim = $hora_fim->format('Y-m-d H:i:s');
            $data = $agendamento->getData();
            $data = $data->format('Y-m-d');
            $valor = $agendamento->getValor();
            // $status = $agendamento->getStatus();
            $servico = $agendamento->getServico();
            $forma = $agendamento->getFormaPagamento();
            // $id_adm = $agendamento->getIdAdm();
            session_start();
            $admId = $_SESSION["id"];
            $sql = "INSERT INTO agendamento (nome_cliente, hora_inicio, hora_fim, data_agendamento, valor_agendamento, status_agendamento, desc_serviço_agendamento, forma_pagamento, Administrador_id_administrador)
            VALUES ('$nome', '$hora_inicio', '$hora_fim', '$data', '$valor', 0, '$servico', '$forma', $admId);";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function ConsultarAgendamento(){
            $conexao = Conexao::Conectar();
            $sql =  "select * from agendamento order by data_agendamento;";
            $consulta = $conexao->query($sql);
            $formato = 'Y-m-d H:i:s';
            $agenda = array();
            while($row = mysqli_fetch_assoc($consulta)){
                $nome_cliente = $row["nome_cliente"];
                $hora_inicio = DateTime::createFromFormat($formato, $row["hora_inicio"]);
                $hora_fim = DateTime::createFromFormat($formato, $row["hora_fim"]);
                $data_agendamento = new DateTime($row["data_agendamento"]);
                $valor = $row["valor_agendamento"]; // converter para string no formato desejado
                $status = $row["status_agendamento"];
                $descricao = $row["desc_serviço_agendamento"];
                $pagamento = $row["forma_pagamento"];
                $adm = $row["Administrador_id_administrador"];
                $agendamento = new Agendamento($nome_cliente, $hora_inicio, $hora_fim, $data_agendamento, $valor, $status, $descricao, $pagamento, $adm);
                $agendamento->setId($row["id_agendamento"]);
                array_push($agenda, $agendamento);
            }
            return $agenda;
        }

        public function ConsultarAgendamentoData($data_filter){
            $conexao = Conexao::Conectar();
            $sql =  "select * from agendamento where data_agendamento = '".$data_filter."' order by data_agendamento;";
            $consulta = $conexao->query($sql);
            $formato = 'Y-m-d H:i:s';
            $agenda = array();
            while($row = mysqli_fetch_assoc($consulta)){
                $nome_cliente = $row["nome_cliente"];
                $hora_inicio = DateTime::createFromFormat($formato, $row["hora_inicio"]);
                $hora_fim = DateTime::createFromFormat($formato, $row["hora_fim"]);
                $data_agendamento = new DateTime($row["data_agendamento"]);
                $valor = $row["valor_agendamento"]; // converter para string no formato desejado
                $status = $row["status_agendamento"];
                $descricao = $row["desc_serviço_agendamento"];
                $pagamento = $row["forma_pagamento"];
                $adm = $row["Administrador_id_administrador"];
                $agendamento = new Agendamento($nome_cliente, $hora_inicio, $hora_fim, $data_agendamento, $valor, $status, $descricao, $pagamento, $adm);
                $agendamento->setId($row["id_agendamento"]);
                array_push($agenda, $agendamento);
            }
            return $agenda;
        }

        public function EditarAgendamento(Agendamento $agendamento){
            $conexao = Conexao::Conectar();
            $nome = $agendamento->getNome_cliente();
            $hora_inicio = $agendamento->getHoraInicio();
            $hora_inicio = $hora_inicio->format('Y-m-d H:i:s');
            $hora_fim = $agendamento->getHoraFim();
            $hora_fim = $hora_fim->format('Y-m-d H:i:s');
            $data = $agendamento->getData();
            $data = $data->format('Y-m-d');
            $valor = $agendamento->getValor();
            $servico = $agendamento->getServico();
            $forma = $agendamento->getFormaPagamento();
            $id = $agendamento->getId();

            $sql = "UPDATE agendamento SET nome_cliente = '$nome', hora_inicio = '$hora_inicio', hora_fim ='$hora_fim', data_agendamento = '$data', valor_agendamento = '$valor', desc_serviço_agendamento = '$servico', forma_pagamento= '$forma'
            WHERE id_agendamento = $id;";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function ExcluirAgendamento(int $id){
            $conexao = Conexao::Conectar();
            $sql = "DELETE FROM agendamento WHERE id_agendamento = '$id'";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function AlterarStatus(int $id){
            $conexao = Conexao::Conectar();
            $sql_status = "SELECT status_agendamento FROM agendamento WHERE id_agendamento = $id;";
            $confere_status = $conexao->query($sql_status);
            echo $conexao->error;

            $row = mysqli_fetch_assoc($confere_status);

            if($row["status_agendamento"] == 1){
                $sql = "UPDATE agendamento SET status_agendamento = 0 WHERE id_agendamento = $id;";
                $conexao->query($sql);
                echo $conexao->error;
            }
            else{
                $sql = "UPDATE agendamento SET status_agendamento = 1 WHERE id_agendamento = $id;";
                $conexao->query($sql);
                echo $conexao->error;
            }
            
        }
    }
?>
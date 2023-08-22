<?php
    require_once __DIR__ ."../../data/conexao.php";
    require_once __DIR__ ."../../classes/Agendamento.php";
    class ContasDAO{
        public function ListarContas(Datetime $data1, DateTime $data2){
            $data_inicio = $data1->format('Y-m-d');
            $data_fim = $data2->format('Y-m-d');
            $sql = "SELECT * FROM agendamento WHERE data_agendamento BETWEEN '".$data_inicio."' and '".$data_fim."' and status_agendamento = 1;";
            $conexao = Conexao::Conectar();
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
        
        public function TotalLiquido(Datetime $data1, DateTime $data2){
            $data_inicio = $data1->format('Y-m-d');
            $data_fim = $data2->format('Y-m-d');
            $conexao = Conexao::Conectar();
            $sql = "SELECT SUM(valor_agendamento) as total FROM agendamento WHERE data_agendamento BETWEEN '".$data_inicio."' and '".$data_fim."' and status_agendamento = 1;";
            $consulta = $conexao->query($sql);
            echo $conexao->error;
            $result = mysqli_fetch_assoc($consulta);
            if($result){
                $total = $result["total"];
            }
            else{
                $total = 0;
            }

            return $total;
        }
    }
?>
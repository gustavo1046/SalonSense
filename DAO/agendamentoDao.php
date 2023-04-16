<?php 
    require_once __DIR__ . "/../data/conexao.php";
    require_once __DIR__ . "/../classes/Administrador.php";
    class agendamentoDao{
        public function InserirAgendamento(Agendamento $agendamento){
            $conexao = Conexao::Conectar();
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
            // $id_cliente = $agendamento->getIdCliente();
            // $id_adm = $agendamento->getIdAdm();

            $sql = "INSERT INTO agendamento (hora_inicio, hora_fim, data_agendamento, valor_agendamento, status_agendamento, desc_serviço_agendamento, forma_pagamento, Administrador_id_administrador, Cliente_id_cliente)
            VALUES ('$hora_inicio', '$hora_fim', '$data', '$valor', 2, '$servico', '$forma', 1, 1);";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function ConsultarAgendamento(){
            $conexao = Conexao::Conectar();
            $sql =  "select * from agendamento, cliente where agendamento.Cliente_id_cliente = cliente.id_cliente";
            $consulta = $conexao->query($sql);
            while($dados = mysqli_fetch_assoc($consulta)){
                $hora  = $dados["hora_inicio"];
                $hora = DateTime::createFromFormat('Y-m-d H:i:s', $hora);
                echo "<a href='#'>Cliente: ".$dados["nome_cliente"]." Horario: ".$hora->format("H:i")."</a><br><br>";
            }
        }
    }
?>
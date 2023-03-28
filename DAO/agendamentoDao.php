<?php 
    require_once "../data/conexao.php";
    require_once "../classes/Administrador.php";
    class AgendamentoDao{
        public function InserirAgendamento(Agendamento $agendamento){
            $conexao = Conexao::Conectar();
            $id = $agendamento->getId();
            $hora_inicio = $agendamento->getHoraInicio();
            $hora_fim = $agendamento->getHoraFim();
            $data = $agendamento->getData();
            $valor = $agendamento->getValor();
            $status = $agendamento->getStatus();
            $servico = $agendamento->getServico();
            $forma = $agendamento->getFormaPagamento();
            $id_cliente = $agendamento->getIdCliente();
            $id_adm = $agendamento->getIdAdm();

            $sql = "INSERT INTO agendamento (hora_inicio, hora_fim, data_agendamento, valor_agendamento, status_agendamento, desc_serviço_agendamento, forma_pagamento, Administrador_id_administrador, Cliente_id_cliente)
            VALUES ('2023-04-02 15:30:00', '2023-04-02 16:30:00', '2023-04-02', 80.00, 2, 'Coloração de cabelo', 'Dinheiro', 1, 1);";
        }
    }
?>
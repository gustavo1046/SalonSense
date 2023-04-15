<?php
    require_once __DIR__ . '/../DAO/agendamentoDao.php';
    class action_Consultar{
        public function ListarAgendamentos(){
            $dao = new agendamentoDao();
            $dao->ConsultarAgendamento();
        }
    }


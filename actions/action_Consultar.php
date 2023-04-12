<?php
    require_once './DAO/agendamentoDao.php';
    class action_Consultar{
        public function ListarAgendamentos(){
            $dao = new AgendamentoDao();
            $dao->ConsultarAgendamento();
        }
    }


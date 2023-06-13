<?php
    require_once __DIR__ . '/../DAO/agendamentoDao.php';
    class action_Consultar{
        public function ListarAgendamentos(){
            $dao = new agendamentoDao();
            $result = $dao->ConsultarAgendamento();
            return $result;
        }

        public function ListarAgendamentosData($data_filter){
          $dao = new agendamentoDao();
          $result = $dao->ConsultarAgendamentoData($data_filter);
          return $result;
        }

    }


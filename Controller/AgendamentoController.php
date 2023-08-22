<?php
    require_once __DIR__ . '/../DAO/agendamentoDao.php';
    require_once __DIR__ . "/../classes/Agendamento.php";

    class AgendamentoController{
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

        public function CadastrarAgendamento(Agendamento $agendamento){
            $dao = new agendamentoDao();
            $dao->CadastrarAgendamento($agendamento);
        }

        public function AlterarStatus(int $id){
            $dao = new agendamentoDao();
            $dao->alterarStatus($id);
        }
        
        public function EditarAgendamento(int $id, Agendamento $agend){
            $dao = new AgendamentoDao();
            $dao->EditarAgendamento($id, $agend);
        }

        public function ExcluirAgendamento(int $id){
            $dao = new agendamentoDao();
            $dao->ExcluirAgendamento($id);
        }
    }


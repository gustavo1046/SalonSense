<?php
    require_once __DIR__ . '/../DAO/agendamentoDao.php';
    class action_Consultar{
        public function ListarAgendamentos(){
            $dao = new agendamentoDao();
            $result = $dao->ConsultarAgendamento();

            $comparar_datas = function($a, $b) {
                $data_a = strtotime($a->getData());
                $data_b = strtotime($b->getData());
                if ($data_a == $data_b) {
                  return 0;
                }
                return ($data_a < $data_b) ? -1 : 1;
              };

            usort($result, $comparar_datas);

            return $result;
        }
    }


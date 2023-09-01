<?php
    require_once __DIR__ . "/../DAO/ContasDao.php";

    class ContaController{
        public function ListaContas(DateTime $data1, DateTime $data2){
            $dao = new ContasDAO();
            $result = $dao->ListarContas($data1, $data2);
            return $result;
        }

        public function TotalLiquido(DateTime $data1, DateTime $data2){
            $dao = new ContasDAO();
            $result = $dao->TotalLiquido($data1, $data2);
            return $result;
        }
    }

?>
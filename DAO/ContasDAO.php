<?php
    require_once __DIR__ ."../../data/conexao.php";
    class ContasDAO{
        function ListarContas(Datetime $data1, DateTime $data2){
            $conexao = Conexao::Conectar();
            $sql = "SELECT SUM(valor_agendamento) FROM agendamento WHERE data_agendamento BETWEEN '".$data1."' and '".$data2."';";
            $result = $conexao->query($sql);
            echo $conexao->error;
            return $result;
        }
    }
?>
<?php
    require_once __DIR__ . "/../DAO/ContasDao.php";

    $data1 = $_POST["data_inicio"];
    $data1 = new DateTime($data2);
    $data2 = $_POST["data_fim"];
    $data2 = new DateTime($data2);
    $dao = new ContasDAO();
    $result = $dao->ListarContas($data1, $data2);
?>
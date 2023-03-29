<?php
    require_once '../classes/Agendamento.php';
    require_once '../DAO/agendamentoDao.php';

    $nome = $_POST["nome"];
    $hora_inicio = $_POST["hora_inicio"];
    $hora_fim = $_POST["hora_final"];
    $data = $_POST["data"];
    $valor = $_POST["valor"];
    $servico = $_POST["desc"];
    $forma = $_POST["opcao"];

    $agend = new Agendamento($hora_inicio, $hora_final, $data, $valor, $servico, $forma, 1, 1);
    $dao = new AgendamentoDao();
    $dao->InserirAgendamento($agend);

    // echo "Nome: " . $nome . "<br>";
    // echo "Hora de Início: " . $hora_inicio . "<br>";
    // echo "Hora de Fim: " . $hora_fim . "<br>";
    // echo "Data: " . $data . "<br>";
    // echo "Valor: " . $valor . "<br>";
    // echo "Descrição do Serviço: " . $servico . "<br>";
    // echo "Forma de Pagamento: " . $forma . "<br>";



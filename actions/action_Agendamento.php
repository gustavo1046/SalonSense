<?php
    require_once '../classes/Agendamento.php';
    require_once '../DAO/agendamentoDao.php';

    $nome = $_POST["nome"];
    $hora1 = $_POST["hora_inicio"];
    $hora_inicio = new DateTime($hora1);
    $hora2 = $_POST["hora_final"];
    $hora_fim = new DateTime($hora2);
    $data = $_POST["data"];
    $data = new DateTime($data);
    $valor = $_POST["valor"];
    $servico = $_POST["desc"];
    $forma = $_POST["opcao"];

    $agend = new Agendamento($hora_inicio, $hora_fim, $data, $valor, $servico, $forma, 1, 1);
    $dao = new AgendamentoDao();
    $dao->InserirAgendamento($agend);


    echo "Nome: " . $nome . "<br>";
    echo "Hora de Início: " . $hora_inicio->format('Y-m-d H:i:s') . "<br>";
    echo "Hora de Fim: " . $hora_fim->format('Y-m-d H:i:s') . "<br>";
    echo "Data: " . $data->format('Y-m-d') . "<br>";
    echo "Valor: " . $valor . "<br>";
    echo "Descrição do Serviço: " . $servico . "<br>";
    echo "Forma de Pagamento: " . $forma . "<br>";



<?php
    require_once __DIR__ . "/../classes/Agendamento.php";
    require_once __DIR__ . "/../DAO/agendamentoDao.php";

    $nome = $_POST["nome"];
    $hora1 = $_POST["hora_inicio"];
    $hora_inicio = new DateTime($hora1);
    $hora2 = $_POST["hora_final"];
    $hora_fim = new DateTime($hora2);
    $data = $_POST["data"];
    $dao = new agendamentoDao();
    $confere_horario = $dao->ConsultarAgendamentoData($data);
    $data = new DateTime($data);
    $valor = $_POST["valor"];
    $servico = $_POST["desc"];
    $forma = $_POST["opcao"];

    foreach($confere_horario as $conf):
        echo "Nome: " . $conf->getNome_cliente();
        echo "<br>";
        echo "hora 1:" . $hora1;
        echo "<br>";
        echo "hora 2:" . $hora2;
        echo "<br>";
        $hora = date('H:i', $conf->getHoraInicio()->getTimestamp());
        echo "hora inicio cliente:" . $hora;
        echo "<br>";
        $hora3 = date('H:i', $conf->getHoraFim()->getTimestamp());
        echo "hora final cliente:" . $hora3;

        echo "<br>";
        if($hora_inicio->getTimestamp() >= $conf->getHoraInicio()->getTimestamp()){
            if($hora_inicio->getTimestamp() <= $conf->getHoraFim()->getTimestamp()){
                echo "vishi mano num vai da nao";
                echo "<br>";
            }else {
                echo "ta tudo bem marcar";
                echo "<br>";
            }

        } else {
            echo "ta tudo bem marcar";
            echo "<br>";
        }
    endforeach; 

    $agend = new Agendamento($nome, $hora_inicio, $hora_fim, $data, $valor, $servico, $forma, 1);
    $dao->InserirAgendamento($agend);
    // header("Location: ../Pages/Agendamento/Agendamento.php");
    exit();



    // echo "Nome: " . $nome . "<br>";
    // echo "Hora de Início: " . $hora_inicio->format('Y-m-d H:i:s') . "<br>";
    // echo "Hora de Fim: " . $hora_fim->format('Y-m-d H:i:s') . "<br>";
    // echo "Data: " . $data->format('Y-m-d') . "<br>";
    // echo "Valor: " . $valor . "<br>";
    // echo "Descrição do Serviço: " . $servico . "<br>";
    // echo "Forma de Pagamento: " . $forma . "<br>";



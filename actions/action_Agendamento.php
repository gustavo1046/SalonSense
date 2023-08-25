<?php
    require_once __DIR__ . "/../classes/Agendamento.php";
    require_once __DIR__ . "/../Controller/AgendamentoController.php";

    $nome = $_POST["nome"];
    $hora1 = $_POST["hora_inicio"];
    $hora_inicio = new DateTime($hora1);
    $hora2 = $_POST["hora_final"];
    $hora_fim = new DateTime($hora2);
    $data = $_POST["data"];
    $data_agend = new DateTime($data);
    $valor = $_POST["valor"];
    $servico = $_POST["desc"];
    $forma = $_POST["opcao"];
    $op = $_POST["op"];//valor que diferencia um cadastro de uma edição de um agendamento
    $id = $_POST["id"];
    $id_status = $_POST["id_status"];

    $agendController = new AgendamentoController();

    if ($id_status != null){ //verifica se ele quer apenas alterar o status da tarefa e nao utilizar funções com objeto agendamento
        $agendController->AlterarStatus($id_status);
        header("Location: ../Pages/Consultar/Consultar.php");
    }

    else {
        // echo $id;
        if ($op == 0){
            session_start();
            $adm = $_SESSION["adm"];
            $agend = new Agendamento($nome, $hora_inicio, $hora_fim, $data_agend, $valor, 0, $servico, $forma, $adm);
            $agendController->CadastrarAgendamento($agend);
            header("Location: ../Pages/Agendamento/Agendamento.php");
        }
        else if($op == 1) {
            session_start();
            $adm = $_SESSION["adm"];
            $agend = new Agendamento($nome, $hora_inicio, $hora_fim, $data_agend, $valor, 0, $servico, $forma, $adm);
            $agendController->EditarAgendamento($agend);
            header("Location: ../Pages/Consultar/Consultar.php");
        }
        else if($op == 2){
            $agendController->ExcluirAgendamento($id);
            header("Location: ../Pages/Consultar/Consultar.php");
        }
    }
   
exit();



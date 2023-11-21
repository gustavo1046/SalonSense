<?php
    require_once __DIR__ . "/../classes/Agendamento.php";
    require_once __DIR__ . "/../Controller/AgendamentoController.php";
    require_once __DIR__ ."../../classes/Cliente.php";
    require_once __DIR__ ."../../Controller/ClienteController.php";

    if(isset($_POST["nome"])){
        $nome = $_POST["nome"];
    }

    if(isset($_POST["hora_inicio"])){
        $hora1 = $_POST["hora_inicio"];
        $hora_inicio = new DateTime($hora1);
    }

    if(isset($_POST["hora_final"])){
        $hora2 = $_POST["hora_final"];
        $hora_fim = new DateTime($hora2);
    }

    if(isset($_POST["data"])){
        $data = $_POST["data"];
        $data_agend = new DateTime($data);
    }
    
    if(isset($_POST["valor"])){
        $valor = (float)$_POST["valor"];
    }

    if(isset($_POST["desc"])){
        $servico = $_POST["desc"];
    }

    if(isset($_POST["opcao"])){
        $forma = $_POST["opcao"];
    }

    if(isset($_POST["op"])){
        $op = $_POST["op"];
    }else{
        $op = null;
    }

    if(isset($_POST["id"])){
        $id = $_POST["id"];
    }
    if(isset($_POST["id_status"])){
        $id_status = $_POST["id_status"];
    }else{
        $id_status = null;
    }

    if(isset($_POST["telefone"])){
        $telefone = $_POST["telefone"];
    }else{
        $telefone = null;
    }

    if(isset($_POST["cliente_fiel"])){
        $data_cliente = $_POST["cliente_fiel"];
    }else{
        $data_cliente = null;
    }

    if($data_cliente != null){
        $clienteController = new ClienteController();
        $clienteController->AtualizaDataCliente($data_cliente, $nome);
    }

    if($telefone != null){
        $clienteController = new ClienteController();
        $cliente = new Cliente($nome, $telefone, $data_agend);
        $result = $clienteController->CadastrarCliente($cliente);
        if($result == 0){
            header("Location: ../Pages/Agendamento/Agendamento.php?erro=1");
            exit();
        }
    }

    $agendController = new AgendamentoController();
    if ($id_status != null){ //verifica se ele quer apenas alterar o status da tarefa e nao utilizar funções com objeto agendamento
        $agendController->AlterarStatus($id_status);
        header("Location: ../Pages/Consultar/Consultar.php");
    }

    else {
        if(isset($op)){
            if ($op == 0){
                // $adm = $_SESSION["adm"];
                $agend = new Agendamento($nome, $hora_inicio, $hora_fim, $data_agend, $valor, 0, $servico, $forma, 2);
                $agendController->CadastrarAgendamento($agend);
                header("Location: ../Pages/Agendamento/Agendamento.php");
            }
            else if($op == 1){
                // $adm = $_SESSION["adm"];
                $agend = new Agendamento($nome, $hora_inicio, $hora_fim, $data_agend, $valor, 0, $servico, $forma, 2);
                $agend->setId($id);
                $agendController->EditarAgendamento($agend);
                header("Location: ../Pages/Consultar/Consultar.php");
            }
            else if($op == 2){
                $agendController->ExcluirAgendamento($id);
                header("Location: ../Pages/Consultar/Consultar.php");
            }
        }
    }
   
exit();



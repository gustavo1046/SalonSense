<?php
    require_once __DIR__ . "/../classes/Agendamento.php";
    require_once __DIR__ . "/../DAO/agendamentoDao.php";

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

    $dao = new agendamentoDao(); //classe de agendamento

    if ($id_status != null){ //verifica se ele quer apenas alterar o status da tarefa e nao utilizar funções com objeto agendamento
        $dao->alterarStatus($id_status);
        header("Location: ../Pages/Consultar/Consultar.php");
    }

    else {
        // echo $id;
        if ($op == 0){
            session_start();
            $agend = new Agendamento($nome, $hora_inicio, $hora_fim, $data_agend, $valor, 0, $servico, $forma, 1);
            $dao->InserirAgendamento($agend);
            header("Location: ../Pages/Agendamento/Agendamento.php");
        }
        else if($op == 1) {
            $agend = new Agendamento($nome, $hora_inicio, $hora_fim, $data_agend, $valor, 0, $servico, $forma, 1);
            $dao->editarAgendamento($id, $agend);
            header("Location: ../Pages/Consultar/Consultar.php");
        }
        else if($op == 2){
            $dao->excluirAgendamento($id);
            header("Location: ../Pages/Consultar/Consultar.php");
        }
    }
   
exit();


    // TESTE DE CONFERENCIA DE INCIDENCIA DE AGENDAMENTO NO BANCO DE DADOS 
    // (PARA CASOS DE AGENDAMENTOS EM HORARIO CONFLITANTES)
    // colar dentro do foreach e retirar o header da pagina apra visualizar resultados

    
    // echo "Nome do banco: " . $conf->getNome_cliente();
    // echo "<br>";
    // echo "Nome do cliente cadastrado: ". $nome;
    // echo "<br>";
    // echo "hora 1:" . $hora1;
    // echo "<br>";
    // echo "hora 2:" . $hora2;
    // echo "<br>";
    // $hora = date('H:i', $conf->getHoraInicio()->getTimestamp());
    // echo "hora inicio cliente:" . $hora;
    // echo "<br>";
    // $hora3 = date('H:i', $conf->getHoraFim()->getTimestamp());
    // echo "hora final cliente:" . $hora3;
    // echo "<br>";
    // $hora_i = $hora_inicio->format('H');
    // $hora_f = $hora_fim->format('H');
    // $hora_inicio_cliente = $conf->getHoraInicio();
    // $hora_inicio_cliente = $hora_inicio_cliente->format('H');
    // $hora_fim_cliente = $conf->getHorafim();
    // $hora_fim_cliente = $hora_fim_cliente->format('H');

    // if($hora_i >= $hora_inicio_cliente){
    //     if($hora_f <= $hora_fim_cliente && $hora_f >= $hora_inicio_cliente){
    //         echo "Noa pode ser feito o cadastro";
    //         echo "<br>";
    //         echo "<br>";
    //         echo "<br>";
    //         echo "<br>";
    //         echo "<br>";
    //         $count += 1;
    //     }else {
    //         echo "ta tudo bem marcar - 2";
    //         echo "<br>";
    //     }
    // }
    // else {
    //     echo "";
    //     echo "ta tudo bem marcar - 1";
    //     echo "<br>";
    // }




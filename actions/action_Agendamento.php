<?php
    require_once __DIR__ . "/../classes/Agendamento.php";
    require_once __DIR__ . "/../DAO/agendamentoDao.php";

    $id = $POST["id"];//valor que diferencia um cadastro de uma edição de um agendamento
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


    $dao = new agendamentoDao();
    $confere_horario = $dao->ConsultarAgendamentoData($data);
    $count = 0; //variavel de contagem de incidencia no intervalo do horario

    $hora_i = $hora_inicio->format('H');
    $hora_f = $hora_fim->format('H');

    if($hora_i > $hora_f){
        echo "tu é doido é macho?"; //naaan
    }
    else{
        foreach($confere_horario as $conf):
            $hora_inicio_cliente = $conf->getHoraInicio();
            $hora_inicio_cliente = $hora_inicio_cliente->format('H');
            $hora_fim_cliente = $conf->getHorafim();
            $hora_fim_cliente = $hora_fim_cliente->format('H');
    
            if($hora_i >= $hora_inicio_cliente){
                if($hora_f <= $hora_fim_cliente && $hora_f >= $hora_inicio_cliente){
                    $count += 1;
                }
            }
        endforeach;


    
        $agend = new Agendamento($nome, $hora_inicio, $hora_fim, $data_agend, $valor, $servico, $forma, 1);
        
        if($id != 0){
            $dao->editarAgendamento($id, $agend);
            if($count == 0){
                header("Location: ../Pages/Agendamento/Agendamento.php");
            }
            else{
               echo  "horario de agendamento ja esta em uso";
            }
        }
        
        else{
            $dao->InserirAgendamento($agend);
            if($count == 0){
                header("Location: ../Pages/Agendamento/Agendamento.php");
            }
            else{
            echo  "horario de agendamento ja esta em uso";
            }
        }

        exit();
    }


    


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




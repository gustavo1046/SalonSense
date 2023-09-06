<?php
    require_once __DIR__ . "/../Controller/ReceitaController.php";
    require_once __DIR__ . "/../classes/Receita.php";
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $op = $_POST["op"];//valor que diferencia um cadastro de uma edição de um agendamento
    $id = $_POST["id"];
    $receitaControl = new ReceitaController();

    if ($op == 0){
        session_start();
        $adm = $_SESSION["adm"];
        $agend = new Receita($nome, $descricao, $adm);
        $receitaControl->CadastrarReceita($agend);
        header("Location: ../Pages/Receitas/Receita.php");
    }
    else if($op == 1) {
        session_start();
        $adm = $_SESSION["adm"];
        $receita = new Receita($nome, $descricao, $adm);
        $receita->setId_receita($id);
        $receitaControl->EditarReceita($receita);
        header("Location: ../Pages/Receitas/Receita.php");
    }
    else if($op == 2){
        $receitaControl->ExcluirReceita($id);
        header("Location: ../Pages/Receitas/Receita.php");
    }
    
?>

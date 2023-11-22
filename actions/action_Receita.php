<?php
    require_once __DIR__ . "/../Controller/ReceitaController.php";
    require_once __DIR__ . "/../classes/Receita.php";

    if(isset($_POST["nome"])){
        $nome = $_POST["nome"];
    }else{
        $nome = "";
    }

    if(isset($_POST["descricao"])){
        $descricao = $_POST["descricao"];
    }else{
        $descricao = "";
    }

    if(isset($_POST["op"])){
        $op = $_POST["op"];
    }else{
        $op = null;
    }

    if(isset($_POST["id"])){
        $id = $_POST["id"];
    }else{
        $id = null;
    }

    $receitaControl = new ReceitaController();

    if(isset($op)){
        if ($op == 0){
            // $adm = $_SESSION["adm"];
            $agend = new Receita($nome, $descricao, 2);
            $receitaControl->CadastrarReceita($agend);
            header("Location: ../Pages/Receitas/Receita.php");
        }

        else if($op == 1) {
            // $adm = $_SESSION["adm"];
            $receita = new Receita("ellen sz", $descricao, 2);
            $receita->setId_receita($id);
            $receitaControl->EditarReceita($receita);
            header("Location: ../Pages/Receitas/Receita.php");
        }
        else if($op == 2){
            $receitaControl->ExcluirReceita($id);
            header("Location: ../Pages/Receitas/Receita.php");
        }
    }else{
        echo "Erro de operação";
    } 
?>


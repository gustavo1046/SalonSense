<?php
    require_once __DIR__ . "/../Controller/ReceitaController.php";
    require_once __DIR__ . "/../classes/Receita.php";
    $nome = $_POST["nome"];
    $descricao = $_POST["descricao"];
    $receita = new Receita($nome, $descricao, 1);
    $receita_controller = new ReceitaController();
    $receita_controller->CadastraReceita($receita);
    header("Location: ../Pages/Receitas/Receita.php");
?>


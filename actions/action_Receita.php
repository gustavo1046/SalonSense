<?php
    require_once __DIR__ . "/../Controller/ReceitaController.php";
    require_once __DIR__ . "/../classes/Receita.php";
    $nome_cliente = $_POST["nome_cliente"];
    $descricao = $_POST["descricao"];
    $receita = new Receita($nome_cliente, $descricao, 1);
    $receita_controller = new ReceitaController();
    $receita_controller->CadastraReceita($receita);
?>


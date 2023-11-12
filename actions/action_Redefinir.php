<?php
    require_once __DIR__ . "/../Controller/RedefinirController.php";
    $senhaAntiga = $_POST["oldPass"];
    $senhaNova = $_POST["newPass"];
    $redefinir = new RedefinirController();
    $redefinir->RedefinirSenha($senhaAntiga, $senhaNova);
    if($redefinir == 2){
        header("Location: ../index.php?erro=2");
    }
    else{
        header("Location: ../index.php?erro=3");
    }
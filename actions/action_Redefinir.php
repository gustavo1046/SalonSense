<?php
    require_once __DIR__ . "/../Controller/RedefinirController.php";
    $senhaAntiga = $_POST["oldPass"];
    $senhaNova = $_POST["newPass"];
    $redefinir = new RedefinirController();
    $redef = $redefinir->RedefinirSenha($senhaAntiga, $senhaNova);

    if($redef == 2){
        header("Location: ../index.php?erro=2");
    }
    else{
        header("Location: ../index.php?erro=3");
    }
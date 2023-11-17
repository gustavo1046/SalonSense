<?php
    require_once __DIR__ . "/../classes/Administrador.php";
    require_once __DIR__ . "/../Controller/LoginController.php";
    
    $login =  $_POST["login"];
    $senha = $_POST["password"];
    $adm = new Administrador($login, $senha);
    $acao = new LoginController();
    $adm = $acao->Logar($adm);

    if($adm != null){
        session_start();
        $_SESSION["adm"] = $adm;
        // echo $_SESSION["id"];
        header("Location: ../Pages/Home Page/HomePage.php");
    }
    else{
        header("Location: ../index.html?erro=1");
    }

?>
    
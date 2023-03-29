<?php
    require_once '../classes/Administrador.php';
    require_once '../DAO/loginDao.php';
    
    $login =  $_POST["login"];
    $senha = $_POST["password"];
    $adm = new Administrador($login, $senha);
    $acao = new LoginDao();
    $acao->login($adm);
?>
    
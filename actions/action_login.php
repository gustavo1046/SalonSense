<?php
    require_once '../classes/Administrador.php';
    require_once '../DAO/loginDao.php';
    
    $login =  $_POST["login"];
    
    if(!empty($login)){
        $senha = $_POST["password"];

        if(!empty($senha)){
            $adm = new Administrador($login, $senha);
            $acao = new LoginDao();
            $acao->login($adm);
        }

        else{
             echo "nothing else matters2";
        }
    }

    else{
        echo "nothing else matters1";
    }
   
?>
    
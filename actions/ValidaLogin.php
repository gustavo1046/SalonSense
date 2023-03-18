<?php
    require_once '../data/Conexao.php';
    require_once '../actions/action_Login.php';
    
    $login =  $_POST["login"];
    
    if(!empty($login)){
        $senha = $_POST["password"];

        if(!empty($senha)){
             $tipo = $_POST["tipo"];

            if($tipo == "Professor"){
                $acao = new action_Login();
                $acao->verifica_professor($login, $senha);
            }
        
            else if($tipo == "Aluno"){
                $acao = new action_Login();
                $acao->verifica_aluno($login, $senha);
            }

            else if($tipo == "Administrador"){
                $acao = new action_Login();
                $acao->verifica_admin($login, $senha);
            }
        }

        else{
             echo "nothing else matters2";
        }
    }

    else{
        echo "nothing else matters1";
    }
   
?>
    
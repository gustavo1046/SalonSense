<?php
    require_once __DIR__ . "/../data/conexao.php";
class RedefinirDAO{
    public function RedefinirSenha($old, $new){
        $conexao = Conexao::Conectar();
        $sql = "SELECT senha_administrador FROM administrador where senha_administrador = '$old'";
        $result = $conexao->query($sql);
        echo $conexao->error;
        $rows = 0;
        while($dados = $result->fetch_assoc()){
            $senha = $dados["senha_administrador"];
            $rows += 1;
        }
        if($rows == 1){
            $sql = "UPDATE administrador SET senha_administrador = '$new' WHERE senha_administrador = '$senha' and id_administrador = 2";
            $conexao->query($sql);
            echo $conexao->error;
            return 1;
        }
        else{
            return 2;
        }
    }
}


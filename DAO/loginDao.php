<?php 
    require_once __DIR__ . "/../data/conexao.php";
    require_once __DIR__ . "/../classes/Administrador.php";
    class LoginDao{
        public function login(Administrador $admin){
            $conexao = Conexao::Conectar();
            $nome = $admin->getNome();
            $senha = $admin->getSenha();
            $sql = "SELECT * FROM Administrador where nome_administrador ='$nome' 
                and senha_administrador='$senha'";
            $result = $conexao->query($sql);
            $rows = 0;
            while($dados = $result->fetch_assoc()){
                $adm = $dados["id_administrador"];
                $rows += 1;
            }
            if($rows == 1){
                session_start();
                $_SESSION["id"] = $adm;
                header("Location: ../Pages/Home Page/HomePage.html");
            }
            else{
                echo "nothings else matters8";
            }
        }
    }
?>
<?php
    require_once __DIR__ . "/../data/conexao.php";
    require_once __DIR__ . "/../classes/Receita.php";
    class ReceitaDao{
        public function ListaReceitas(){
            $conexao = Conexao::Conectar();
            $sql= "SELECT * FROM receita";
            $consulta = $conexao->query($sql);
            while($row = mysqli_fetch_assoc($consulta)){
                $nome_cliente = $row["nome_cliente"];
                $descricao_receita = $row["descricao_receita"];
                $adm = $row["Administrador_id_administrador"];
                $receita = new Receita($nome_cliente, $descricao_receita, $adm);
                $receita->setId_receita($row["id_receita"]);
                array_push($agenda, $receita);
            }
            return $agenda;
        }
    }
?>
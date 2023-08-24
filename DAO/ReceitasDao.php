<?php
    require_once __DIR__ . "/../data/conexao.php";
    require_once __DIR__ . "/../classes/Receita.php";
    class ReceitaDao{
        public function ListaReceitas(){
            $conexao = Conexao::Conectar();
            $sql= "SELECT * FROM receita";
            $consulta = $conexao->query($sql);
            $receitas = array();
            while($row = mysqli_fetch_assoc($consulta)){
                $nome_cliente = $row["nome_cliente"];
                $descricao_receita = $row["descricao_receita"];
                $adm = $row["Administrador_id_administrador"];
                $receita = new Receita($nome_cliente, $descricao_receita, $adm);
                $receita->setId_receita($row["id_receita"]);
                array_push($receitas, $receita);
            }
            return $receitas;
        }

        public function CadastrarReceita(Receita $receita){
            $conexao = Conexao::Conectar();
            $sql = "INSERT INTO receita(nome_cliente, descricao_receita, Administrador_id_administrador) values ('".$receita->getNome_cliente()."', '".$receita->getDescricao_receita()."', ".$receita->getId_administrador().");";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function EditarReceita(Receita $receita){
            $conexao = Conexao::Conectar();
            $nome = $receita->getNome_cliente();
            $descricao = $receita->getDescricao_receita();
            $id = $receita->getId_receita();
            $sql = "UPDATE receita SET nome_cliente='$nome', descricao_receita='$descricao' WHERE id_receita=$id";
            $conexao->query($sql);
            echo $conexao->error;
        }
    }
?>
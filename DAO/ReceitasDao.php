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
            $sql = "SELECT id_cliente from cliente where nome_cliente = '".$receita->getNome_cliente()."'; ";
            $consulta = $conexao->query($sql);
            $row = mysqli_fetch_assoc($consulta);
            $id_cliente = $row["id_cliente"];
            $sql = "INSERT INTO receita(nome_cliente, descricao_receita, Administrador_id_administrador, Cliente_id_cliente) values ('".$receita->getNome_cliente()."', '".$receita->getDescricao_receita()."', ".$receita->getId_administrador().", ".$id_cliente.");";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function EditarReceita(Receita $receita){
            $conexao = Conexao::Conectar();
            $descricao = $receita->getDescricao_receita();
            $id = $receita->getId_receita();
            $sql = "UPDATE receita SET descricao_receita='$descricao' WHERE id_receita=$id";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function ExcluirReceita(int $id){
            $conexao = Conexao::Conectar();
            $sql = "DELETE FROM receita WHERE id_receita = $id;";
            $conexao->query($sql);
            echo $conexao->error;
        }
    }
?>
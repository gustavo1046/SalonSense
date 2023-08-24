<?php
    require_once __DIR__.'/../DAO/ReceitasDAO.php';
    class ReceitaController{
        public function ListarReceitas(){
            $dao = new ReceitaDao();
            $result = $dao->ListaReceitas();
            return $result;
        }

        public function CadastrarReceita(Receita $receita){
            $dao = new ReceitaDAO();
            $dao->CadastrarReceita($receita);
        }

        public function EditarReceita(Receita $receita){
            $dao = new ReceitaDAO();
            $dao->EditarReceita($receita);
        }

    }
?>
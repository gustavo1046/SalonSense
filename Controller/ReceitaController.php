<?php
    require_once __DIR__.'/../DAO/ReceitasDAO.php';
    class ReceitaController{
        public function ListarReceitas(){
            $dao = new ReceitaDao();
            $result = $dao->ListaReceitas();
            return $result;
        }

        public function CadastraReceita(Receita $receita){
            $dao = new ReceitaDAO();
            $dao->CadastraReceita($receita);
        }
    }
?>
<?php  
    require_once __DIR__.'/../DAO/RedefinirDAO.php';
    
    class RedefinirController{
    public function RedefinirSenha($old, $new){
        $dao = new RedefinirDAO();
        $result = $dao->RedefinirSenha($old, $new);
        return $result;
    }
} 
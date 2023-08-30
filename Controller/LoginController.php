<?php
require_once __DIR__ . "/../classes/Administrador.php";
require_once __DIR__ . "/../DAO/LoginDao.php";

class LoginController{
    public function Logar(Administrador $administrador){
        $dao = new LoginDao();
        $adm = $dao->Logar($administrador);
        return $adm;
    }
}

?>
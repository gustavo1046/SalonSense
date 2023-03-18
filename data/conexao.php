<?php
class Conexao{
    public static $usuario;
    public static $senha;
    public static $banco;
    public static $endereco;

    public static function Conectar()
    {
        $diretorio = $_SERVER['DOCUMENT_ROOT'] . '/data/db.php';
        require $diretorio;
        self::$usuario = $user;
        self::$senha = $password;
        self::$banco = $db;
        self::$endereco = $server;
        $conexao = new mysqli(self::$endereco, self::$usuario, self::$senha, self::$banco);

        if(mysqli_connect_error()) {
            echo "Erro na conexão: " . mysqli_connect_error();
        }
        else{
            return $conexao;
        }
        
    }
}
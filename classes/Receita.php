<?php 
    class Receita{
        private int $id_receita;
        private string $nome_cliente;
        private string $descricao_receita;
        private int $id_administrador;

        public function __construct(string $nome_cliente, string $descricao_receita, int $id_administrador){
            $this->nome_cliente = $nome_cliente;
            $this->descricao_receita = $descricao_receita;
            $this->id_administrador = $id_administrador;
        }

        public function setId_receita(int $id_receita) {
            $this->id_receita = $id_receita;
        }
    
        public function setNome_cliente(string $nome_cliente) {
            $this->nome_cliente = $nome_cliente;
        }
    
        public function setDescricao_receita(string $descricao_receita) {
            $this->descricao_receita = $descricao_receita;
        }
    
        public function setId_administrador(int $id_administrador) {
            $this->id_administrador = $id_administrador;
        }
    
        public function getId_receita() {
            return $this->id_receita;
        }
    
        public function getNome_cliente() {
            return $this->nome_cliente;
        }
    
        public function getDescricao_receita() {
            return $this->descricao_receita;
        }
    
        public function getId_administrador() {
            return $this->id_administrador;
        }

    }
?>

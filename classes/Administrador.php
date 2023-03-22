<?php
    class Administrador{
        private int $id;
        private string $nome;
        private string $senha;

        public function __construct(string $nome, string $senha) {
            $this->nome = $nome;
            $this->senha = $senha;
        }

        public function getId(){
            return $this->id;
        }

        public function getNome(){
            return $this->nome;
        }

        public function getSenha(){
            return $this->senha;
        }
    }

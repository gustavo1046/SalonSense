<?php
    class Agendamento{
        private int $id;
        private string $nome_cliente;
        private DateTime $hora_inicio;
        private DateTime $hora_fim;
        private DateTime $data;
        private float $valor;
        private int $status;
        private string $servico;
        private string $forma_pagamento;
        private int $id_adm;

        public function __construct(string $nome_cliente, DateTime $hora_i, DateTime $hora_f, DateTime $data, float $valor, string $servico, string $forma_pagamento, int $id_adm){
            $this->nome_cliente = $nome_cliente;  
            $this->hora_inicio = $hora_i;
            $this->hora_fim = $hora_f;
            $this->data = $data;
            $this->valor = $valor;
            $this->servico = $servico;
            $this->forma_pagamento = $forma_pagamento;
            $this->id_adm = $id_adm;
        }

        public function getId() : int {
            return $this->id;
          }
        
        public function setId($id) {
          $this->id = $id;
        }

          public function getNome_cliente() : string {
            return $this->nome_cliente;
          }
        
          public function getHoraInicio() : DateTime {
            return $this->hora_inicio;
          }
        
          public function getHoraFim() : DateTime {
            return $this->hora_fim;
          }

          public function getData() : DateTime {
            return $this->data;
          }
          
          public function getValor() : float {
            return $this->valor;
          }
        
          public function getStatus() : int {
            return $this->status;
          }
        
          public function getServico() : string {
            return $this->servico;
          }
        
          public function getFormaPagamento() : string {
            return $this->forma_pagamento;
          }
        
          public function getIdAdm() : int {
            return $this->id_adm;
          }
    }
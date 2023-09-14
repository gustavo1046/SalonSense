<?php
class Cliente{
    private int $id;
    private string $nome_cliente;
    private string $telefone;
    private DateTime $data_ult_atendimento;

    public function __construct(string $nome_cliente, string $telefone, DateTime $data_ult_atendimento){
        $this->nome_cliente = $nome_cliente;
        $this->telefone = $telefone;
        $this->data_ult_atendimento = $data_ult_atendimento; 
    }

    public function get_id(): int {
        return $this->id;
    }

    // Setter para $id
    public function set_id(int $id): void {
        $this->id = $id;
    }

    // Getter para $nome_cliente
    public function get_nome_cliente(): string {
        return $this->nome_cliente;
    }

    // Setter para $nome_cliente
    public function set_nome_cliente(string $nome_cliente): void {
        $this->nome_cliente = $nome_cliente;
    }

    // Getter para $telefone
    public function get_telefone(): string {
        return $this->telefone;
    }

    // Setter para $telefone
    public function set_telefone(string $telefone): void {
        $this->telefone = $telefone;
    }

    // Getter para $data_ult_atendimento
    public function get_data_ult_atendimento(): DateTime {
        return $this->data_ult_atendimento;
    }

    // Setter para $data_ult_atendimento
    public function set_data_ult_atendimento(DateTime $data_ult_atendimento): void {
        $this->data_ult_atendimento = $data_ult_atendimento;
    }

}

?>
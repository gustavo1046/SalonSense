<?php 
    require_once __DIR__ . "/../data/conexao.php";
    require_once __DIR__ . "/../classes/Agendamento.php";
    class agendamentoDao{
        public function InserirAgendamento(Agendamento $agendamento){
            $conexao = Conexao::Conectar();
            $hora_inicio = $agendamento->getHoraInicio();
            $hora_inicio = $hora_inicio->format('Y-m-d H:i:s');
            $hora_fim = $agendamento->getHoraFim();
            $hora_fim = $hora_fim->format('Y-m-d H:i:s');
            $data = $agendamento->getData();
            $data = $data->format('Y-m-d');
            $valor = $agendamento->getValor();
            // $status = $agendamento->getStatus();
            $servico = $agendamento->getServico();
            $forma = $agendamento->getFormaPagamento();
            // $id_cliente = $agendamento->getIdCliente();
            // $id_adm = $agendamento->getIdAdm();

            $sql = "INSERT INTO agendamento (hora_inicio, hora_fim, data_agendamento, valor_agendamento, status_agendamento, desc_serviço_agendamento, forma_pagamento, Administrador_id_administrador, Cliente_id_cliente)
            VALUES ('$hora_inicio', '$hora_fim', '$data', '$valor', 2, '$servico', '$forma', 1, 1);";
            $conexao->query($sql);
            echo $conexao->error;
        }

        public function ConsultarAgendamento(){
            $conexao = Conexao::Conectar();
            $data_atual = date('Y-m-d');
            $sql =  "select * from agendamento, cliente where agendamento.Cliente_id_cliente = cliente.id_cliente and agendamento.data_agendamento = '".$data_atual."';";
            $consulta = $conexao->query($sql);
            $formato = 'Y-m-d H:i:s';
            $agend = array();
            while($row = mysqli_fetch_assoc($consulta)){
                $hora_inicio = DateTime::createFromFormat($formato, $row["hora_inicio"]);
                $hora_fim = DateTime::createFromFormat($formato, $row["hora_fim"]);
                $data_agendamento = new DateTime($row["data_agendamento"]);
                $string = $data_agendamento->format('Y-m-d H:i:s'); // converter para string no formato desejado
                $agendamento = new Agendamento($hora_inicio, $hora_fim, $data_agendamento, $row["valor_agendamento"], $row["desc_serviço_agendamento"], $row["forma_pagamento"],1 , 1);
                $agend[] = $agendamento;
                // $hora  = $row["hora_inicio"];
                // $hora = DateTime::createFromFormat('Y-m-d H:i:s', $hora);
                // echo "<a href='#'>Cliente: ".$row["nome_cliente"]." Horario: ".$hora->format("H:i")."</a><br><br>";
            }
            return $agend;
        }
    }
?>
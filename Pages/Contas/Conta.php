<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Conta.css">
    <title>Contas</title>
</head>
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.html';
?>
<body>
    <main>
        <div class="container">
            <div class="filter">
                <form action="" method="POST">
                    <p>Receita líquida por periodo</p>
                    <input type="date" id="data_inicio" name="data_inicio" required>
                    <input type="date" id="data_fim" name="data_fim" required >
                    <input type="submit" id="submit" name="submit" value="Pesquisar">
                </form>
            </div>
            <div id="info">
            <?php
                require_once __DIR__ ."/../../actions/action_Consultar.php";
                $date_filter = $_POST['data-filter'];
                $dados = new action_Consultar();
                if(empty($date_filter)){
                $result = $dados->ListarAgendamentos();
                foreach($result as $agenda):
                    $hora_inicio = $agenda->getHoraInicio()->format('H:i');
                    $hora_fim = $agenda->getHoraFim()->format('H:i');
                    $data = $agenda->getData()->format("d/m/Y");
                    echo "<div class='item'>";
                    if($agenda->getStatus() == 0){
                    echo "<button class='button_agenda' onclick='showModal(".$agenda->getId().", \"".$agenda->getNome_cliente()."\", \"".$data."\", \"".$hora_inicio."\", \"".$hora_fim."\", \"".$agenda->getValor()."\", \"".$agenda->getServico()."\", \"".$agenda->getFormaPagamento()."\")'>".$agenda->getNome_cliente()." | ".$data."</button>";
                    }else{
                    echo "<button class='button_agenda' onclick='showModal(".$agenda->getId().", \"".$agenda->getNome_cliente()."\", \"".$data."\", \"".$hora_inicio."\", \"".$hora_fim."\", \"".$agenda->getValor()."\", \"".$agenda->getServico()."\", \"".$agenda->getFormaPagamento()."\")'>".$agenda->getNome_cliente()." | ".$data."</button>";
                    }
                    echo "</div>";
                endforeach; 
                }
            ?>
            </div>
        </div>
    </main>
</body>
</html>
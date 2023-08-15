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
                <form action="#" method="POST">
                    <p>Receita líquida por periodo</p>
                    <input type="date" id="data_inicio" name="data_inicio" required>
                    <input type="date" id="data_fim" name="data_fim" required >
                    <input type="submit" id="submit" name="submit" value="Pesquisar" onClick="ChangeValue()">
                </form>
            </div>
            <div id="info">
            <?php
                require_once __DIR__ ."/../../actions/action_Contas.php";
                $data1 = $_POST["data_inicio"];
                $data1 = new DateTime($data1);
                $data2 = $_POST["data_fim"];
                $data2 = new DateTime($data2);
                $dados = new action_Contas();
                $result = $dados->ListaContas($data1, $data2);
                $soma = $dados->TotalLiquido($data1, $data2);
                foreach($result as $agenda):
                    $hora_inicio = $agenda->getHoraInicio()->format('H:i');
                    $hora_fim = $agenda->getHoraFim()->format('H:i');
                    $data = $agenda->getData()->format("d/m/Y");
                    echo "<div class='item'>";
                    echo "<button class='button_agenda' onclick='showModal(".$agenda->getId().", \"".$agenda->getNome_cliente()."\", \"".$data."\", \"".$hora_inicio."\", \"".$hora_fim."\", \"".$agenda->getValor()."\", \"".$agenda->getServico()."\", \"".$agenda->getFormaPagamento()."\")'>".$agenda->getNome_cliente()." | ".$data."</button>";
                    echo "</div>";
                endforeach;    
            echo "</div>";
            echo "Renda Liquida no período: R$: ".$soma;
            ?>
            <br>
            <button id="download">Baixar Planilha</button><a href="../Home Page/HomePage.php" id="voltar">Voltar</a>
        </div>
    </main>

</body>

</html>
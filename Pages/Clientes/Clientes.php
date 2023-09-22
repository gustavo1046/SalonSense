<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./clientes.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Aelia Resende</title>
</head>
<body>
    <header>
        <img src="../../assets/logo.png">
    </header>

    <div id="modal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <p id=nome></p>
        <p id=telefone></p>
      </div>
    </div>

    <div class="container">
        <p>Clientes</p>
        <?php
            require_once __DIR__ ."/../../Controller/ClienteController.php";
            $clienteController = new ClienteController();
            $clientes = $clienteController->ListarClientes();
            foreach($clientes as $cliente){
                echo "<button id='cliente' onclick='showModal(\"".$cliente->get_nome_cliente()."\", \"".$cliente->get_telefone()."\")'>".$cliente->get_nome_cliente()." || ultima visita: ".$cliente->get_data_ult_atendimento()->format("d/m/Y")."</button><br>";
            }
        ?>
    </div>
</body>
</html>

<script>
    var modal = document.getElementById("modal");
    var span = document.getElementsByClassName("close")[0];

    // Quando o usuário clicar no botão "fechar" ou fora do modal, feche-o
    span.onclick = function() {
        modal.style.display = "none";
    }


    window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

    }

    // Exibe o modal quando o usuário clica em um botão
    function showModal(nome, telefone) {
        modal.style.display = "block";
    // console.log(formaPagamento);}
    }
</script>
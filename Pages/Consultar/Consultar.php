<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="./consultar.css">
    <title>Aelia Resende</title>
</head>
<body>
    <header>
        <img src="../../assets/logo.png">
    </header>
    <div class="container">
        <?php
            require_once "../../actions/action_Consultar.php";
            $dados = new action_Consultar();
            $dados->ListarAgendamentos();
        ?>
    </div>
</body>
</html>
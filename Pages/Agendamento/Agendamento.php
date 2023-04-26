<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="./Agendamento.css">
    <title>Aelia Resende</title>
</head>
<body>
    <header>
        <img src="../../assets/logo.png">
    </header>
    <div class="container">
      <form action="../../actions/action_Agendamento.php" method="POST">
        <input type="text" name="nome" placeholder="nome da cliente" id="nome" pattern="[A-Za-z0-9 ]+" maxlength="30" required><br>
        <input type="time" name="hora_inicio" placeholder="inicio do atendimento" id="hora_inicio" required><br>
        <input type="time" name="hora_final" placeholder="final do atendimento" id="hora_final" required><br>
        <input type="date" name="data" placeholder="data do atendimento" id="data" required><br>
        <input tyle="number" name="valor" placeholder="valor do serviço" id="valor" required><br>
        <input type="text" name="desc" placeholder="descrição" pattern="[A-Za-z0-9 ]+" maxlength="50" id="desc" required><br>
        <div class="radio">
          <label>
              <input type="radio" name="opcao" value="Dinheiro"  id="opcao1" checked>
              Dinheiro
            </label>
            <br>
            <label>
              <input type="radio" name="opcao" value="Cartâo" id="opcao2"> 
              Cartão
            </label>
            <br>
            <label>
              <input type="radio" name="opcao" value="Pix" id="opcao3">
              Pix
            </label>
        </div>
        <div class="sub">
          <input type="submit" value="Agendar">
        </div>
        <a href="../Home Page/HomePage.html">Voltar ao inicio</a>
      </form>
    </div>
</body>
</html>
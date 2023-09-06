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
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.html';
?>
<body>

<div class="modal" id="modalExc">
        <div class="modal-content-exc">
          <span class="close">&times;</span>
          <form action="../../actions/action_Agendamento.php" method="POST">
            <div class="modal-footer">
                <input type="tel" name="telefone" placeholder="telefone de contato" id="telefone"><br>
                <input type="submit" value="Cadastrar cliente" id="excluir">
            </div>      
          </form>
        </div>
    </div>


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
        <input type="text" name="desc" placeholder="descrição" maxlength="150" id="desc" required><br>
        <div class="radio">
          <br>
          <label>
              <input type="radio" name="opcao" value="Dinheiro"  id="opcao1" checked>
              Dinheiro
            </label>
            <label>
              <input type="radio" name="opcao" value="Cartâo" id="opcao2"> 
              Cartão
            </label>
            <label>
              <input type="radio" name="opcao" value="Pix" id="opcao3">Pix
            </label>
        </div>
        <div class="cliente">
          <input type="checkbox" name="opcao_cliente" id="opcao_cliente">  cliente fixo?
        </div>
        <div class="sub">
          <input type="submit" value="Agendar" id="agendar" onclick="showModalDelete()">
        </div>
        <a href="../Home Page/HomePage.php">Voltar ao inicio</a>
        <input type="hidden" name="op" id ="op" value=0>
      </form>
    </div>  
</body>
<script>
    var modalDelete = document.getElementById("modalExc");
    var spanDel = document.getElementsByClassName("close")[1];

    // Quando o usuário clicar no botão "fechar" ou fora do modal, feche-o

    spanDel.onclick = function() {
      modalDelete.style.display = "none";
    }

    window.onclick = function(event) {
      if (event.target == modalDelete) {
        modalDelete.style.display = "none";
      }

    }
    function showModalDelete(id){
      modalDelete.style.display = "block";
    }
  </script>
</html>
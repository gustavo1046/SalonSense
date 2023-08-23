<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Receita.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Aelia Resende</title>
</head>
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/navbar.html';
?>
<body>
    <header>
        <img src="../../assets/logo.png">
    </header>
    <div id="modalEdit" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <form class="edit" method="POST" action="../../actions/action_Agendamento.php">
          <label>Nome: </label><input type="text" id="nome" name="nome" required>
          <label>Data: </label><input type="date" id="data" name="data" required><br>
          <label>Hora Inicio: </label><input type="time" id="hora_inicio" name="hora_inicio" required>
          <label>Hora final: </label><input type="time" id="hora_fim" name="hora_final" required><br>
          <label>valor: </label><input type="number" id="valor" name="valor" required><br>
          <label>Descrição: </label><input type="text" id="desc" name="desc" maxlength="150" required><br>
          <br><input type="hidden" name="id" id="id">
              <input type="hidden" name="op" id="op" value=1>
          <div class="radio">
            <label>
              <input type="radio" name="opcao" value="Dinheiro"  id="Dinheiro" checked>
              Dinheiro
            </label>
            <label>
              <input type="radio" name="opcao" value="Cartâo" id="Cartão"> 
              Cartão
            </label>
            <label>
              <input type="radio" name="opcao" value="Pix" id="Pix">
              Pix
            </label>
          </div>
          <input type="submit" value="editar" id="editar">
          <input type="button" value="deletar" id="deletar" onclick="showModalDelete()">
        </form>
      </div>
    </div>

    <div class="modal" id="modalExc">
        <div class="modal-content-exc">
          <span class="close">&times;</span>
          <form action="../../actions/action_Agendamento.php" method="POST">
            <div class="modal-footer">
                <input type="hidden" id="idexc" name="id">
                <input type="hidden" id="op" name="op" value=2>
                <p>Excluir agendamento?</p>
                <input type="submit" value="Exluir" id="excluir">
            </div>      
          </form>
        </div>
    </div>

    <div class="container">
        <form class="receita_form" method="POST" action="../../actions/action_Receita.php">
          <input type="text" name="nome" id ="nome" maxlength="50"><br>
          <input type="text" name="descricao" id ="descricao" maxlength="200"><br><br>
          <input type="submit" name="submit" id="submit">
        </form>
        <div id="info">
          <?php
            require_once __DIR__ ."/../../Controller/ReceitaController.php";
            $dados = new ReceitaController();
            $result = $dados->ListarReceitas();
            foreach($result as $receita):
              echo "<div class='item'>";
                echo "<button class='button_receita' onclick='showModal(".$receita->getId_receita().", \"".$receita->getNome_cliente()."\", \"".$receita->getDescricao_receita()."\")'>".$receita->getNome_cliente()."</button>";
              echo "</div>";
            endforeach;                                                                                             
          ?>
        </div>
        <a href="/Pages/Home Page/HomePage.php">Voltar ao inicio</a>
    </div>
    </body>


    <script>
      // Seleciona o modal e o botão "fechar"
      var modal = document.getElementById("modalEdit");
      var modalDelete = document.getElementById("modalExc");
      var span = document.getElementsByClassName("close")[1];
      var spanDel = document.getElementsByClassName("close")[2];

      // Quando o usuário clicar no botão "fechar" ou fora do modal, feche-o
      span.onclick = function() {
        modal.style.display = "none";
      }

      spanDel.onclick = function() {
        modalDelete.style.display = "none";
      }

      window.onclick = function(event) {
        if (event.target == modal) {
          modal.style.display = "none";
          modalDelete.style.display = "none";
        }
        if (event.target == modalDelete) {
          modalDelete.style.display = "none";
        }

      }

      // Exibe o modal quando o usuário clica em um botão
      function showModal(id, nome, data, hora_inicio, hora_fim, valor, servico, formaPagamento) {
        modal.style.display = "block";
        document.getElementById("id").value = id;
        document.getElementById("op").value= 1;
        document.getElementById("nome").value = nome;
      }

      function showModalDelete(id){
        modalDelete.style.display = "block";
        document.getElementById("idexc").value = document.getElementById("id").value;
        document.getElementById("op").value= 1;
      }

      //função que ativa o checkbox via javascript
    </script>
</html>



<!-- echo "<div class='item'>";
                        echo "<input type='checkbox'class='check'><button class='button_agenda' >".$agenda->getNome_cliente()."</button>";
                        echo "</div>"; -->




<!-- // require_once __DIR__ ."/../../actions/action_Consultar.php";
// $dados = new action_Consultar();
// $result = $dados->ListarAgendamentos();
// foreach($result as $agenda):
//   if (isset($_POST['date_filter']))
//     if(!empty($_POST['date_filter'])){
//       echo "<div class='item'>";
//       echo "<input type='checkbox'class='check'><button class='button_agenda' >".$agenda->getNome_cliente()."</button>";
//       echo "</div>";
//     }
//     else{
//       if($agenda->getData() == $date_filter){
//         $agenda->getNome_cliente();
//       }
//     }
// endforeach; -->

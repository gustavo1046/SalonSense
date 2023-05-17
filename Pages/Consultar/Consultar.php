<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="./consultar.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Aelia Resende</title>
</head>
<body>
    <header>
        <img src="../../assets/logo.png">
    </header>
    <div id="myModal" class="modal">
      <div class="modal-content">
        <span class="close">&times;</span>
        <form class="edit" method="POST" action="../../actions/action_Agendamento.php">
          <label>Nome: </label><input type="text" id="nome" name="nome">
          <label>Data: </label><input type="date" id="data" name="data"><br>
          <label>Hora Inicio: </label><input type="time" id="hora_inicio" name="hora_inicio">
          <label>Hora final: </label><input type="time" id="hora_fim" name="hora_fim"><br>
          <label>valor: </label><input type="number" id="valor" name="valor"><br>
          <label>Descrição: </label><input type="text" id="descricao" name="descricao" pattern="[A-Za-z0-9 ]+" maxlength="50"><br>
          <input type="submit" value="editar"><input type="submit" value="Deletar">
      </div>
    </div>

    <div class="container">
        <div class="filter">
            <form method="POST" id="filter" action="#">
                <input type="date" name="data-filter" id= "data-filter" class="date-filter" ><input type="submit" id="submit-filter" value="Pesquisar">
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
                echo "<div class='item'>";
                echo "<input type='checkbox'class='check'><button class='button_agenda' onclick='showModal()'>".$agenda->getNome_cliente()." | ".$hora_inicio." - ".$hora_fim."</button>";
                echo "</div>";
              endforeach; 
            }
            else{
              $result = $dados->ListarAgendamentosData($date_filter);
              foreach($result as $agenda):
                    $hora_inicio = $agenda->getHoraInicio()->format('H:i');
                    $hora_fim = $agenda->getHoraFim()->format('H:i');
                    echo "<div class='item'>";
                    echo "<input type='checkbox'class='check'><button class='button_agenda' onclick='showModal()'>".$agenda->getNome_cliente()." | ".$hora_inicio." - ".$hora_fim."</button>";
                    echo "</div>";
              endforeach; 
            }
          ?>
        </div>
        <a href="/Pages/Home Page/HomePage.html">Voltar ao inicio</a>
    </body>
    <script>
              // Seleciona o modal e o botão "fechar"
        var modal = document.getElementById("myModal");
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
        function showModal() {
          modal.style.display = "block";
        }
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

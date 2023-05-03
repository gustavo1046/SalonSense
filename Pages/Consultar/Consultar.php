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
                $dateTime =  $agenda->getHoraInicio();
                $hora_inicio = $dateTime->format('H:i');
                echo "<div class='item'>";
                echo "<input type='checkbox'class='check'><button class='button_agenda' >".$agenda->getNome_cliente()." || ".$hora_inicio."</button>";
                echo "</div>";
              endforeach; 
            }
            else{
              $result = $dados->ListarAgendamentosData($date_filter);
              foreach($result as $agenda):
                    $horaInicio = $agenda->gethoraInicio();
                    $hora_inicio = $hora_inicio->format('H:i');
                    echo "<div class='item'>";
                    echo "<input type='checkbox'class='check'><button class='button_agenda' >".$agenda->getNome_cliente()." ".$hora_incio."</button>";
                    echo "</div>";
              endforeach; 
            }
          ?>
        </div>
        <a href="/Pages/Home Page/HomePage.html">Voltar ao inicio</a>
    </body>
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

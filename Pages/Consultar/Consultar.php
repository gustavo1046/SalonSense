<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="./consultar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <title>Aelia Resende</title>
</head>
<body>
    <header>
        <img src="../../assets/logo.png">
    </header>
    <div class="container">
        <div class="filter">
            <form method="POST" id="filter">
                <input type="date" name="date-filter" class="date-filter"><submit id="submit-filter">Pesquisar</submit>
            </form>
        </div>
        <div id="info">
            <?php 
                require_once __DIR__ ."/../../actions/action_Consultar.php";
                $dados = new action_Consultar();
                $result = $dados->ListarAgendamentos();
                $date_filter = $POST["date-filter"];
                foreach($result as $agenda):
                    if(!empty($date_filter)){
                      echo "<div class='item'>";
                      echo "<input type='checkbox'class='check'><button class='button_agenda' >".$agenda->getNome_cliente()."</button>";
                      echo "</div>";
                    }
                    else{
                      if($agenda->getData() == $date_filter){
                        echo "<div class='item'>";
                        echo "<input type='checkbox'class='check'><button class='button_agenda' >".$agenda->getNome_cliente()."</button>";
                        echo "</div>";
                      }
                    }
                endforeach;
            ?>
        </div>
        <a href="/Pages/Home Page/HomePage.html">Voltar ao inicio</a>
    </div>

    <script>
        $(document).ready(function() {
            $('#filter').submit(function(event) {
                event.preventDefault(); // impedir o envio do formulário normalmente
                var form = $(this);
                var url = form.attr('action');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: form.serialize(), // serializar os dados do formulário
                    success: function(data) {
                        $('#resultado').html(data); // exibir o resultado na div com id "resultado"
                    }
                });
            });
        });
    </script>

</body>
</html>
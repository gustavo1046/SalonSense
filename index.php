<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Aelia Resende</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="./assets/logo.png" alt="Aelia Resende">
        </div>
        <div class="info">
            <form action="actions/action_login.php" method="POST">
                <input type="text" placehoder="Digite seu email" name="login" required id ="nome"><br>
                <input type="password" name="password" id="senha" required><img id="eye" onclick="trocarImagem()" src="./assets/icons/visibility_off_FILL0_wght400_GRAD0_opsz48.png"></img><br>
                <input type="submit" id="enviar" value="Logar">
            </form>
        </div>
    </div>
</body>


<script>
    var imagemValida = true;
    function trocarImagem() {
      var minhaImagem = document.getElementById("eye");
      if (imagemValida) {
        minhaImagem.src = "./assets/icons/visibility_FILL0_wght400_GRAD0_opsz48.png";
        imagemValida = false;
        document.getElementById("senha").type = "text";
      } else {
        minhaImagem.src = "./assets/icons/visibility_off_FILL0_wght400_GRAD0_opsz48.png";
        imagemValida = true;
        document.getElementById("senha").type = "password";
      }
    }
  </script>
</html>